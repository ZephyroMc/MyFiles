<?php
include_once('Database.php');
class Productos extends database
{
    public function RegistrarProducto($Nombre, $Marca, $Venta, $Compra, $Descripcion, $Stock,$imagen)
    {
        $objpdo = $this->Start();
        try {
            $query = 'INSERT INTO Producto (Nombre, Marca, Precio_Venta, Precio_Compra, Descripcion, Stock,ruta) 
                      VALUES (:Nombre, :Marca, :Precio_Venta, :Precio_Compra, :Descripcion, :Stock,:imagen )';
            $prepare = $objpdo->prepare($query);
            $prepare->bindParam(':Nombre', $Nombre);
            $prepare->bindParam(':Marca', $Marca);
            $prepare->bindParam(':Precio_Venta', $Venta);
            $prepare->bindParam(':Precio_Compra', $Compra);
            $prepare->bindParam(':Descripcion', $Descripcion);
            $prepare->bindParam(':Stock', $Stock);
            $prepare->bindParam(':imagen', $imagen);
            return $prepare->execute();
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }


    public function ConsultaProductos($ID_Suplemento)
    {
        $objpdo = $this->Start();

        try {
            $Query = 'SELECT * FROM Producto where ID_Suplemento=:ID_Suplemento';
            $prepare = $objpdo->prepare($Query);
            $prepare->bindParam(':ID_Suplemento', $ID_Suplemento);
            $prepare->execute();
            return $prepare->fetchObject();
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }

    public function ActualizarProductos($ID_Suplemento, $Nombre, $Marca, $Venta, $Compra, $Descripcion, $Stock , $ruta)
    {
        $objpdo = $this->Start();
        try {

            $query = "UPDATE Producto 
                SET Nombre = :Nombre, 
                    Marca = :Marca, 
                    Precio_Venta = :Precio_Venta, 
                    Precio_Compra = :Precio_Compra, 
                    Descripcion = :Descripcion, 
                    Stock = :Stock,
                    ruta = :ruta
                WHERE ID_Suplemento = :id";

            $prepare = $objpdo->prepare($query);
            $prepare->bindParam(':Nombre', $Nombre);
            $prepare->bindParam(':Marca', $Marca);
            $prepare->bindParam(':Precio_Venta', $Venta);
            $prepare->bindParam(':Precio_Compra', $Compra);
            $prepare->bindParam(':Descripcion', $Descripcion);
            $prepare->bindParam(':Stock', $Stock);
            $prepare->bindParam(':id', $ID_Suplemento);
            $prepare->bindParam(':ruta', $ruta);
            return $prepare->execute();
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }

    public function eliminarProducto($ID_Suplemento)
    {
        $objpdo=$this->Start();
        $query = 'delete from producto where ID_Suplemento = :ID_Suplemento';
        $sql = $objpdo->prepare($query);
        $sql->bindParam(':ID_Suplemento', $ID_Suplemento);
        return $sql->execute();

    }



    
}
