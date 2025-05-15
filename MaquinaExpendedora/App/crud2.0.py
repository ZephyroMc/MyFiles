from flask import Flask, jsonify, request, render_template,redirect, url_for,flash
from flask_httpauth import HTTPBasicAuth
import mysql.connector
from decimal import Decimal

# Inicializar Flask y la autenticación básica
app = Flask(__name__)
app.secret_key = 'tu_clave_secreta'
auth = HTTPBasicAuth()

# Datos de conexión MySQL
server = 'localhost'  # O el nombre/IP de tu servidor MySQL
database = 'Maquina'
username = 'root'
password = ''

# Conexión a la base de datos MySQL
def get_db_connection():
    conn = mysql.connector.connect(
        host=server,
        database=database,
        user=username,
        password=password
    )
    return conn

# Usuarios para autenticación básica
users = {
    "admin": "password123",
    "user": "userpass"
}

@auth.verify_password
def verify_password(username, password):
    if username in users and users[username] == password:
        return username
    return None

#Index
@app.route('/')
def inicio():
    return render_template('index.html')

# ---------------------- PRODUCTOS ----------------------

@app.route('/productos', methods=['GET'])
def get_productos():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('SELECT * FROM Productos')
    productos = cursor.fetchall()
    productos_list = []
    for producto in productos:
        productos_list.append({
            'id_producto': producto[0],
            'nombre': producto[1],
            'precio': producto[2],
            'fopre_donacion': producto[3]
        })
    conn.close()
    return render_template('productos.html', productos=productos_list)

@app.route('/productos/NewProduct', methods=['POST','GET'])
@auth.login_required
def nuevo_producto():
    if request.method == 'POST':
        nombre = request.form.get('nombre')
        precio = request.form.get('precio')
        fopre_donacion = request.form.get('fopre_donacion')

        conn = get_db_connection()
        cursor = conn.cursor()
        cursor.execute('''
            INSERT INTO Productos (nombre, precio, fopre_donacion)
            VALUES (%s, %s, %s)
        ''', (nombre, precio, fopre_donacion))
        conn.commit()
        conn.close()

        return redirect(url_for('get_productos'))

    return render_template('nuevo_producto.html')

#Editar Producto



@app.route('/productos/editar/<int:id_producto>', methods=['GET', 'POST'])
@auth.login_required
def editar_producto(id_producto):
    conn = get_db_connection()
    cursor = conn.cursor()

    # Buscar el producto por su ID
    cursor.execute('SELECT * FROM Productos WHERE id_producto = %s', (id_producto,))
    producto = cursor.fetchone()

    if not producto:
        conn.close()
        return jsonify({'error': 'Producto no encontrado'}), 404

    if request.method == 'POST':
        # Capturar datos del formulario
        nombre = request.form.get('nombre')
        precio = request.form.get('precio')
        fopre_donacion = request.form.get('fopre_donacion')

        # Actualizar producto
        cursor.execute('''
            UPDATE Productos
            SET nombre = %s, precio = %s, fopre_donacion = %s
            WHERE id_producto = %s
        ''', (nombre, precio, fopre_donacion, id_producto))
        conn.commit()
        conn.close()

        return redirect(url_for('get_productos'))

    # Preparar los datos para mostrarlos en el formulario
    producto_dict = {
        'id_producto': producto[0],
        'nombre': producto[1],
        'precio': float(producto[2]),
        'fopre_donacion': bool(producto[3])
    }

    conn.close()
    return render_template('Editarproducto.html', producto=producto_dict)




#Eliminar Producto
@app.route('/productos/eliminar/<int:id_producto>', methods=['POST'])
@auth.login_required
def delete_producto(id_producto):
    conn = get_db_connection()
    cursor = conn.cursor()

    cursor.execute('DELETE FROM Productos WHERE id_producto = %s', (id_producto,))
    conn.commit()

    if cursor.rowcount > 0:
        flash('Producto eliminado exitosamente.', 'success')
    else:
        flash('Producto no encontrado.', 'danger')

    conn.close()
    return redirect(url_for('get_productos'))

# ---------------------- COMPRAS ----------------------
@app.route('/compras', methods=['GET'])
@auth.login_required
def vista_compras():
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('SELECT * FROM Compras')
    compras = cursor.fetchall()
    compras_list=[]
    for compra in compras:
        compras_list.append({
            'id_compra': compra[0],
            'id_cliente': compra[1],
            'fecha': compra[2].strftime("%Y-%m-%d %H:%M:%S"),
            'total': float(compra[3])
        })
    conn.close()
    return render_template('compras.html',compras=compras_list)


