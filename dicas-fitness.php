<?php
    if(isset($_POST['btn-salvar'])){

        require_once('cms/models/comentario-postClass.php');
        require_once('cms/models/DAO/comentario-postDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classComentario = new ComentarioPost();
        $classComentario->id_dica_fitness = $_POST['id_dica_fitness'];
        $classComentario->id_usuario = "2";
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
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">DICAS FITNESS</h2>
        <p id="page-subtitle">Acompanhe dicas sobre saúde e bem estar que nossos colaboradores desenvolvem especialmente para os nossos clientes!</p>
        <div class="fitness-tips-block">
            <?php
                require_once("cms/models/DAO/dicas-fitnessDAO.php");

                $dicasFitnessDAO = new dicasFitnessDAO();

                $lista = $dicasFitnessDAO->selectAll();

                for($i = 0; $i < count($lista); $i++){
            ?>
            <article class="fitness-tips-card" onclick="javascript:location.href='publicacao-dicas-fitness.php?publication&id=<?php echo($lista[$i]->id)?>'">
                <h2 class="padding-top-30px padding-left-30px"><?php echo($lista[$i]->titulo)?></h2>
                <!--p class="padding-top-15px padding-left-30px">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."</p-->
                <div class="fitness-tips-row">
                    <span class="padding-left-30px padding-top-15px padding-bottom-30px">Dt. Publicação: <?php echo($lista[$i]->data)?></span>
                    <span class="padding-right-30px padding-top-15px padding-bottom-30px">Autor: <?php echo($lista[$i]->id_funcionario)?></span>
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
