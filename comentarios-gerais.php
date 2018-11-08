<?php
    if(isset($_POST['btn-salvar'])){

        require_once('cms/models/comentario-geralClass.php');
        require_once('cms/models/DAO/comentario-geralDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classComentarioGeral = new ComentarioGeral();
        $classComentarioGeral->id_usuario = "2";
        $classComentarioGeral->assunto = $_POST['assunto'];
        $classComentarioGeral->texto = $_POST['texto'];
        $classComentarioGeral->data = date('y/m/d');
        $classComentarioGeral->ativo = "1";
        $classComentarioGeral->ativo = $_GET['foto'];

        $comentarioGeralDAO = new comentarioGeralDAO();

        if($_POST['btn-salvar'] == "Salvar"){
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
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="geral-pubs-block"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">PUBLICAÇÕES GERAIS</h2>
        <p id="page-subtitle">Veja publicações de quem utiliza nosso serviço<br>e interaja com a comunidade!</p>
        <div class="geral-pubs-wrapper">
            <div class="btn-add-pub margin-bottom-30px" id="open">
                <span>CRIAR PUBLICAÇÃO</span>
            </div>
            <div class="form-generic hide margin-bottom-20px">
                <form action="comentarios-gerais.php" class="form-generic-content" style="display: flex; justify-content: space-between;">
                    <div class="pub-create-column one">
                        <label for="titulo" class="label-generic">Título da Publicação:</label>
                        <input type="text" name="titulo" id="titulo" class="input-generic">

                        <label for="texto" class="label-generic">Diga algo interessante!</label>
                        <textarea name="texto" id="texto" class="textarea-generic"></textarea>
                    </div>
                    <div class="pub-create-column two">
                        <label for="imagem" class="label-generic">Que tal uma imagem?</label>
                        <input type="file" name="imagem" id="imagem" class="file-generic">
                    </div>
                </form>
                <div class="margin-top-10px margin-bottom-30px form-row">
                    <span class="margin-right-15px" id="fechar">Cancelar</span>
                    <div class="btn-generic">
                        <span>Finalizar</span>
                    </div>
                </div>
            </div>
            <?php
                for($i = 1; $i < 8; $i++){
            ?>
            <div class="publication margin-bottom-30px">
                <header class="publication-header">
                    <img src="assets/images/icons/person.jpg" alt="" class="profile-image-pub">
                    <section class="profile-name-date-pub">
                        <h2>Nome do Autor</h2>
                        <h3>Em: 01/01/2018</h3>
                    </section>
                </header>
                <figure class="publication-image">
                    <img src="assets/images/backgrounds/cereal.jpg" alt="Imagem da Publicação">
                    <div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        <span id="comentario">12 comentários</span>
                    </div>
                </figure>
                <div class="publication-comments hide">
                    <div class="comment-row">
                        <figure>
                            <img src="assets/images/icons/person.jpg" alt="Nome do Perfil">
                            <span>Nome do Usuário</span>
                        </figure>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy!</p>
                    </div>

                    <div class="comment-row">
                        <figure>
                            <img src="assets/images/icons/person.jpg" alt="Nome do Perfil">
                            <span>Nome do Usuário</span>
                        </figure>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy!</p>
                    </div>

                    <div class="comment-row">
                        <figure>
                            <img src="assets/images/icons/person.jpg" alt="Nome do Perfil">
                            <span>Nome do Usuário</span>
                        </figure>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy!</p>
                    </div>

                    <div class="btn-generic margin-bottom-15px margin-right-auto margin-left-auto">
                        <span>Carregar Mais</span>
                    </div>
                </div>
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
