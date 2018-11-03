<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fit Session - Food 4Fit</title>
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
        <h2 id="page-title" class="margin-left-auto margin-right-auto">FIT SESSION</h2>
        <p id="page-subtitle" class="margin-left-auto margin-right-auto">Agrupamos os melhores assuntos sobre o<br>tema fitness em um lugar só, dê uma olhada!</p>
        <div class="fit-session-block margin-top-30px">
            <figure class="fit-session-content-row animate fadeInDown">
                <img src="assets/images/backgrounds/fitsession/img1.jpg" alt="Personal fitness">
                <article class="fit-session-row-overlay">
                    <h2>PERSONAL FITNESS</h2>
                    <p class="padding-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus finibus erat ut auctor. Donec vitae ipsum massa.</p>
                    <div class="btn-generic" onclick="javascript:location.href='personal-fitness.php'">
                        <span>Ver Mais</span>
                    </div>
                </article>
            </figure>
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <figure class="fit-session-content-row animate fadeInDown delay-500ms">
                <img src="assets/images/backgrounds/fitsession/img2.jpg" alt="Personal fitness">
                <article class="fit-session-row-overlay">
                    <h2>POR QUE A COMIDA FITNESS?</h2>
                    <p class="padding-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus finibus erat ut auctor. Donec vitae ipsum massa.</p>
                    <div class="btn-generic" onclick="javascript:location.href='por-que-comida-fitness.php'">
                        <span>Ver Mais</span>
                    </div>
                </article>
            </figure>
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <figure class="fit-session-content-row animate fadeInDown delay-1s">
                <img src="assets/images/backgrounds/fitsession/img4.jpg" alt="Personal fitness">
                <article class="fit-session-row-overlay">
                    <h2>DICAS FITNESS</h2>
                    <p class="padding-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus finibus erat ut auctor. Donec vitae ipsum massa.</p>
                    <div class="btn-generic" onclick="javascript:location.href='dicas-fitness.php'">
                        <span>Ver Mais</span>
                    </div>
                </article>
            </figure>
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <figure class="fit-session-content-row animate fadeInDown delay-1500ms">
                <img src="assets/images/backgrounds/fitsession/img3.jpg" alt="Personal fitness">
                <article class="fit-session-row-overlay">
                    <h2>DICAS DE SAÚDE</h2>
                    <p class="padding-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus finibus erat ut auctor. Donec vitae ipsum massa.</p>
                    <div class="btn-generic" onclick="javascript:location.href='dicas-de-saude.php'">
                        <span>Ver Mais</span>
                    </div>
                </article>
            </figure>
            <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <figure class="fit-session-content-row animate fadeInDown delay-2s">
                <img src="assets/images/backgrounds/fitsession/img5.jpg" alt="Personal fitness">
                <article class="fit-session-row-overlay">
                    <h2>VANTAGENS DA COMIDA FITNESS</h2>
                    <p class="padding-bottom-30px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean finibus finibus erat ut auctor. Donec vitae ipsum massa.</p>
                    <div class="btn-generic" onclick="javascript:location.href='vantagens-comida-fitness.php'">
                        <span>Ver Mais</span>
                    </div>
                </article>
            </figure>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
