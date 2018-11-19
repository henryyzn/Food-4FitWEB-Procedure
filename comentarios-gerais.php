<?php

    session_start();

    $id = null;
    $id_usuario = null;
    $assunto = null;
    $texto = null;
    $foto = null;
    $ativo = null;
    $botao = "Salvar";

    if(isset($_GET['btn-salvar'])){
        //echo("<script>alert('1');</script>");
        require_once('cms/models/comentario-geralClass.php');
        require_once('cms/models/DAO/comentario-geralDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classComentarioGeral = new ComentarioGeral();
        $classComentarioGeral->id_usuario = "2";
        $classComentarioGeral->assunto = $_GET['assunto'];
        $classComentarioGeral->texto = $_GET['texto'];
        $classComentarioGeral->data = date('y/m/d');
        $classComentarioGeral->ativo = "0";
        $classComentarioGeral->foto = $_GET['txtfoto'];

        $comentarioGeralDAO = new comentarioGeralDAO();

        if($_GET['btn-salvar'] == "Salvar"){
           $comentarioGeralDAO->insert($classComentarioGeral);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Publicações Gerais - Food 4Fit</title>
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
    <script src="assets/public/js/jquery.form.js"></script>
	<script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            $('#fotos').on('change', function(){
                $('#frmfoto').ajaxForm({
                    target:'#view'
                }).submit();
            });
        });
    </script>
    <style>
        .image-view{
            width: 300px; height: auto; display: block;
        }
    </style>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="geral-pubs-block"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">PUBLICAÇÕES GERAIS</h2>
        <p id="page-subtitle">Veja publicações de quem utiliza nosso serviço<br>e interaja com a comunidade!</p>
        <div class="geral-pubs-wrapper">
            <div class="btn-add-pub margin-bottom-30px" id="open">
                <span>CRIAR PUBLICAÇÃO</span>
            </div>
            <div class="form-generic hide margin-bottom-20px">
                <form action="upload-comentario.php" method="POST" name="frmfoto" enctype="multipart/form-data" class="form-generic-content" id="frmfoto">
                    <label class="label-generic">Imagem:</label>
                    <div id="view" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                        <img src='assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                    </div>
                    <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                    <input type="file" name="fileimage" id="fotos" style="display: none;">
                </form>
                <form id="form-sobre-nos" class="form-generic-content padding-top-30px" name="frmcadastro" method="GET" action="comentarios-gerais.php">
                    <input name="txtfoto" type="hidden" value="<?php echo($foto)?>">

                    <label for="assunto" class="label-generic">Assunto:</label>
                    <input type="text" id="assunto" name="assunto" class="input-generic">

                    <label for="texto" class="label-generic">Comentário:</label>
                    <textarea type="text" name="texto" id="texto" class="textarea-generic"></textarea>

                    <div class="form-row">
                        <span>Cancelar</span>
                        <button type="submit" value="Salvar" name="btn-salvar" class="margin-left-20px btn-generic">
                            <span>Salvar</span>
                        </button>
                    </div>
                </form>
            </div>
            <?php
                require_once("cms/models/DAO/comentario-geralDAO.php");

                $comentarioGeralDAO = new comentarioGeralDAO();

                $lista = $comentarioGeralDAO->selectAccept();

                for($i = 0; $i < @count($lista); $i++){
            ?>
            <div class="publication margin-bottom-30px">
                <header class="publication-cabecalho">
                    <img src="assets/images/icons/person.jpg" alt="Avatar de <?php echo($lista[$i]->nome)?>" onclick="javascript:location.href='usuario.php?id_usuario=<?php echo($lista[$id]->id_usuario)?>'" class="profile-image-pub">
                    <section class="profile-name-date-pub">
                        <a href="usuario.php?id_usuario=<?php echo($lista[$i]->id_usuario)?>"><?php echo($lista[$i]->nome)?></a>
                        <h3>Em: <?php echo($lista[$i]->data)?></h3>
                    </section>
                </header>
                <figure class="publication-image">
                    <img src="<?php echo($lista[$i]->foto)?>" alt="Imagem da Publicação">
                    <div>
                        <h2><?php echo($lista[$i]->assunto)?></h2>
                        <p><?php echo($lista[$i]->texto)?></p>
                    </div>
                </figure>
            </div>
            <?php
                }
            ?>
            <div class="btn-generic margin-left-auto margin-right-auto">
                <span>Carregar Mais</span>
            </div>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
