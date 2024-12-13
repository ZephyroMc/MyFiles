<?php

use function PHPSTORM_META\type;

Class database{

    
    public function Start(){

        $dbname='Gym';
        $dbusuario='root';
        $dbcontra='';
        $objpdo = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8',$dbusuario,$dbcontra);
        return $objpdo;
    }
    public function Disconnect(){
        return null;
    }

}
?>