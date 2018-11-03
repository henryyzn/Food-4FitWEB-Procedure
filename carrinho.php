<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho - Food 4Fit</title>
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
	<script src="assets/public/js/jquery.mask.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/card.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title" class="margin-left-auto margin-right-auto margin-bottom-30px">MEU CARRINHO</h2>
        <?php require_once("carrinho-principal.html") ?>
        <?php require_once("carrinho-endereco.php") ?>
        <?php require_once("carrinho-pagamento.php") ?>
	</section>
	<div class="modal" id="modal-carrinho">
        <div class="popup-confirm">
            <h2 class="padding-top-30px padding-bottom-15px" style="font-size: 21px; font-family: 'Roboto Medium'; color: #000; text-align: center;">PEDIDO REALIZADO</h2>
            <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Isso aí! Compra finalizada!</span>
            <figure style="width: 90%; max-width: 180px;" class="margin-left-auto margin-right-auto padding-bottom-30px">
                <img src="assets/images/logo/logo-food4fit.svg" alt="Logo" style="max-width: 100%; object-fit: cover; display: block; max-height: 100%;">
            </figure>
            <span class="padding-bottom-15px cart-descript">Você pode visualizar seus pedidos em Meus Pedidos</span>
            <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
                <a href="index.php" class="padding-right-15px" style="text-decoration: none; font-size: 18px; font-family: 'Roboto Medium Italic'; color: #7F7F7F;">Retornar à página inicial</a>
                <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
                    <span>Finalizar</span>
                </div>
            </div>
        </div>
    </div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
