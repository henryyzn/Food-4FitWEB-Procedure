<?php
    session_start();

    require_once("cms/models/DAO/dataBase.php");
    require_once("cms/models/DAO/login-usuarioDAO.php");

    require_once("caminho-pasta.php");

    $_SESSION['id_usuario'] = null;
    $_SESSION['nome_usuario'] = null;
    $_SESSION['email_usuario'] = null;
    $_SESSION['dtNasc_usuario'] = null;
    $_SESSION['cpf_usuario'] = null;
    $_SESSION['rg_usuario'] = null;
    $_SESSION['genero_usuario'] = null;
    $_SESSION['telefone_usuario'] = null;
    $_SESSION['celular_usuario'] = null;
    $_SESSION['avatar_usuario'] = null;

    if(isset($_GET['btn-login'])){

        $loginUsuarioDAO = new loginUsuarioDAO;
        $login = $_GET['login'];
        $senha = $_GET['senha'];

        $listUsuario = $loginUsuarioDAO->checkLogin($login, $senha);

        if(@count($listUsuario)>0){
            $_SESSION['id_usuario'] = $listUsuario->id;
            $_SESSION['tipo_pessoa_usuario'] = $listUsuario->tipo_pessoa;
            $_SESSION['primeiroNome_usuario'] = $listUsuario->nome;
            $_SESSION['sobrenome_usuario'] = $listUsuario->sobrenome;
            $_SESSION['nome_usuario'] = $listUsuario->nome_completo;
            $_SESSION['nome_fantasia_usuario'] = $listUsuario->nome_fantasia;
            $_SESSION['razao_social_usuario'] = $listUsuario->razao_social;
            $_SESSION['tipo_pessoa_usuario'] = $listUsuario->tipo_pessoa;
            $_SESSION['tipo_pessoa_usuario'] = $listUsuario->tipo_pessoa;
            $_SESSION['email_usuario'] = $listUsuario->email;
            $_SESSION['dtNasc_usuario'] = $listUsuario->data_nascimento;
            $_SESSION['cpf_usuario'] = $listUsuario->cpf;
            $_SESSION['cnpj_usuario'] = $listUsuario->cnpj;
            $_SESSION['rg_usuario'] = $listUsuario->rg;
            $_SESSION['genero_usuario'] = $listUsuario->genero;
            $_SESSION['telefone_usuario'] = $listUsuario->telefone;
            $_SESSION['celular_usuario'] = $listUsuario->celular;
            $_SESSION['avatar_usuario'] = $listUsuario->avatar;
            $_SESSION['pergunta_secreta_usuario'] = $listUsuario->pergunta_secreta;
            $_SESSION['resposta_secreta_usuario'] = $listUsuario->resp_secreta;
            $_SESSION['id_pergunta_secreta_usuario'] = $listUsuario->id_pergunta_secreta;
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
	<link rel="stylesheet" id="themeStyle" href="assets/css/style-light.css">
    <link rel="stylesheet" id="themeBases" href="assets/css/bases-light.css">
    <link rel="stylesheet" id="themeNavbar" href="assets/css/navbar-light.css">
    <link rel="stylesheet" id="themeFooter" href="assets/css/footer-light.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/sizes.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            $('#navbar-flat').css('display', 'none');
        });
    </script>
</head>
<body class="login-bg">
    <?php require_once('components/navbar.php')?>
    <section class="main-login">
        <article class="column-one-lg">
            <figure onclick="javascript:location.href='index.php'">
                <img src="assets/images/logo/logo-4fit.svg" alt="Logo da Food 4Fit">
            </figure>
        </article>
        <div class="column-two-lg border-30px">
            <form class="form-generic-content width-600px" method="GET" name="frmlogin" action="login.php">
                <h2>FOOD<br />4FIT</h2>
                <span>COMIDA FITNESS</span>
                <label for="login" class="label-generic margin-top-30px">Login:</label>
                <input type="email" name="login" id="login" class="input-generic">
                <label for="senha" class="label-generic">Senha:</label>
                <input type="password" name="senha" id="senha" class="input-generic">
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
