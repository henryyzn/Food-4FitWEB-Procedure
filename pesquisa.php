<?php
    session_start();

    require_once('cms/models/pesquisaClass.php');
    require_once('cms/models/DAO/pesquisaDAO.php');

    if(isset($_POST['pesquisa'])){
        $_SESSION['key'] = $_POST['pesquisa'];
    }
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
	<title>'<?php echo($_SESSION['key'])?>' - Food 4Fit</title>
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
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <div class="generic-grid animate fadeInUp">
		    <?php
                require_once("cms/models/DAO/pesquisaDAO.php");

                $pesquisaDAO = new pesquisaDAO();

                $lista = $pesquisaDAO->search($_SESSION['key']);

                for($i = 0; $i < @count($lista); $i++){
            ?>
			<div class="generic-card animate fadeIn" onclick="javascript:location.href='prato.php?id_prato=<?php echo($lista[$i]->id)?>'">
				<img src="<?php echo($lista[$i]->foto)?>" alt="Teste" class="generic-card-img">
				<div class="generic-card-overlay">
					<span class="card-dish-name margin-bottom-15px"><?php echo($lista[$i]->titulo)?></span>
			  		<div class="card-dish-separator margin-bottom-15px"></div>
			  		<p class="card-dish-description margin-bottom-30px"><?php echo($lista[$i]->resumo)?></p>
			  		<div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
			  			<span class="padding-right-15px">R$ <?php echo($lista[$i]->preco)?></span><!-- PREÇO -->
			  			<div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
			  		</div>
				</div>
			</div>
            <?php
                }
            ?>
		</div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
