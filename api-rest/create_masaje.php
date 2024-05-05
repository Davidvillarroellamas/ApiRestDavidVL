<?php
    require_once('../includes/Masaje.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'
    && isset($_GET['nombre']) && isset ($_GET['descripcion']) && isset ($_GET['duracion']) && isset ($_GET['precio'])){

        Masaje::create_masaje($_GET['nombre'], $_GET['descripcion'], $_GET['duracion'], $_GET['precio']);
    }
?>