@app.route('/compras/<int:id_compra>', methods=['GET'])
@auth.login_required
def get_compra(id_compra):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('SELECT * FROM Compras WHERE id_compra = %s', (id_compra,))
    compra = cursor.fetchone()

    if compra:
        compra_data = {
            'id_compra': compra[0],
            'id_cliente': compra[1],
            'fecha': compra[2],
            'total': compra[3]
        }
        conn.close()
        return jsonify(compra_data)
    else:
        conn.close()
        return jsonify({'error': 'Compra no encontrada'}), 404


#Editar COmpra

@app.route('/compras/editar/<int:id_compra>', methods=['GET', 'POST'])
@auth.login_required
def editar_compra(id_compra):
    conn = get_db_connection()
    cursor = conn.cursor()

    if request.method == 'POST':
        id_cliente = request.form['id_cliente']
        fecha = request.form['fecha']
        total = request.form['total']

        cursor.execute('''
            UPDATE Compras
            SET id_cliente = %s, fecha = %s, total = %s
            WHERE id_compra = %s
        ''', (id_cliente, fecha, total, id_compra))
        conn.commit()
        conn.close()
        flash('Compra actualizada correctamente.', 'success')
        return redirect(url_for('vista_compras'))

    # GET: mostrar formulario con datos actuales
    cursor.execute('SELECT * FROM Compras WHERE id_compra = %s', (id_compra,))
    compra = cursor.fetchone()
    conn.close()

    if compra:
        compra_data = {
            'id_compra': compra[0],
            'id_cliente': compra[1],
            'fecha': compra[2].strftime('%Y-%m-%dT%H:%M'),
            'total': compra[3]
        }
        return render_template('editar_compra.html', compra=compra_data)
    else:
        flash('Compra no encontrada.', 'danger')
        return redirect(url_for('vista_compras'))

#Eliminar Compra
@app.route('/compras/eliminar/<int:id_compra>', methods=['POST'])
@auth.login_required
def eliminar_compra(id_compra):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('DELETE FROM Compras WHERE id_compra = %s', (id_compra,))
    conn.commit()
    conn.close()
    flash('Compra eliminada exitosamente.', 'success')
    return redirect(url_for('vista_compras'))

@app.route('/maquina', methods=['GET'])

def maquina_expendedora():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Obtener productos
    cursor.execute('SELECT * FROM Productos')
    productos = cursor.fetchall()
    productos_list = []
    for producto in productos:
        productos_list.append({
            'id_producto': producto[0],
            'nombre': producto[1],
            'precio': producto[2],
            'fopre_donacion': producto[3],
            'cantidad': producto[4]
        })

    # Obtener crédito disponible (asumimos una sola fila)
    cursor.execute('SELECT credito FROM Monedas LIMIT 1')
    credito_result = cursor.fetchone()
    credito_disponible = credito_result[0] if credito_result else 0

    conn.close()
    return render_template('maquina_expendedora.html', productos=productos_list, credito=credito_disponible)


@app.route('/agregar_credito', methods=['GET', 'POST'])
def agregar_credito():
    if request.method == 'POST':
        monto = float(request.form['monto'])

        conn = get_db_connection()
        cursor = conn.cursor()
        cursor.execute(f'''
            UPDATE Monedas
            SET credito = credito + {monto}
            WHERE id_cliente = 1
        ''')
        conn.commit()
        conn.close()
        flash('Crédito agregado correctamente.', 'success')
        return redirect(url_for('maquina_expendedora'))

    return render_template('agregar_credito.html')

@app.route('/comprar/<int:id_producto>', methods=['POST'])


@app.route('/comprar/<int:id_producto>', methods=['POST'])
def comprar_producto(id_producto):
    id_cliente = request.form.get('id_cliente', type=int)

    conn = get_db_connection()
    cursor = conn.cursor()

    # Obtener el precio del producto
    cursor.execute(f'SELECT precio, fopre_donacion FROM Productos WHERE id_producto = {id_producto}')
    producto = cursor.fetchone()

    if not producto:
        conn.close()
        flash('Producto no encontrado.', 'danger')
        return redirect(url_for('maquina_expendedora'))

    precio, fopre_donacion = producto

    # Obtener el crédito disponible del cliente
    cursor.execute('SELECT credito FROM Monedas WHERE id_cliente = %s', (id_cliente,))
    resultado = cursor.fetchone()

    if not resultado:
        conn.close()
        flash('Cliente no encontrado.', 'danger')
        return redirect(url_for('maquina_expendedora'))

    credito_actual = resultado[0]

    if credito_actual < precio:
        conn.close()
        flash('Crédito insuficiente para realizar la compra.', 'warning')
        return redirect(url_for('maquina_expendedora'))

    # Descontar el crédito
    nuevo_credito = credito_actual - precio
    cursor.execute('UPDATE Monedas SET credito = %s WHERE id_cliente = %s', (nuevo_credito, id_cliente))

    # Registrar la compra
    cursor.execute('INSERT INTO Compras (id_cliente, total) VALUES (%s, %s)', (id_cliente, precio))
    id_compra = cursor.lastrowid

    # Registrar detalle de compra
    cursor.execute('INSERT INTO Detalles_Compras (id_compra, id_producto, cantidad) VALUES (%s, %s, %s)',
                   (id_compra, id_producto, 1))
    # Disminuir cantidad
    cursor.execute(f' UPDATE Productos SET cantidad = (cantidad-1) where id_producto={id_producto}')
    # Registrar donación si aplica
    if fopre_donacion:
        donacion = round(precio * Decimal('0.06'), 2)
        cursor.execute('INSERT INTO FOPRE_Donaciones (id_producto, monto) VALUES (%s, %s)',
                       (id_producto, donacion))

    conn.commit()
    conn.close()

    flash('Compra realizada con éxito.', 'success')
    return redirect(url_for('maquina_expendedora'))

