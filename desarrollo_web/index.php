<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario de registro</title>
    <link rel="stylesheet" href="estilos_formulario.css">
</head>
<body>
<?php
$nombre = "";
$nombreErr = "";
if ($_SERVER["REQUEST_METHOD"]){
    if (empty($_POST["nombre"])){
        $nombreErr = "El campo nombre es requerido";
    }
    else{
        $nombre = test_input($_POST["nombre"]);
        if(!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+(?:\s[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+)?$/", $nombre)){
            $nombreErr = "El nombre no es válido";
        }
    }
    }

    $apellidos = "";
    $apellidosErr = "";
    if ($_SERVER["REQUEST_METHOD"]){
        if (empty($_POST["apellidos"])){
            $apellidosErr = "El campo apellidos es requerido";
        }
        else{
            $apellidos = test_input($_POST["apellidos"]);
            if(!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+(?:\s(?:[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+|de\s(?:la\s)?[A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]+))?$/", $apellidos)){
                $apellidosErr = "Apellidos incorrectos";
            }
        }
        }

        $domicilio = "";
        $domicilioErr = "";
        if ($_SERVER["REQUEST_METHOD"]){
            if (empty($_POST["domicilio"])){
                $domicilioErr = "El campo domicilio es requerido";
            }
            else{
                $domicilio = test_input($_POST["domicilio"]);
                if(!preg_match("/^[A-ZÁÉÍÓÚÜÑ][a-zA-Záéíóúüñ\s,]+ [A-ZÁÉÍÓÚÜÑ][a-záéíóúüñ]{2,}$/", $domicilio)){
                    $domicilioErr = "Domicilio incorrecto";
                }
            }
            }

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
?>

    <div class="contenedor">
        <label for="titulo" class="titulo">Registro de usuarios</label>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="formulario" name="formulario" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Escribe tu nombre.">
            <br>
            <p class="error" style="color: #ff5733;">
                <?php echo $nombreErr ; ?>
            </p>
            <label for="apellidos">Apellidos: </label>
            <input type="text" value="<?php echo $apellidos; ?>" name="apellidos" id="apellidos" class="form-control" placeholder="Escribe tus apellidos.">
            <br>
            <p class="error" style="color: #ff5733;">
                <?php echo $apellidosErr; ?>
            </p>

            <label for="usuario">Usuario: </label>
            <input type="text" name="usuario" id="usuario" placeholder="Escribe nombre de usuario">
            <br>
            <label for="pwd">Contraseña: </label>
            <input type="password" name="pwd" id="pwd" placeholder="Escribe tu contraseña">
            <br>
            <label for="genero">Seleccione su género: </label>
                <div class="radio">
                    <input type="radio" value="M" name="genero" id="H">
                    <label for="H">Masculino</label>
                    <input type="radio" value="F" name="genero" id="M">
                    <label for="M">Femenino</label>
                    <span class="error-message" id="generoError">Seleccione un género.</span>
                </div>
            <label for="domicilio">Domicilio: </label>
            <input type="text" value="<?php echo $domicilio; ?>" name="domicilio" id="domicilio" class="form-control" placeholder="Escribe tu domicilio.">
            <br>
            <p class="error" style="color: #ff5733;">
                <?php echo $domicilioErr ; ?>
            </p>
            <div class="checkbox">
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">Acepto los términos y condiciones. </label>
                <span class="error-message" id="terminosError">Acepta términos y condiciones.</span>
            </div>
            <div class="btn-group">
                <a href="formulario.html" class="cancelar">Cancelar</a>
                <input type="submit" value="Registrar" class="guardar">
            </div>
        </form>
    </div>
</body>
</html>