<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="referrer" content="no-referrer">
	<title>(12) Notificações - Food 4fit</title>
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
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title">NOTIFICAÇÕES</h2>
        <div class="generic-block">
            <header class="notifications-header padding-top-10px padding-bottom-10px">
                <input type="checkbox" name="markall" id="markall" class="margin-left-30px margin-right-5px">
                <label for="markall" class="label-markall">Marcar Todas</label>

                <span class="margin-left-30px">Excluir</span>
                <span class="margin-left-15px">Marcar como lida</span>
            </header>
            <?php
                for($i = 1; $i < 12; $i++){
            ?>
            <div class="notifications-line">
                <input type="checkbox" name="check" class="margin-top-15px margin-bottom-15px margin-left-30px">
                <div class="archive-img margin-left-15px"><img src="assets/images/icons/star.svg" alt="Guardar"></div>
                <h2 class="margin-left-15px">Título</h2>
                <p class="margin-left-25px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem, tempora!</p>
                <span>01/01/2018</span>
                <div class="delete-img"><img src="assets/images/icons/delete.svg" alt="Excluir"></div>
            </div>
            <?php
                }
            ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
