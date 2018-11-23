<?php
    //Init_set aqui estou inserindo para reportar erros de um modo facilitador
    //Para podermos ajustar
    ini_set("display_errors", "1");
    ini_set("display_startup_errors", "1");
    error_reporting(E_ALL);
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
