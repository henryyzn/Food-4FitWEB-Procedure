<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuário - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/public/css/jquery-ui.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bases.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/sizes.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/public/js/jquery-ui.min.js"></script>
	<script src="assets/public/js/jquery.mask.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/form.js"></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">INFORMAÇÕES BÁSICAS</h1><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-600px margin-left-auto margin-right-auto display-none">
            <div class="form-stepper margin-top-20px margin-bottom-10px" data-f4f-form-stepper="1">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <form id="form-cadastro-usuario" class="form-generic-content" data-f4f-form>
                <?php require_once("cadastro-usuario/step-1.html") ?>
                <?php require_once("cadastro-usuario/step-2.html") ?>
                <?php require_once("cadastro-usuario/step-3.html") ?>
                <input type="submit" class="display-none">
            </form>
        </div>
	</section>
	<div class="generic-modal" id="modal-cadastro">
        <article class="generic-modal-wrapper" style="padding: 200px;">
            <h2>Você está cadastrado!</h2>
            <span class="margin-top-20px margin-bottom-20px">Seu navegador te redirecionará para a página de login em <span class="counter">5</span> segundos.</span>
            <p>Clique <a href="index.php">aqui</a> para pular</p>
        </article>
    </div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
