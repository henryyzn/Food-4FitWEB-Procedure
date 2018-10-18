<?php
    require_once("../../controller/FuncionarioController.class.php");
    if (FuncionarioController::getFuncionarioAtual()) {
        header("location:home.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
    </head>
    <body>
        <a id="botao-voltar" href="login.php">Voltar</a>
        <section id="main-login">
            <h2 id="titulo">
                <span>Food</span>
                <span>4FIT</span>
                <span id="subtitulo">Comida Fitness</span>
            </h2>
            <p id="texto-nao-tenho-conta">
                Caso você não tenha uma conta no sistema, contate um administrador para que ele realize o seu cadastro de forma oficial para que você tenha acesso ao software. Suas informações de contrato serão requiridas, assim como seus dados pessoais.
            </p>
        </section>
    </body>
</html>
