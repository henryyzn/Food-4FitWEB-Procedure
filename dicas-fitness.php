<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dicas Fitness - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bases.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">DICAS FITNESS</h2>
        <p id="page-subtitle">Acompanhe dicas sobre saúde e bem estar que nossos colaboradores desenvolvem especialmente para os nossos clientes!</p>
        <div class="fitness-tips-block">
            <?php
                for($i = 1; $i < 8; $i++){
            ?>
            <article class="fitness-tips-card">
                <h2 class="padding-top-30px padding-left-30px">Título da Publicação</h2>
                <p class="padding-top-15px padding-left-30px">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."</p>
                <div class="fitness-tips-row">
                    <span class="padding-left-30px padding-top-15px padding-bottom-30px">Dt. Publicação: 01/01/2018</span>
                    <span class="padding-right-30px padding-top-15px padding-bottom-30px">Autor: André Sanchez</span>
                </div>
            </article>
            <?php
                }
            ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
