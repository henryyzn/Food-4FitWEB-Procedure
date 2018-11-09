<?php
    function validateLog(){
        if(!isset($_COOKIE['matricula'])) {
            session_unset();
            header("location:login.php");
        }else{
            session_start();
        }
    }
    if(isset($_GET['logout'])){
        // Remove Todas As Sessões
        session_unset();
        $_SESSION['id_funcionario'] = null;
        setcookie('matricula', null);
        header('location:login.php');
	}
?>
