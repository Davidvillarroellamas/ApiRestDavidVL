<?php
require_once('../includes/Masaje.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        Masaje::get_all_masajes($id);
    } else {
        Masaje::get_all_masajes();
    }
}
?>
