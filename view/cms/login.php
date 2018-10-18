<?php
    require_once("../../controller/FuncionarioController.class.php");
    if (FuncionarioController::getFuncionarioAtual()) {
        header("location:home.php");
        die();
    }
?>

<!--
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
       <link rel="stylesheet" href="../assets/css/align.css">
       <link rel="stylesheet" href="../assets/css/sizes.css">
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
	    <script src="../assets/public/js/jquery-3.3.1.min.js"></script>
	    <script src="../assets/public/js/jquery.toast.min.js"></script>
	    <script src="../assets/js/util.js"></script>
	    <script src="../assets/js/cms/main.js"></script>
	    <script src="../assets/js/cms/login.controller.js"></script>
    </head>
    <body>
        <section id="main-login" data-controller="LoginController">
            <h2 id="titulo">
                <span>Food</span>
                <span>4FIT</span>
                <span id="subtitulo">Comida Fitness</span>
            </h2>
            <form id="form-login" class="width-700px margin-auto padding-top-30px" autocomplete="off">
                <input type="text" name="matricula" placeholder="Matrícula" class="margin-bottom-20px" autocomplete="off" required>
                <input type="password" name="senha" autocomplete="off" id="senha" placeholder="Senha" required>
                <div id="rodape">
                    <a href="nao-tenho-conta.php">Não tenho uma conta</a>
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </section>
    </body>
</html>
-->
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
       <link rel="stylesheet" href="../assets/css/align.css">
       <link rel="stylesheet" href="../assets/css/sizes.css">
       <link rel="stylesheet" href="../assets/css/keyframes.css">
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
	    <script src="../assets/public/js/jquery-3.3.1.min.js"></script>
	    <script src="../assets/public/js/jquery.toast.min.js"></script>
	    <script src="../assets/js/util.js"></script>
	    <script src="../assets/js/cms/main.js"></script>
	    <script src="../assets/js/cms/login.controller.js"></script>
    </head>
    <body class="main-login" data-controller="LoginController">
        <article class="image-bg-login">
            <h2>FOOD<br>4FIT<span>COMIDA FITNESS</span></h2>
        </article>
        <div class="form-login-wrapper">
            <figure>
                <img src="" alt="">
            </figure>
            <form id="form-login" class="width-550px margin-auto padding-top-60px" autocomplete="off">
                <input type="text" name="matricula" placeholder="Matrícula" class="margin-bottom-20px" autocomplete="off" required>
                <input type="password" name="senha" autocomplete="off" id="senha" placeholder="Senha" required>
                <div id="rodape">
                    <a href="nao-tenho-conta.php">Não tenho uma conta</a>
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </div>
    </body>
</html>
