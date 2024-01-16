<?php

if (isset($_POST["guardar"])){
    echo ("Enviado");
}

else{
    header("location:login.html");
}
?>