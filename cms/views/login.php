<?php
    session_start();

    require_once("../models/DAO/dataBase.php");
    require_once("../models/DAO/login.php");
    require_once("../../caminho-pasta.php");
    $erro = false;

    if(isset($_POST['btn-login'])){
        require_once('../models/DAO/login.php');

        $loginDAO = new loginDAO;
        $matricula = $_POST['matricula'];
        $senha = $_POST['senha'];

        $_SESSION['id_funcionario'] = null;
        $_SESSION['nome_funcionario'] = null;
        $_SESSION['email_funcionario'] = null;
        $_SESSION['matricula_funcionario'] = null;
        $_SESSION['avatar_funcionario'] = null;
        $_SESSION['salario_funcionario'] = null;
        $_SESSION['data_efetivacao_funcionario'] = null;
        $_SESSION['data_nascimento_funcionario'] = null;
        $_SESSION['genero_funcionario'] = null;
        $_SESSION['rg_funcionario'] = null;
        $_SESSION['cpf_funcionario'] = null;

        $listLogin = $loginDAO->checkLogin($matricula, $senha);

        //Resgatando do Banco de dados
        if($listLogin){
            $_SESSION['id_funcionario'] = $listLogin->id;
            $_SESSION['matricula_funcionario'] = $listLogin->matricula;
            $_SESSION['nome_funcionario'] = $listLogin->nome_completo;
            $_SESSION['email_funcionario'] = $listLogin->email;
            $_SESSION['avatar_funcionario'] = $listLogin->avatar;
            $_SESSION['salario_funcionario'] = $listLogin->salario;
            $_SESSION['data_efetivacao_funcionario'] = $listLogin->data_efetivacao;
            $_SESSION['data_nascimento_funcionario'] = $listLogin->data_nascimento;
            $_SESSION['genero_funcionario'] = $listLogin->genero;
            $_SESSION['rg_funcionario'] = $listLogin->rg;
            $_SESSION['cpf_funcionario'] = $listLogin->cpf;

            header('location:index.php');
        } else {
            $erro = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login :: Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
        <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
        <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
	    <link rel="stylesheet" href="../../assets/public/css/jquery.toast.min.css">
	    <link rel="stylesheet" href="../../assets/css/font-style.css">
        <link rel="stylesheet" href="../../assets/css/align.css">
        <link rel="stylesheet" href="../../assets/css/sizes.css">
        <link rel="stylesheet" href="../../assets/css/keyframes.css">
	    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
	    <script src="../../assets/public/js/jquery.toast.min.js"></script>
    </head>
    <body class="main-login">
        <article class="image-bg-login">
            <h2>FOOD<br>4FIT<span>COMIDA FITNESS</span></h2>
        </article>
        <div class="form-login-wrapper">
            <figure>
                <img src="../../assets/images/logo/logo-4fit.svg" alt="">
            </figure>
            <form action="login.php" name="frmlogin" method="POST" id="form-login" class="width-550px margin-auto padding-top-60px" autocomplete="off">
                <?php if ($erro) { ?>
                    <span style="color: #f00; text-align: center;">Usuário ou senha incorretos.</span>
                <?php } ?>
                <input type="text" name="matricula" placeholder="Matrícula" class="margin-bottom-20px" autocomplete="off" required>
                <input type="password" name="senha" autocomplete="off" id="senha" placeholder="Senha" required>
                <div id="rodape">
                    <a href="nao-tenho-conta.php">Não tenho uma conta</a>
                    <input type="submit" name="btn-login" value="Login">
                </div>
            </form>
        </div>
    </body>
</html>
