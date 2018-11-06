<?php

    session_start();

    $id_usuario = null;
    $titulo = null;
    $texto = null;
    $progresso = null;
    $data = null;
    $botao = "Salvar";

    if(isset($_GET['btn-salvar'])){

        require_once('cms/models/diario-bordoClass.php');
        require_once('cms/models/DAO/diario-bordoDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classDiarioBordo = new DiarioBordo();
        $classDiarioBordo->id_usuario = $_GET['id_usuario'];
        $classDiarioBordo->titulo = $_GET['titulo'];
        $classDiarioBordo->texto = $_GET['texto'];
        $classDiarioBordo->data = date('y/m/d');
        $classDiarioBordo->progresso = $_GET['progresso'];

        $diarioBordoDAO = new diarioBordoDAO();

       if($_GET['btn-salvar'] == "Salvar"){
           $diarioBordoDAO->insert($classDiarioBordo);
           //echo("<script>alert('teste');</script>");
       }
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
	<title>Diário de Bordo - Food 4Fit</title>
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
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <div class="generic-block">
            <header class="diario-de-bordo-header">
                <h2 class="padding-top-60px">DIÁRIO<br>DE<br>BORDO</h2>
                <p class="padding-bottom-20px">Fale para a gente como você evoluiu<br>com os serviços da Food 4Fit!</p>
            </header>
            <div class="bordo-sep width-550px"></div>
            <div class="form-generic width-550px margin-right-auto margin-left-auto margin-top-20px">
                <form action="diario-de-bordo.php" method="GET" name="frmdiariobordo" class="form-generic-content">
                    <h2 class="form-title">Nos envie um depoimento!</h2>
                    <p class="form-subtitle">O diário de bordo nos serve como pesquisa de campo para entender a situação de todos os nossos clientes e achar casos de sucesso para incentivar quem também está entrando no mundo fitness. Caso queira, mande-nos um depoimento sobre a sua dieta aqui em baixo!</p>
                    <input type="hidden" name="id_usuario" value="1">

                    <label for="titulo" class="label-generic">Título:</label>
                    <input name="titulo" id="titulo" class="input-generic">

                    <label for="texto" class="label-generic">Depoimento:</label>
                    <textarea name="texto" id="texto" class="textarea-generic"></textarea>

                    <span class="bordo-title" class="margin-top-30px margin-bottom-5px">Progresso:</span>
                    <div style="display: flex; justify-content: space-between;" class="margin-bottom-30px">
                        <input type="radio" name="progresso" id="pessimo" value="pessimo" class="react-input">
                        <label for="pessimo" class="react-label">
                            <img src="assets/images/icons/reactions/angry.svg" alt="Péssimo" class="react-label-img">
                            <span class="react-label-span">Péssimo</span>
                        </label>

                        <input type="radio" name="progresso" id="ruim" value="ruim" class="react-input">
                        <label for="ruim" class="react-label">
                            <img src="assets/images/icons/reactions/sad.svg" alt="Ruim" class="react-label-img">
                            <span class="react-label-span">Ruim</span>
                        </label>

                        <input type="radio" name="progresso" id="regular" value="regular" class="react-input">
                        <label for="regular" class="react-label">
                            <img src="assets/images/icons/reactions/thinking.svg" alt="Regular" class="react-label-img">
                            <span class="react-label-span">Regular</span>
                        </label>

                        <input type="radio" name="progresso" id="bom" value="bom" class="react-input">
                        <label for="bom" class="react-label">
                            <img src="assets/images/icons/reactions/happy.svg" alt="Bom" class="react-label-img">
                            <span class="react-label-span">Bom</span>
                        </label>

                        <input type="radio" name="progresso" id="otimo" value="otimo" class="react-input">
                        <label for="otimo" class="react-label">
                            <img src="assets/images/icons/reactions/very-happy.svg" alt="Ótimo" class="react-label-img">
                            <span class="react-label-span">Ótimo</span>
                        </label>
                    </div>
                    <div class="margin-top-30px margin-bottom-30px form-row">
                        <span class="margin-right-15px" onclick="javascript:history.back()">Cancelar</span>
                        <button type="submit" value="<?php echo($botao)?>" name="btn-salvar" class="btn-generic">
                            <span>Enviar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
