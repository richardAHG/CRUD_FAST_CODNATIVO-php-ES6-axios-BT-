<?php

$conec = new mysqli('localhost','root','','dbexamen');

mysqli_query($conec,'SET NAMES "utf8"');

if (mysqli_connect_errno())
{
	printf("Falló conexión a la base de datos: %s\n",mysqli_connect_error());
	exit();
}

function ejecutarConsulta($sql)
{
    global $conec;
    $query = $conec->query($sql);
    return $query;
}

function ejecutarConsultaSimple($sql)
{
    global $conec;
    $query = $conec->query($sql);
    $row = $query->fetch_assoc();
    return $query;
}

?>