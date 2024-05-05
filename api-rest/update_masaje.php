<?php
    require_once('../includes/Masaje.php');

    if($_SERVER['REQUEST_METHOD'] == 'PUT'
    && isset($_GET['id']) && isset($_GET['nombre']) && isset($_GET['descripcion']) && isset($_GET['duracion']) && isset($_GET['precio'])){
        Masaje::update_masaje($_GET['id'], $_GET['nombre'], $_GET['descripcion'], $_GET['duracion'], $_GET['precio']);
    }
?>
