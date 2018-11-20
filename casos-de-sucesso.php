<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Casos de Sucesso - Food 4Fit</title>
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
    <figure class="success-cases-header">
        <img src="assets/images/backgrounds/caso-sucesso/cover.jpg" alt="Imagem" class="animate fadeIn">
        <div class="success-cases-header-overlay">
            <div>
                <h2 class="margin-left-30px animate fadeIn delay-1s">CASOS DE SUCESSO</h2>
                <p class="margin-left-30px animate fadeIn delay-1500ms">Conheça casos de sucesso de pessoas que utilizaram nossos serviços e aproveitaram nossos produtos, alcançando seus próprios objetivos</p>
                <article class="margin-left-30px animate fadeIn delay-2s">
                    <span>Ver Casos</span>
                </article>
            </div>
        </div>
    </figure>
    <section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <!-- <h2 id="page-title">CASOS DE SUCESSO</h2>
        <p id="page-subtitle">Conheça casos de sucesso de pessoas que utilizaram nossos serviços e aproveitaram nossos produtos, alcançando seus próprios objetivos</p> -->
        <div class="generic-block border-30px">
            <?php
                require_once("cms/models/DAO/caso-sucessoDAO.php");

                $casoSucessoDAO = new casoSucessoDAO();

                $lista = $casoSucessoDAO->selectAll();

                for($i = 0; $i < @count($lista); $i++){
                    $idade = date_diff(date_create($lista[$i]->data_nascimento), date_create('now'))->y;
            ?>
            <div class="success-case-card margin-left-auto margin-right-auto">
                <div class="padding-top-30px margin-left-30px profile-picture">
                    <div>
                        <img src="<?php echo($lista[$i]->avatar)?>" alt="Imagem de perfil do usuário">
                    </div>
                    <span class="padding-left-15px"><?php echo($lista[$i]->nome)?>, <?php echo($idade)?> anos</span>
                </div>
                <p class="padding-left-30px padding-top-30px padding-bottom-30px"><?php echo($lista[$i]->titulo)?></p>
                <img class="go-to-button" src="assets/images/icons/ir-para.svg" alt="Ler Mais" onclick="modalDouble(<?php echo($lista[$i]->id)?>, 'caso-sucesso');">
            </div>
            <?php
                }
            ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
    <div class="generic-modal animate fadeIn" id="abrir">
        <article class="generic-modal-wrapper">

        </article>
    </div>
</body>
</html>
