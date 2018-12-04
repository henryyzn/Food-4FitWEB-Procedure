<?php
    session_start();
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
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<div class="main border-30px"><!-- CONTAINER-MÃE DO SITE -->
        <header class="fit-session-header animate fadeInDown fast">
            <img src="assets/images/backgrounds/fitsession/fitsession.jpg" alt="Capa do Fit Session">
            <article>
                <h2>FIT SESSION</h2>
                <p>Os melhores temas, em um lugar só. Se jogue no mundo fitness.</p>
            </article>
        </header>
        <div class="fit-session-block margin-top-30px">
            <figure class="fit-session-content-row animate fadeInDown">
                <img src="assets/images/backgrounds/fitsession/img1.jpg" alt="Personal fitness">
                <article class="fit-session-row-overlay">
                    <h2>PERSONAL FITNESS</h2>
                    <p class="padding-bottom-30px">Um profissional bem preparado especialmente para te ajudar com a sua rotina fitness? A gente tem.</p>
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
                    <p class="padding-bottom-30px">Com tantas opções de alimentos por aí, por que a fitness seria uma boa opção? Vem que a gente explica.</p>
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
                    <p class="padding-bottom-30px">Dicas fitness em geral para agregar valor e conhecimento sobre exercícios, alimentação e boas práticas.</p>
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
                    <p class="padding-bottom-30px">A saúde como um todo deve ser a prioridade na vida de todos. Dicas para preservar a sua e viver feliz.</p>
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
                    <p class="padding-bottom-30px">Mas e as vantagens disso tudo? Saiba quais são e desfrute de todas.</p>
                    <div class="btn-generic" onclick="javascript:location.href='vantagens-comida-fitness.php'">
                        <span>Ver Mais</span>
                    </div>
                </article>
            </figure>
        </div>
	</div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
