<title> Empleados</title>
<?php

$serverName = 'DESKTOP-12HO3KM\TESTELOPEZ';
$dbName = 'CompanyX';
$username = 'admin';
$password = 'root';
$conection = array("Database" => $dbName, "UID" => $username, "PWD" => $password, "CharacterSet" => "UTF-8");
try {
    $con = sqlsrv_connect($serverName, $conection);
} catch (TypeError $err) {
    echo "Ocurrió un error durante la inserción de los datos del empleado.";
    print("La excepción fué: ------------->>>" . $err . "  Query:   " . $query);
    echo "error en conexion.php";
}

?>