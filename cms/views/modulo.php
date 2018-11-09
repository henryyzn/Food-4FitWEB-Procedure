<?php
    function validateLog(){
        if(!isset($_SESSION['matricula_funcionario'])) {
            session_unset();
            header("location:login.php");
        }
    }
    if(isset($_GET['logout'])){
        // Remove Todas As Sessões
        session_unset();
        $_SESSION['matricula_funcionario'] = null;
        header('location:login.php');
	}
?>
