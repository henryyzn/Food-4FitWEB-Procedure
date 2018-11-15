<?php
    function validateLog(){
        if(!isset($_SESSION['id_usuario'])) {
            session_unset();
            header("location:login.php");
        }
    }
    if(isset($_GET['logout'])){
        // Remove Todas As Sessões
        //echo "<script>alert('Teste')</script>";
        session_unset();


//        if (isset($_SERVER['HTTP_COOKIE'])) {
//            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
//            foreach($cookies as $cookie) {
//                $parts = explode('=', $cookie);
//                $name = trim($parts[0]);
//                setcookie($name, '', time()-1000);
//                setcookie($name, '', time()-1000, '/');
//            }
//        }


        header('location:login.php');
	}

    function carrinho(){

    }
?>
