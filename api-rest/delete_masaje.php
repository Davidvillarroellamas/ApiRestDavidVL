<?php
    require_once('../includes/Masaje.php');

    if($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])){
        Masaje::delete_masaje($_GET['id']);
    }
?>
