<?php
    @session_start();
    function validateLog(){
        if(!isset($_SESSION['id_usuario'])) {
            session_unset();
            header("location:login.php");
        }
    }
    if(isset($_GET['logout'])){
        // Remove Todas As Sessões
        session_destroy();
        session_unset();
        header('location:login.php');
	}
?>
