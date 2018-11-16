<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sobre a Food 4Fit</title>
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
	<?php require_once("components/navbar.php") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">SOBRE A FOOD 4FIT</h1><!-- TÍTULO DA PÁGINA -->
        <article id="about-us-block" class="margin-top-15px"><!-- BLOCO GERAL DA PÁGINA -->
            <?php
                require_once("cms/models/DAO/sobreDAO.php");

                $sobreDAO = new sobreDAO();

                $lista = $sobreDAO->selectAll();

                for($i = 0; $i < count($lista); $i++){
            ?>
            <div class="about-us-content animate fadeInUp margin-bottom-30px"><!-- CONTEÚDO SESSÃO 'SOBRE NÓS' -->
                <div class="text-about-us margin-top-30px"><!-- TEXTO DA SESSÃO -->
                    <h2 class="about-us-title padding-left-60px padding-bottom-15px"><?php echo($lista[$i]->titulo)?></h2><!-- TÍTULO DA SESSÃO -->
                    <p class="about-us-text padding-left-60px padding-right-60px"><?php echo($lista[$i]->texto)?></p><!-- TEXTO DA SESSÃO -->
                </div>
                <figure class="about-us-image-container margin-top-30px padding-left-60px padding-right-60px"><!-- IMAGEM DA PÁGINA -->
                    <img src="<?php echo($lista[$i]->foto)?>" alt="Cozinha">
                </figure>
            </div>
            <?php
                }
            ?>
        </article>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
