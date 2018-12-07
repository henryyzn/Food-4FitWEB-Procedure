<?php
    session_start();
    if(isset($_GET['publication'])){
        $id = $_GET['id'];

        require_once('cms/models/dicas-saudeClass.php');
        require_once('cms/models/DAO/dicas-saudeDAO.php');

        $dicasSaudeDAO = new dicasSaudeDAO;
        $listDicasSaude = $dicasSaudeDAO->selectId($id);

        //Resgatando do Banco de dados
        //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
        if(@count($listDicasSaude)>0)
        {
            $id = $listDicasSaude->id;
            $id_funcionario = $listDicasSaude->id_funcionario;
            $titulo = $listDicasSaude->titulo;
            $texto = $listDicasSaude->texto;
            $data = $listDicasSaude->data;
            $autor = $listDicasSaude->autor;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo($titulo)?> - Food 4Fit</title>
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
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <header class="publication-header">
            <figure>
                <img src="assets/images/backgrounds/fitsession/img1.jpg" alt="Título da Publicação">
            </figure>
            <h2 class="padding-left-50px padding-top-30px"><?php echo($titulo)?></h2>
            <span class="padding-left-50px padding-bottom-10px">Autor: <b><?php echo($autor)?></b></span>
            <span class="padding-left-50px padding-bottom-30px">Data da Postagem: <b><?php echo($data)?></b></span>
        </header>
        <div class="publication-text-block">
            <p><?php echo($texto)?></p>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
<?php
        }else{
            header('location:404.php');
        }
    }
?>
