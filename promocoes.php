<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Promoções - Food 4Fit</title>
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
	<script src="assets/public/js/responsiveslides.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?>
	<section class="main">
		<h2 id="page-title">PROMOÇÕES</h2>
        <header class="slider-1200-250 margin-top-30px">
            <div class="slider_content"><!--CONTAINER DO SLIDER-->
                <ul id="slider">
                    <li>
                        <img src="assets/images/backgrounds/fit5.jpeg" alt="Título">
                    </li>
                    <li>
                        <img src="assets/images/backgrounds/fit.jpeg" alt="Título">
                    </li>
                    <li>
                        <img src="assets/images/backgrounds/fit4.jpeg" alt="Título">
                    </li>
                    <li>
                        <img src="assets/images/backgrounds/fit2.jpeg" alt="Título">
                    </li>
                    <li>
                        <img src="assets/images/backgrounds/fit3.jpeg" alt="Título">
                    </li>
                </ul>
            </div>
        </header>
        <h3 class="promotion-subtitle padding-top-30px padding-left-30px">Promoções Válidas Até dd/MM</h3>
        <div class="generic-grid animate fadeInUp">
            <?php
                for($i = 1; $i < 10; $i++){
            ?>
			<div class="generic-card">
				<img src="assets/images/backgrounds/img.jpg" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px">Frango Grelhado</span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ 129,90</span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>

                    <div class="promotion-identificator">
                        <span>12%</span>
                    </div>
				</div>
			</div>
            <?php
                }
            ?>
        </div>
		<div class="margin-right-auto margin-left-auto margin-bottom-30px">
		  	<div class="pagination">
			    <a href="#">&laquo;</a>
			    <a href="#" class="active">1</a>
			    <a href="#">2</a>
			    <a href="#">3</a>
			    <a href="#">4</a>
			    <a href="#">5</a>
			    <a href="#">6</a>
			    <a href="#">&raquo;</a>
		  	</div>
		</div>
		<section class="generic-block">
		    <h2 id="healthy-tricks-title">Não sabe por onde começar?<br>Deixa que a gente te ajuda!</h2>
		    <div class="healthy-tricks-intro">
                <figure class="healthy-tricks-intro image animate fadeInLeft">
                    <img src="assets/images/backgrounds/men.png" alt="Homem Amarrando Sapato">
                </figure>
		        <div class="healthy-tricks-intro details animate fadeInRight">
		            <h3>Dicas de Saúde</h3>
		            <p class="padding-bottom-30px">Confira dicas essenciais para manter a boa forma sem complicações, como se cuidar com refeições equilibradas e muito mais!</p>
		            <div class="btn-generic">
		                <span>Continuar Lendo</span>
		            </div>
		        </div>
		    </div>
		</section>
	</section>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