@app.route('/maquina/top_productos')
def top_productos():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Total de unidades compradas (global)
    cursor.execute('SELECT SUM(cantidad) FROM Detalles_Compras')
    total_global = cursor.fetchone()[0] or 0

    # Top productos más comprados
    cursor.execute('''
        SELECT p.nombre, SUM(dc.cantidad) as total_vendido
        FROM Detalles_Compras dc
        JOIN Productos p ON dc.id_producto = p.id_producto
        GROUP BY dc.id_producto
        ORDER BY total_vendido DESC
    ''')
    productos = cursor.fetchall()
    conn.close()

    productos_list = [{'nombre': p[0], 'total_vendido': p[1]} for p in productos]

    return render_template('top_productos.html', total_global=total_global, productos=productos_list)


@app.route('/maquina/valor_total_compras')
def valor_total_compras():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Calcular el valor total de todas las compras (precio * cantidad)
    cursor.execute('''
        SELECT SUM(p.precio * dc.cantidad)
        FROM Detalles_Compras dc
        JOIN Productos p ON dc.id_producto = p.id_producto
    ''')
    total_compras = cursor.fetchone()[0] or 0.0
    conn.close()

    return render_template('valor_total_compras.html', total_compras=total_compras)


@app.route('/maquina/porcentaje_disponibilidad')
def porcentaje_disponibilidad():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Obtener total de unidades disponibles actualmente
    cursor.execute('SELECT SUM(cantidad) FROM Productos')
    disponibles = cursor.fetchone()[0] or 0

    # Obtener total de unidades vendidas (desde Detalles_Compras)
    cursor.execute('SELECT SUM(cantidad) FROM Detalles_Compras')
    vendidas = cursor.fetchone()[0] or 0

    total_inicial = disponibles + vendidas
    porcentaje = (disponibles / total_inicial * 100) if total_inicial > 0 else 0

    conn.close()

    return render_template('porcentaje_disponibilidad.html', porcentaje=porcentaje)



@app.route('/maquina/donacion_fopre')
def donacion_fopre():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Calcular donación total solo de productos que tienen FOPRE activo
    cursor.execute("""
        SELECT SUM(dc.cantidad * p.precio)
        FROM Detalles_Compras dc
        JOIN Productos p ON dc.id_producto = p.id_producto
        WHERE p.fopre_donacion = 1
    """)
    donacion_total = cursor.fetchone()[0] or 0

    conn.close()

    return render_template('donacion_fopre.html', donacion=donacion_total)



@app.route('/maquina/donacion_por_producto')
def donacion_por_producto():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Donación por producto (solo productos con FOPRE activado)
    cursor.execute("""
        SELECT p.nombre, SUM(dc.cantidad * p.precio * 0.06) AS donacion
        FROM Detalles_Compras dc
        JOIN Productos p ON dc.id_producto = p.id_producto
        WHERE p.fopre_donacion = 1
        GROUP BY p.id_producto, p.nombre
    """)

    resultados = cursor.fetchall()
    donaciones = [{'producto': row[0], 'donacion': float(row[1]) if row[1] else 0} for row in resultados]

    conn.close()

    return render_template('donacion_por_producto.html', donaciones=donaciones)



@app.route('/maquina/unidades_fopre_por_producto')
def unidades_fopre_por_producto():
    conn = get_db_connection()
    cursor = conn.cursor()

    # Consulta: total de unidades por producto FOPRE
    cursor.execute("""
        SELECT p.nombre, SUM(dc.cantidad) AS unidades
        FROM Detalles_Compras dc
        JOIN Productos p ON dc.id_producto = p.id_producto
        WHERE p.fopre_donacion = 1
        GROUP BY p.id_producto, p.nombre
    """)

    resultados = cursor.fetchall()
    unidades_fopre = [{'producto': row[0], 'unidades': row[1]} for row in resultados]

    conn.close()

    return render_template('unidades_fopre.html', unidades=unidades_fopre)

# ---------------------- RUN ----------------------


if __name__ == '__main__':
    app.run(debug=True)
