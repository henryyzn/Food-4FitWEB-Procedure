<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vantagens da Comida Fitness - Food 4Fit</title>
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
        <h2 id="page-title">VANTAGENS DA COMIDA FITNESS</h2>
        <article class="generic-block border-30px">
            <?php
                require_once("cms/models/DAO/vantagem-comida-fitnessDAO.php");

                $vantagemComidaFitnessDAO = new vantagemComidaFitnessDAO();

                $lista = $vantagemComidaFitnessDAO->selectAll();

                for($i = 0; $i < count($lista); $i++){
            ?>
        	<div class="pub-row margin-bottom-20px">
        		<h2 class="padding-top-15px padding-left-15px"><?php echo($lista[$i]->titulo)?></h2>
        		<a href="publicacao-vantagem.php?publication&id=<?php echo($lista[$i]->id)?>" class="margin-left-15px margin-bottom-15px">Ler Mais</a>
        		<span class="padding-left-15px padding-bottom-5px"><b>Postado:</b> <?php echo($lista[$i]->data)?></span>
        		<span class="padding-left-15px padding-bottom-15px"><b>Autor:</b> <?php echo($lista[$i]->id_funcionario)?></span>
        	</div>
        	<?php
                }
            ?>
        </article>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
