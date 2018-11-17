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
	<title>Meus Pratos - Food 4Fit</title>
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
<body id="relative">
	<?php require_once("components/navbar.php"); ?>
	<section class="main">
        <h2 id="page-title">MEUS PRATOS</h2>
        <div class="generic-grid animate fadeInUp">
            <?php
                for($i = 1; $i < 10; $i++){
            ?>
            <div class="generic-card">
                <img src="assets/images/dishs/img1.jpg" alt="Teste" class="generic-card-img">
                <div class="generic-card-overlay">
                    <span class="card-dish-name margin-bottom-20px">Frango Com Batatas</span>
                    <div class="card-dish-separator margin-bottom-15px"></div>
                    <p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
                    <div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
                        <span class="padding-right-15px">R$ 9,90</span><!-- PREÇO -->
                        <div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
                    </div>

                    <div class="edit-btns">
                        <img src="assets/images/icons/edit.svg" alt="Editar Prato">
                        <img src="assets/images/icons/delete-white.svg" alt="Excluir Prato">
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
	</section>
	<div class="add-prato-footer" onclick="javascript:location.href='montar-prato.php'">
	    <div>
	        <h2>MONTAR PRATO</h2>
	    </div>
	</div>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
