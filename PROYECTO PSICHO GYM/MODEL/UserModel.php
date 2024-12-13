<?php
require_once('database.php');

class UserModel extends database
{

    private $correoUser;

    function __construct($correoUserIN)
    {

        $this->correoUser = $correoUserIN;
    }

    // Consulta Login

    public function ConsultaLogin()
    {
        $objpdo = $this->Start();
        try {
            $query = 'select ID_Cliente,Nombre,email,clave,rol,StateUser from usuario where email =:correoUser';
            $sql = $objpdo->prepare($query);
            $sql->bindParam(':correoUser', $this->correoUser);
            $sql->execute();
            return $sql->fetch(pdo::FETCH_OBJ);
            $objpdo->Disconnect();
        } catch (\Throwable $error) {
            echo ('Error: ' . $error->getMessage());
            die();
        }
    }

    //Registrar Usuario

    public function RegistroUsuario($userName, $apellido, $direccion, $telefono, $correoUser, $passwordUser, $Rol, $estado)
    {
        $objetoconexion = new database;
        $objpdo = $objetoconexion->Start();
        try {
            $checkQuery = 'SELECT COUNT(*) FROM usuario WHERE email = :correoUser';
            $checkStmt = $objpdo->prepare($checkQuery);
            $checkStmt->bindParam(':correoUser', $correoUser);
            $checkStmt->execute();
            $userExists = $checkStmt->fetchColumn();

            if ($userExists > 0) {
                // El usuario ya existe
                return false;
            } else {
                // Inserta un nuevo usuario en la base de datos
                $query = 'INSERT INTO usuario (Nombre,apellido, Dirección,Teléfono,email, clave, rol, StateUser) VALUES (:userName,:apellido,:direccion,:telefono,:correoUser, :passwordUser, :rol, :Estado)';
                $sql = $objpdo->prepare($query);
                $sql->bindParam(':userName', $userName);
                $sql->bindParam(':apellido', $apellido);
                $sql->bindParam(':correoUser', $correoUser);
                $sql->bindParam(':passwordUser', $passwordUser);
                $sql->bindParam(':direccion', $direccion);
                $sql->bindParam(':telefono', $telefono);
                $sql->bindParam(':rol', $Rol);
                $sql->bindParam(':Estado', $estado);

                return $sql->execute();
            }
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }



    public function ConsultaUsuario($id_cliente)
    {
        $objetoconexion = new database;
        $objpdo = $objetoconexion->Start();

        try {
            $checkQuery = 'SELECT * FROM usuario where ID_Cliente=:Id_cliente';
            $checkStmt = $objpdo->prepare($checkQuery);
            $checkStmt->bindParam(':Id_cliente', $id_cliente);
            $checkStmt->execute();
            return $checkStmt->fetchObject();
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }

    public function ActualizarDatos($id, $userName, $apellido, $direccion, $telefono, $correoUser, $passwordUser, $Rol, $estado)
    {
        $objetoconexion = new database();
        $objpdo = $objetoconexion->Start();
        try {
            $checkQuery = 'SELECT COUNT(*) FROM usuario WHERE email = :correoUser';
            $checkStmt = $objpdo->prepare($checkQuery);
            $checkStmt->bindParam(':correoUser', $correoUser);
            $checkStmt->execute();
            $userExists = $checkStmt->fetchColumn();
            $query = "UPDATE usuario 
                SET Nombre = :userName, 
                    apellido = :apellido, 
                    Dirección = :direccion, 
                    Teléfono = :telefono, 
                    clave = :passwordUser, 
                    rol = :Rol, 
                    StateUser = :estado,
                    Email = :correoUser 
                WHERE ID_Cliente = :id";
            $sql = $objpdo->prepare($query);
            $sql->bindParam(':userName', $userName);
            $sql->bindParam(':apellido', $apellido);
            $sql->bindParam(':direccion', $direccion);
            $sql->bindParam(':telefono', $telefono);
            $sql->bindParam(':correoUser', $correoUser);
            $sql->bindParam(':passwordUser', $passwordUser);
            $sql->bindParam(':Rol', $Rol);
            $sql->bindParam(':estado', $estado);
            $sql->bindParam(':id', $id);
            $sql->execute();
        } catch (\Throwable $error) {
            echo 'Error: ' . $error->getMessage();
            die();
        }
    }
    public function eliminarUsuario($dato)
    {
        $objetoconexion = new database();
        $objpdo = $objetoconexion->Start();
        $query = 'delete from usuario where ID_Cliente = :idcliente';
        $sql = $objpdo->prepare($query);
        $sql->bindParam(':idcliente', $dato);
        return $sql->execute();

    }
}
