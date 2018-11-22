<?php
    session_start();
?>
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
    <style>
        .promotion-anchor-block{
            width: 100%; 
            height: auto;
            max-width: 1920px;
            position: relative;
            overflow: hidden;
        }
        .promotion-anchor-block>img{
            width: 100%;
            height: 400px;
            display: block;
            object-fit: cover;
        }
        .promotion-anchor-overlay{
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
            background: linear-gradient(120deg, rgba(0,0,0,.5), rgba(0,0,0,.0));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .promotion-anchor-overlay>h2{
            font-size: 32px;
            color: white;
            font-family: 'Roboto Bold';
            line-height: 38px;
            text-align: center;
        }
        .promotion-anchor-overlay>h2::after{
            content: "";
            display: block;
            width: 60px;
            height: 4px;
            border-radius: 10px;
            background: white;
            margin: 15px auto;
        }
        .promotion-anchor-overlay>p{
            font-size: 18px;
            color: #FCFCFC;
            font-family: 'Roboto Regular';
            line-height: 24px;
            text-align: center;
            width: 85%;
            margin: 0 auto;
        }
        .promotion-anchor-overlay>p>strong{
            color: #9CC283;
        }
    </style>
</head>
<body>
	<?php require_once("components/navbar.php"); ?>
	<section class="main">
		<h2 id="page-title">ULTIMAS PROMOÇÕES</h2>
        <header class="slider-1200-250 margin-top-30px">
            <div class="slider_content"><!--CONTAINER DO SLIDER-->
                <ul id="slider">
                    <?php
                        require_once("cms/models/DAO/sliderDAO.php");

                        //INSTANCIA DA CLASSE
                        $sliderDAO = new sliderDAO();
                        $ativo = null;
                        //Chamar o método
                        $lista = $sliderDAO->selectAll();

                        //count -> comando que conta quantos itens tem o objeto
                        for($i = 0; $i < count($lista); $i++){
                    ?>
                    <li>
                        <img src="<?php echo($lista[$i]->imagem)?>" alt="Imagem do Slider">
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </header>
        <h2 id="page-title-second" class="padding-top-30px padding-left-30px">TODAS AS PROMOÇÕES</h3>
        <div class="generic-grid animate fadeInUp">
            <?php
                require_once("cms/models/DAO/promocaoDAO.php");

                $promocaoDAO = new promocaoDAO();

                $lista = $promocaoDAO->selectDouble();

                for($i = 0; $i < @count($lista); $i++){
                    $calculo_promocao = null;
            ?>
			<div class="generic-card item">
				<img src="<?php echo($lista[$i]->foto)?>" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px"><?php echo($lista[$i]->nome_prato)?></span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px"><?php echo($lista[$i]->resumo)?></p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ <?php echo($lista[$i]->preco_desconto)?></span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>
                    <div class="promotion-identificator">
                        <span><?php echo($calculo_promocao)?></span>
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
    </section>
    <div class="promotion-anchor-block">
        <img src="assets/images/backgrounds/promo.jpg" alt="">
        <div class="promotion-anchor-overlay">
            <h2>DICAS DE SAÚDE</h2>
            <p>Postagens inéditas dedicadas à <strong>você.</strong></p>
            <div class="btn-generic-fancy margin-top-20px" onclick="javascript:location.href='dicas-de-saude.php'">
                <span>Ver Mais</span>
            </div>
        </div>
	</div>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
