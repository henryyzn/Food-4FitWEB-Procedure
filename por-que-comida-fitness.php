<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Por Que A Comida Fitness? - Food 4Fit</title>
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
        <h2 id="page-title">POR QUE A COMIDA FITNESS?</h2>
        <div class="generic-block">
            <div class="why-comida-fitness-pub-wrapper">
                <?php
                    require_once("cms/models/DAO/por-que-comida-fitnessDAO.php");

                    $pqComidaFitnessDAO = new porQueComidaFitnessDAO();

                    $lista = $pqComidaFitnessDAO->selectAll();

                    for($i = 0; $i < count($lista); $i++){
                ?>
                <div class="why-comida-pub" onclick="javascript:location.href='publicacao-por-que.php?publication&id=<?php echo($lista[$i]->id)?>'">
                    <h2><?php echo($lista[$i]->titulo)?></h2>
                    <span>DT. Public: <?php echo($lista[$i]->data)?></span>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
