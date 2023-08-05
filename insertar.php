<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title> Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row d-flex mt-5">
            <div class="col-6">
                <div class="">
                    <h2 class="text-center">Insertar datos de empleados</h2>

                </div>
                <div class="center-block">
                    <form class="" action="guardarEmpleado.php" method="post">
                        <div class="form-group">
                            <label for="">Id</label>
                            <input name="id" type="number" min="1" max="300000000" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Nombre completo</label>
                            <input name="nombre" type="text" max="255" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Puesto</label>
                            <input name="puesto" type="text" max="255" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Edad</label>
                            <input name="edad" type="number" min="18" max="130" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Salario </label>
                            <input name="salario" type="number" min="1" max="3000000000" required="true" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="Guardar" value="Guardar empleado" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6">
                <div class="center-block mb-5">
                    <h2>Lista de empleados</h2>
                    <div style="position: relative; height: 350px; overflow: auto; display: block;">
                        <table class="table table-bordered table-striped mb-0">

                            <th scope="col">Id</th>
                            <th scope="col">Nombre completo</th>
                            <th scope="col">Puesto</th>
                            <th scope="col">Edad</th>
                            <th scope="col">Salario</th>



                            <?php
                            $query = "SELECT e.id, e.nombre, e.puesto, e.edad, e.salario from Empleados e";
                            try {
                                $res = sqlsrv_query($con, $query);

                            } catch (TypeError $e) {
                                echo '<script language="javascript">alert("Se generó un error durante la carga de los empleados.");</script>';
                                print("La excepción fué: ------------->>> " . $e . "  Query:   " . $query);
                            }
                            $res = sqlsrv_query($con, $query);

                            while ($row = sqlsrv_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td>
                                        <?= $row[0] ?>
                                    </td>
                                    <td>
                                        <?= $row[1] ?>
                                    </td>
                                    <td>
                                        <?= $row[2] ?>
                                    </td>
                                    <td>
                                        <?= $row[3] ?>
                                    </td>
                                    <td>
                                        <?= $row[4] ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                    </div>
                    </table>
                </div>



            </div>
        </div>

    </div>



</body>

</html>