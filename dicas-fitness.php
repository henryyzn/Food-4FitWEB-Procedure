<?php
    session_start();
    if(isset($_POST['btn-salvar'])){

        require_once('cms/models/comentario-postClass.php');
        require_once('cms/models/DAO/comentario-postDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classComentario = new ComentarioPost();
        $classComentario->id_dica_fitness = $_POST['id_dica_fitness'];
        $classComentario->id_usuario = $_SESSION['id_usuario'];
        $classComentario->assunto = $_POST['assunto'];
        $classComentario->texto = $_POST['texto'];
        $classComentario->data = date('y/m/d');
        $classComentario->ativo = "1";

        $comentarioPostDAO = new comentarioPostDAO();

        if($_POST['btn-salvar'] == "Salvar"){
           $comentarioPostDAO->insert($classComentario);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dicas Fitness - Food 4Fit</title>
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
    <script>
        $(document).ready(function(){
            var txt = $('.restrict').text();
            if(txt.length > 80)
                $('.restrict').text(txt.substring(0,150) + '... Ler mais');
        });
    </script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <header class="fitness-tips-header">
        <div class="fitness-tips-header-wrapper">
            <article class="fitness-tips-header-text">
                <h2 class="padding-left-30px">DICAS FITNESS</h2>
                <p class="padding-left-30px">Acompanhe dicas sobre saúde e bem estar que nossos colaboradores desenvolvem especialmente para os nossos clientes.</p>
            </article>
            <div class="fitness-tips-header-slider margin-bottom-30px">
                <?php
                    require_once("cms/models/DAO/dicas-fitnessDAO.php");

                    $dicasFitnessDAO = new dicasFitnessDAO();

                    $lista = $dicasFitnessDAO->selectAllActiveRand();

                    for($i = 0; $i < 3; $i++){
                ?>
                <div class="border-30px margin-top-30px" onclick="javascript:location.href='publicacao-dicas-fitness.php?publication&id=<?php echo($lista[$i]->id)?>'">
                    <h2 class="restrict-title padding-bottom-15px"><?php echo($lista[$i]->titulo)?></h2>
                    <p class="restrict padding-bottom-20px"><?php echo($lista[$i]->texto)?></p>
                    <span><strong>Autor:</strong> <?php echo($lista[$i]->autor)?></span>
                    <span><strong>Data da postagem:</strong> <?php echo($lista[$i]->data)?></span>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </header>
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <div class="fitness-tips-block">
            <?php
                require_once("cms/models/DAO/dicas-fitnessDAO.php");

                $dicasFitnessDAO = new dicasFitnessDAO();

                $lista = $dicasFitnessDAO->selectAllActive();

                for($i = 0; $i < @count($lista); $i++){
            ?>
            <article class="fitness-tips-card" onclick="javascript:location.href='publicacao-dicas-fitness.php?publication&id=<?php echo($lista[$i]->id)?>'">
                <h2 class="padding-top-30px padding-left-30px"><?php echo($lista[$i]->titulo)?></h2>
                <!--p class="padding-top-15px padding-left-30px">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."</p-->
                <div class="fitness-tips-row">
                    <span class="padding-left-30px padding-top-15px padding-bottom-30px">Data de Publicação: <?php echo($lista[$i]->data)?></span>
                    <span class="padding-right-30px padding-top-15px padding-bottom-30px">Autor: <?php echo($lista[$i]->autor)?></span>
                </div>
            </article>
            <?php
                }
            ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
