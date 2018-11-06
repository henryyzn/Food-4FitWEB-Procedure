<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dicas de Saúde - Food 4Fit</title>
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
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">DICAS DE SAÚDE</h2>
        <p id="page-subtitle">Acompanhe dicas sobre saúde e bem estar que nossos colaboradores desenvolvem especialmente para os nossos clientes!</p>
        <article class="health-tricks-block">
           <?php
                require_once("cms/models/DAO/dicas-saudeDAO.php");

                $dicasSaudeDAO = new dicasSaudeDAO();

                $lista = $dicasSaudeDAO->selectAll();

                for($i = 0; $i < count($lista); $i++){
            ?>
            <div class="health-tricks-card animate fadeInUp">
                <h2 class="padding-top-30px"><?php echo($lista[$i]->titulo)?></h2>
                <span class="health-tricks-card-publishedby padding-top-30px padding-bottom-15px">Publicado por <b><?php echo($lista[$i]->id_funcionario)?></b></span>
                <div class="btn-generic animate fadeInUp margin-bottom-30px margin-left-auto margin-right-auto" onclick="javascript:location.href='publicacao-dicas-saude.php?publication&id=<?php echo($lista[$i]->id)?>'">
                    <span>Ver Mais</span>
                </div>
            </div>
            <?php
                }
            ?>
        </article>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
