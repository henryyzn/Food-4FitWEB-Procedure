<?php
    session_start();
    require_once('modulo.php');
    validateLog();

    $id = null;
    $titulo = null;
    $descricao = null;
    $imagem = null;
    $id_usuario = null;
    $botao = "Salvar";

     if(isset($_GET['btn-salvar'])){
            //echo("<script>console.log('1');</script>");
            require_once('cms/models/parceirosClass.php');
            require_once('cms/models/DAO/parceirosDAO.php');

            $classParceiros = new Parceiros();
            $classParceiros->titulo = $_GET['titulo'];
            $classParceiros->descricao = $_GET['descricao'];
            $classParceiros->imagem = $_GET['txtfoto'];
            $classParceiros->id_usuario = $_SESSION['id_usuario'];

            $parceirosDAO = new parceirosDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $parceirosDAO->insertContato($classParceiros);
           }

        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homenagem À Parceiros - Food 4Fit</title>
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
    <script src="assets/public/js/jquery.form.js"></script>
	<script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {

            $('#fotos').on('change', function(){
                $('#frmfoto').ajaxForm({
                    target:'#view'
                }).submit();
            });
        });
    </script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">HOMENAGEM À PARCEIROS</h2>
        <p id="page-subtitle" class="padding-bottom-25px">Conheça os nossos laços que foram e são <br> essenciais para que a Food 4Fit cresça <br> cada vez mais a cada dia!</p>
        <div class="contact-buddy-button width-500px margin-auto" id="abrir">
            <span>ENTRE EM CONTATO</span>
        </div>
        <div class="form-generic width-500px  margin-left-auto margin-right-auto margin-top-30px">
            <form class="form-generic-content" name="frmcontatoparceiro" id="form-contato">
                <input type="hidden" name="txtfoto" value="<?php echo($foto)?>">

                <label for="titulo" class="label-generic">Título:</label>
                <input type="text" id="titulo" name="titulo" class="input-generic" placeholder="Digite um título..." required>

                <label for="descricao" class="label-generic">Descrição:</label>
                <textarea id="descricao" name="descricao" class="textarea-generic" required></textarea>

                <input type="submit" name="btn-salvar" value="<?php echo($botao)?>">
            </form>
            <form action="upload/upload-imagem-parceiro.php" method="POST" name="frmfoto" enctype="multipart/form-data" class="form-generic-content" id="frmfoto">
                <label class="label-generic">Imagem:</label>
                <div id="view" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                    <img src='assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                </div>
                <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                <input type="file" name="fileimage" id="fotos" style="display: none;">
            </form>
            <div class="btn-generic margin-bottom-30px">
                <span>Enviar</span>
            </div>
        </div>
        <div class="generic-grid animate fadeInUp">
            <?php
                for($i = 1; $i < 10; $i++){
            ?>
            <div class="generic-card">
                <figure class="img-parceiro">
                    <img src="assets/images/icons/person.jpg" alt="Imagem dos Parceiros">
                </figure>
                <span class="nome-parceiro padding-top-15px">NOME DO PARCEIRO</span>

                <p class="descritivo-homenagem-parceiro">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni magnam saepe reiciendis.</p>
            </div>
            <?php
                }
            ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
