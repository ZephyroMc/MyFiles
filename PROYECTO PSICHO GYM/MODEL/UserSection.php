<?php
Class UserSection{
    private $correoUserSEC;
    private $TypeUserSEC;
    private $idUserSEC;
    
    public function __construct($correoUserSEC,$TypeUserSEC,$idUserSEC) {
        session_start();
        $_SESSION['Correo'] = $correoUserSEC;
        $_SESSION['TypeUser'] = $TypeUserSEC;
        $_SESSION['idUser'] = $idUserSEC;
        
    }

	public function CerrarSesion(){
		$_SESSION['Correo'] = null;
        $_SESSION['TypeUser'] = null;
        $_SESSION['idUser'] = null;
		session_destroy();
	}

    public function getCorreoUserSEC(){
		return $_SESSION['Correo'];
	}

	public function setCorreoUserSEC($correoUserSEC){
		$_SESSION['Correo'] = $correoUserSEC;
	}

	public function getTypeUserSEC(){
		return $_SESSION['TypeUser'];
	}

	public function setTypeUserSEC($TypeUserSEC){
		$_SESSION['TypeUser'] = $TypeUserSEC;
	}

	public function getIdUserSEC(){
		return $_SESSION['idUser'];
	}

	public function setIdUserSEC($idUserSEC){
		$_SESSION['idUser'] = $idUserSEC;
	}


}

?>