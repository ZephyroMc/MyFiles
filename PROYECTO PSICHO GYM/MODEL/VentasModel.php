<?php
include_once('database.php');
class VentaModel extends database
{
    private $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
    public function ConsultarDetalleDeVenta()
    {
        $objpdo = $this->Start();
        $query = 'select * from Factura where ID_Factura = :Id_Factura';
        $clienteParam = $objpdo->prepare($query);
        $clienteParam->bindParam('Id_Factura', $this->id);
        $clienteParam->execute();
        return $clienteParam->fetch(pdo::FETCH_OBJ);
        $clienteParam->Disconnect();
    }

    public function CrearVenta($idcliente, $fecha, $total, $Medio_Pago, $Direccion_Envio)
    {
        try {
            $objpdo = $this->Start();
            $query = 'INSERT INTO Factura (ID_Cliente, Fecha, Subtotal, Medio_Pago, Dirección_Envio) 
                      VALUES (:ID_Cliente, :Fecha, :Subtotal, :Medio_Pago, :Direccion_Envio)';
            $sql = $objpdo->prepare($query);
            $sql->bindParam(':ID_Cliente', $idcliente);
            $sql->bindParam(':Fecha', $fecha);
            $sql->bindParam(':Subtotal', $total);
            $sql->bindParam(':Medio_Pago', $Medio_Pago);
            $sql->bindParam(':Direccion_Envio', $Direccion_Envio);

            if ($sql->execute()) {
                // Obtener el ID de la factura creada
                return $objpdo->lastInsertId();
            }
            return false;
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }

    public function CrearDetalleVenta($ID_Venta, $ID_Suplemento, $Cantidad, $Precio_Unitario)
    {
        try {
            $objpdo = $this->Start();
            $query = 'INSERT INTO Detalle_Venta (ID_Venta, ID_Suplemento, Cantidad, Precio_Unitario) 
                      VALUES (:ID_Venta, :ID_Suplemento, :Cantidad, :Precio_Unitario)';
            $sql = $objpdo->prepare($query);
            $sql->bindParam(':ID_Venta', $ID_Venta);
            $sql->bindParam(':ID_Suplemento', $ID_Suplemento);
            $sql->bindParam(':Cantidad', $Cantidad);
            $sql->bindParam(':Precio_Unitario', $Precio_Unitario);

            return $sql->execute();
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }
}
