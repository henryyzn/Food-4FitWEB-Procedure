<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Meus Pedidos - Food 4Fit</title>
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
        <h2 id="page-title" class="margin-left-auto margin-right-auto margin-bottom-30px">MEU CARRINHO</h2>
        <div class="shopping-cart-block">
        	<div class="shopping-cart-title-menu">
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">IMAGEM</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">INFORMAÇÕES</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">PREÇO UNIT.</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">QUANTIDADE</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">SUBT0TAL</span>
        		</div>
        		<div class="shopping-cart-menu-column align">
        			<span class="padding-top-15px padding-bottom-15px">AGENDAR PRATO</span>
        		</div>
        	</div>
        	<section class="shopping-cart-grid">
                <?php for ($i = 0; $i < 5; $i++) { ?>
                    <div class="shopping-cart-row">
                        <div class="shopping-cart-column">
                            <figure class="shopping-cart-image-container">
                                <img src="assets/images/dishs/img1.jpg" alt="Nome do Prato">
                            </figure>
                        </div>
                        <div class="shopping-cart-column">
                            <h2 class="padding-bottom-5px">Nome do Prato</h2>
                            <h3 class="padding-bottom-15px">Categoria: Nome da Categoria</h3>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price">R$ 000,00</span>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <div class="input-group input-number-group">
                                <span>1</span>
                            </div>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price-total">R$ 000,00</span>
                        </div>
                        <div class="shopping-cart-column align-x" style="align-items: center;">
                            <div class="switch_box">
                                <input type="checkbox" name="chkdish" class="switch-styled">
                            </div>
                        </div>
                    </div>
	        	<?php } ?>
        	</section>
        	<?php require_once("form-agendar-prato.php"); ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
