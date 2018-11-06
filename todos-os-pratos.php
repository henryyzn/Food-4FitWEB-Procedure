<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todos os Pratos - Food 4Fit</title>
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
	<?php require_once("components/navbar.html"); ?>
	<div class="main">
		<header class="filter-menu">
			<div class="filter-menu-column">
				<label for="categoria" class="dishes-filter-label padding-left-15px">Categorias:</label>
				<select name="categoria" id="categoria" class="dishes-filter-select margin-bottom-15px margin-top-15px margin-left-15px margin-right-15px">
					<option>Selecione uma opção</option>
				</select>
			</div>
			<div class="filter-menu-column">
				<label for="price-initial" class="price-initial padding-left-15px margin-right-15px">DE:</label>
				<input type="text" placeholder="R$ 00,00" name="price-initial" id="price-initial" class="dishes-filter-input margin-right-15px">

				<label for="price-final" class="price-initial margin-right-15px">À:</label>
				<input type="text" placeholder="R$ 000,00" name="price-final" id="price-final" class="dishes-filter-input margin-right-15px">

				<div class="btn-generic margin-bottom-15px margin-top-15px margin-right-15px ">
					<span>Pesquisar</span>
				</div>
			</div>
		</header>
		<div class="generic-grid animate fadeInUp">
		    <?php
                for($i=0; $i<120; $i++){
            ?>
			<div class="generic-card animate fadeIn" onclick="javascript:location.href='prato.php'">
				<img src="assets/images/backgrounds/img.jpg" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px">Frango Grelhado</span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ 129,90</span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>
				</div>
			</div>
            <?php
                }
            ?>
		</div>
		<div class="margin-right-auto margin-left-auto margin-bottom-30px btn-generic" id="see-more">
            <span>Ver Mais</span>
		</div>
	</div>
	<?php require_once("components/footer.html"); ?>
	<script>
        (function($) {
            //Setamos o valor inicial
            var count = 9;
            var i = null;

            //escondemos todos os elementos maior que o valor inicial
            $(".generic-card").slice(count).hide();

            $('#see-more').click(function() {

                //Somamos a quantidade nova a ser exibida
                count += 9;

                //Rodamos o loop no valor total
                for (i = 0; i < count; i++) {
                    //Mostramos o item
                    $('.generic-card').eq(i).show();
                }
            });

        }(jQuery));
    </script>
</body>
</html>
