<?php
    session_start();
    require_once('modulo.php');
    validateLog();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#9CC283">
    <meta name="msapplication-navbutton-color" content="#9CC283">
    <meta name="apple-mobile-web-app-status-bar-style" content="#9CC283">
	<title>Meus Favoritos</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" id="themeStyle" href="assets/css/style-light.css">
    <link rel="stylesheet" id="themeBases" href="assets/css/bases-light.css">
    <link rel="stylesheet" id="themeNavbar" href="assets/css/navbar-light.css">
    <link rel="stylesheet" id="themeFooter" href="assets/css/footer-light.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <div class="generic-block"><!-- SEGUNDO CONTAINER-FILHO DO CABEÇALHO DA INDEX -->
            <h2 id="page-title">MEUS FAVORITOS</h2><!-- TÍTULO DA PÁGINA -->
            <div class="generic-grid animate fadeInUp">
                <?php
                    for($i = 0; $i < 10; $i++){
                ?>
                <div class="generic-card">
                    <img src="assets/images/dishs/img1.jpg" alt="Teste" class="generic-card-img">
                    <div class="generic-card-overlay">
                        <span class="card-dish-name margin-bottom-30px">Frango Com Batatas</span>
                        <div class="card-dish-separator margin-bottom-15px"></div>
                        <p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
                        <div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
                            <span class="padding-right-15px">R$ 9,90</span><!-- PREÇO -->
                            <div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
                        </div>
                        <figure class="estrela-favoritos">
                            <img src="assets/images/icons/star.svg" alt="Favorito">
                        </figure>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="btn-generic margin-right-auto margin-left-auto margin-bottom-30px animate fadeInUp"><!-- BOTÃO PARA VER TODOS OS PRATOS -->
                <span>Ver Mais</span>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
