<?php
    session_start();
?>
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
    <style>
        .health-tricks-header{
            width: 100%;
            max-width: 1920px;
            height: auto;
            margin: 124px auto -124px auto;
            background-image: linear-gradient(to left, rgba(156, 194, 151, 0.8) 20%, rgba(0,0,0,0.3)), url('assets/images/backgrounds/dica-saude/dica-saude-cover.jpg');
            background-repeat:no-repeat;
            background-size:cover;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .health-tricks-header div{
            width: 100%;
            max-width: 1200px;
            height: auto;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin: 0 auto;
        }
        .health-tricks-header h2{
            font-size: 48px; 
            color: white; 
            font-family: 'Roboto Black'; 
            line-height: 62px;
            text-align: right;
        }
        .health-tricks-header h2::after{
            content: "";
            display: block;
            width: 80px;
            height: 5px;
            background: white;
            border-radius: 50px;
            margin: 10px 0px 10px auto;
        }
        .health-tricks-header span{
            font-size: 21px; 
            color: #fcfcfc; 
            font-family: 'Roboto Regular'; 
            line-height: 42px;
            display: block;
            text-align: right;
        }
        .last-insert-row{
            background: linear-gradient(to top, rgba(200, 200, 200, 1) 5%, white 120%);
            width: 100%;
            height: auto;
            display: flex;
        }
    </style>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <header class="health-tricks-header">
        <div class="border-30px">
            <h2 class="padding-top-80px">DICAS DE SAÚDE</h2>
            <span class="padding-bottom-80px">Acompanhe as melhores dicas para cuidar de sua saúde.</span>
        </div>
    </header>
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">POSTS</h2>
        <article class="health-tricks-block">
            <?php
                require_once("cms/models/DAO/dicas-saudeDAO.php");

                $dicasSaudeDAO = new dicasSaudeDAO();

                $lista = $dicasSaudeDAO->selectAllActive();

                for($i = 0; $i < @count($lista); $i++){
            ?>
            <div class="health-tricks-card margin-bottom-30px">
                <figure>
                    <img src="<?php echo($lista[$i]->imagem)?>" alt="">
                </figure>
                <div class="border-30px">
                    <h2><?php echo($lista[$i]->titulo)?></h2>
                    <p><?php echo($lista[$i]->texto)?></p>
                    <span>Publicado em <?php echo($lista[$i]->data)?> por <strong><?php echo($lista[$i]->autor)?></strong></span>
                    <div class="btn-generic margin-top-10px">
                        <span>Ler Mais</span>
                    </div>
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
