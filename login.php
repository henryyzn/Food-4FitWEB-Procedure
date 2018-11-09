<?php
    session_start();

    require_once("cms/models/DAO/dataBase.php");
    require_once("cms/models/DAO/login-usuarioDAO.php");

    $_SESSION['id_usuario'] = null;
    $_SESSION['nome_usuario'] = null;
    $_SESSION['email_usuario'] = null;
    $_SESSION['dtNasc_usuario'] = null;
    $_SESSION['cpf_usuario'] = null;
    $_SESSION['rg_usuario'] = null;
    $_SESSION['genero_usuario'] = null;
    $_SESSION['telefone_usuario'] = null;
    $_SESSION['celular_usuario'] = null;

    if(isset($_GET['btn-login'])){

        $loginUsuarioDAO = new loginUsuarioDAO;
        $login = $_GET['login'];
        $senha = $_GET['senha'];

        $listUsuario = $loginUsuarioDAO->checkLogin($login, $senha);

        if(@count($listUsuario)>0){
            $_SESSION['id_usuario'] = $listUsuario->id;
            $_SESSION['nome_usuario'] = $listUsuario->nome_completo;
            $_SESSION['email_usuario'] = $listUsuario->email;
            $_SESSION['dtNasc_usuario'] = $listUsuario->data_nascimento;
            $_SESSION['cpf_usuario'] = $listUsuario->cpf;
            $_SESSION['rg_usuario'] = $listUsuario->rg;
            $_SESSION['genero_usuario'] = $listUsuario->genero;
            $_SESSION['telefone_usuario'] = $listUsuario->telefone;
            $_SESSION['celular_usuario'] = $listUsuario->celular;
            header('location:meu-perfil.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Logue-se - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/style-light.css">
    <link rel="stylesheet" href="assets/css/bases-light.css">
    <link rel="stylesheet" href="assets/css/navbar-light.css">
    <link rel="stylesheet" href="assets/css/footer-light.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/sizes.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body class="login-bg">
    <section class="main-login">
        <h2 class="title-login">FOOD<br>4FIT</h2>
        <h3 class="subtitle-login">COMIDA FITNESS</h3>
        <div class="form-generic width-400px margin-left-auto margin-right-auto">
            <form class="form-generic-content" method="GET" name="frmlogin" action="login.php">
                <label for="login" class="label-generic margin-top-30px" style="color: #fff;">Login:</label>
                <input type="email" name="login" id="login" class="input-generic" style="color: #fff;">
                <label for="senha" class="label-generic" style="color: #fff;">Senha:</label>
                <input type="password" name="senha" id="senha" class="input-generic" style="color: #fff;">
                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px">Esqueci minha senha</span>
                    <button type="submit" name="btn-login" value="Login" class="btn-generic">
                        <span>Entrar</span>
                    </button>
                </div>

                <div class="login-form-separator"></div>

                <div class="social-login-button facebook margin-bottom-15px">
                    <span class="margin-left-15px margin-top-15px margin-bottom-15px">Login com Facebook</span>
                </div>
                <div class="social-login-button google">
                    <span class="margin-left-15px margin-top-15px margin-bottom-15px">Login com Google</span>
                </div>

                <div class="login-form-separator"></div>

                <a href="cadastro-usuario.php" class="login-link margin-bottom-30px">Não tem uma conta? <span>Cadastre-se.</span></a>
            </form>
        </div>
	</section>
</body>
</html>
