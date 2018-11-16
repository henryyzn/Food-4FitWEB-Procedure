<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="referrer" content="no-referrer">
	<title>Nossas Lojas - Food 4fit</title>
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
	<script src="assets/js/lojas.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
</head>
<body>
	<?php require_once("components/navbar.php") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title">NOSSAS LOJAS</h2>
        <div id="map-canvas" class="animate fadeInDown"></div>
        <div class="generic-block">
            <?php for($i = 1; $i < 4; $i++){ ?>
                <div class="shop-row">
                    <h2 class="margin-left-30px padding-top-20px padding-bottom-10px">São Paulo</h2>
                    <h3 class="margin-left-30px padding-bottom-20px">R. Elton Silva, 905, JD. Salomão, Jandira - SP, 03485-923<div class="shop-details margin-left-15px"><img src="assets/images/icons/down-arrow.svg" alt="Ver detalhes"></div></h3>
                    <span>Ver no mapa</span>
                </div>
            <?php } ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
