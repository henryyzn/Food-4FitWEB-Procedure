<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#9CC283">
    <meta name="msapplication-navbutton-color" content="#9CC283">
    <meta name="apple-mobile-web-app-status-bar-style" content="#9CC283">
	<title>Diário de Bordo - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bases.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
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
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <div class="generic-block">
            <header class="diario-de-bordo-header">
                <h2 class="padding-top-60px">DIÁRIO<br>DE<br>BORDO</h2>
                <p class="padding-bottom-20px">Fale para a gente como você evoluiu<br>com os serviços da Food 4Fit!</p>
            </header>
            <div style="background-color: #E8E8E8; height: 3px; border-radius: 10px; margin: 0 auto;" class="width-550px"></div>
            <div class="form-generic width-550px margin-right-auto margin-left-auto margin-top-20px">
                <form action="#" class="form-generic-content">
                    <h2 class="form-title">Nos envie um depoimento!</h2>
                    <p class="form-subtitle">O diário de bordo nos serve como pesquisa de campo para entender a situação de todos os nossos clientes e achar casos de sucesso para incentivar quem também está entrando no mundo fitness. Caso queira, mande-nos um depoimento sobre a sua dieta aqui em baixo!</p>
                    <label for="titulo" class="label-generic">Título:</label>
                    <input name="titulo" id="titulo" class="input-generic">

                    <label for="texto" class="label-generic">Depoimento:</label>
                    <textarea name="texto" id="texto" class="textarea-generic"></textarea>

                    <span style="display: block; font-size: 18px; font-family: 'Roboto Bold'; color: #000;" class="margin-top-30px margin-bottom-5px">Progresso:</span>
                    <div style="display: flex; justify-content: space-between;" class="margin-bottom-30px">
                        <input type="radio" name="progresso" id="p1" class="react-input">
                        <label for="p1" class="react-label">
                            <img src="assets/images/icons/reactions/angry.svg" alt="Péssimo" class="react-label-img">
                            <span class="react-label-span">Péssimo</span>
                        </label>

                        <input type="radio" name="progresso" id="p2" class="react-input">
                        <label for="p2" class="react-label">
                            <img src="assets/images/icons/reactions/sad.svg" alt="Ruim" class="react-label-img">
                            <span class="react-label-span">Ruim</span>
                        </label>

                        <input type="radio" name="progresso" id="p3" class="react-input">
                        <label for="p3" class="react-label">
                            <img src="assets/images/icons/reactions/thinking.svg" alt="Regular" class="react-label-img">
                            <span class="react-label-span">Regular</span>
                        </label>

                        <input type="radio" name="progresso" id="p4" class="react-input">
                        <label for="p4" class="react-label">
                            <img src="assets/images/icons/reactions/happy.svg" alt="Bom" class="react-label-img">
                            <span class="react-label-span">Bom</span>
                        </label>

                        <input type="radio" name="progresso" id="p5" class="react-input">
                        <label for="p5" class="react-label">
                            <img src="assets/images/icons/reactions/very-happy.svg" alt="Ótimo" class="react-label-img">
                            <span class="react-label-span">Ótimo</span>
                        </label>
                    </div>
                    <div class="margin-top-30px margin-bottom-30px form-row">
                        <span class="margin-right-15px" onclick="javascript:history.back()">Cancelar</span>
                        <div class="btn-generic">
                            <span>Enviar</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
