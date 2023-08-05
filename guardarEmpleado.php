<title> Empleados</title>
<?php
include("conexion.php");
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$puesto = $_POST["puesto"];
$salario = $_POST["salario"];
$edad = $_POST["edad"];
$query1 = "SELECT e.id, e.nombre, e.puesto, e.edad, e.salario from Empleados e WHERE e.id=$id";
$res1 = sqlsrv_prepare($con, $query1);
if (sqlsrv_execute($res1)) {
    //header("location:insertar.php");
    print('<script language="javascript"> alert("Ya existe un empleado con este identificador."); </script>');
    print('<meta http-equiv="refresh" content="0;url=insertar.php">');
}

$query = "INSERT INTO empleados(id, nombre, puesto, edad, salario) VALUES($id,'$nombre','$puesto',$edad,$salario);";
$res = sqlsrv_prepare($con, $query);
try {
    if (sqlsrv_execute($res)) {
        header("location:insertar.php");
    } else if (($errors = sqlsrv_errors()) != null) {
        foreach ($errors as $error) {
            //  echo '<script language="javascript"> alert("Ocurrió un error durante la inserción de los datos del empleado."); </script>';
            // echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
            //echo "code: " . $error['code'] . "<br />";
            //echo "message: " . $error['message'] . "<br />";
        }
    }
} catch (Exception $ex) {

}
?>