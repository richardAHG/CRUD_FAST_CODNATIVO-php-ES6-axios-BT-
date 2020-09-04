<?php
require_once '../config/conexion.php';
class Persona {

    public function __construct() {
       
    }

    public function listar()
    {
        $sql = "SELECT userid,id,title,body from personas";
        return ejecutarConsulta($sql);
        
    }

    public function eliminar($id)
    {
        $sql = "UPDATE personas SET title='_del' where userid='$id'";
        return ejecutarConsulta($sql);
    }


}

?>