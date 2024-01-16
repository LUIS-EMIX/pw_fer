<?php

include("seguridad.php");

?>

<?php
include_once("conexion.php");

$sql = "SELECT * FROM usuarios #ORDER BY nombre ASC";
$result = $conex->prepare($sql);
$result->execute();

$row = $result->fetchAll();
$tot_registros = $result->rowCount();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANEL DE REGISTRO</title>
    <link rel="stylesheet" href="estilos_crud.css">
    <link rel="stylesheet" href="../desarrollo_web/css/font-awesome.min.css">
    <script src="css/js/jquery-latest.js"></script>
</head>
<body>
    <div class="menu_horizontal">
        <div class="t1">
            <label for="umb">UES San José del Rincón</label>
        </div>
        <div class="buscador">
            <input type="text" name="buscador" id="buscador" placeholder="¿A quién buscaremos hoy?">
        </div>
        <div class="ele">
            <label for="l">L <i class="fa fa-angle-down"></i></label>
        </div>
    </div>

    <div class="menu_vertical">
        <a class="inicio" href="#" class="current scroll"><i class="fa fa-align-justify" aria-hidden="true"></i></a>
        <a class="a" href="#" class="current scroll"><i class="fa fa-home" aria-hidden="true"></i></a>
        <a class="a" href="#" class="current scroll"><i class="fa fa-plus" aria-hidden="true"></i></a>
        <a class="a" href="#" class="current scroll"><i class="fa fa-group" aria-hidden="true"></i></a>
        <a class="a" href="logout.php" class="current scroll"><i class="fa fa-power-off" aria-hidden="true"></i></a>
    </div>

    <div class="contenedor">
        <div class="titulo">
            <label for="titulo">Consulta general de usuarios</label>
        </div>

        <div class="registros">
            <label for="registros" class="registros">Total de registros: <?php echo $tot_registros; ?></label>
        </div>
        <div class="tabla">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Género</th>
                    <th>Domicilio</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($row as $fila): ?>
                <tr>
                    <td>
                        <?php echo $fila['usuario_id']; ?>
                    </td>
                    <td>
                        <?php echo $fila['nombre']; ?>
                    </td>
                    <td>
                        <?php echo $fila['apellidos']; ?>
                    </td>
                    <td>
                        <?php if($fila['genero'] == "M"){
                            echo ("Masculino");
                        } else{
                            echo ("Femenino");
                        } ?>
                    </td>
                    <td>
                        <?php echo $fila['domicilio']; ?>
                    </td>
                </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="css/js/jquery-packed_plugins.min.js"></script>
    <script src="css/js/smooth.js"></script>
    <script src="css/js/headroom.min.js"></script>
    <script src="css/js/menu.js"></script>
</body>
</html>