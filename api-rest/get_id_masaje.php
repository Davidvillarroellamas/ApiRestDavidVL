<?php
    require('../includes/Masaje.php');

    if ($_SERVER['REQUEST_METHOD'] =='GET' && isset($_GET['id'])) {
          
         Masaje::get_id_masaje($_GET['id']);
        
    }else{
        echo 'Nose envio el Id';
    }


?>