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
            <span class="padding-left-50px padding-bottom-10px">Autor: <b><?php echo($id_funcionario)?></b></span>
            <span class="padding-left-50px padding-bottom-30px">Data da Postagem: <b><?php echo($data)?></b></span>
        </header>
        <div class="publication-text-block">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus ornare erat ac faucibus. Quisque fringilla, leo et faucibus lacinia, ante ante placerat dolor, ut pharetra tortor enim quis nisi. Fusce tortor dolor, fringilla nec finibus at, tempor ut elit. Praesent dapibus, orci pellentesque ullamcorper placerat, nunc libero congue magna, vitae vestibulum lectus arcu quis ex. Maecenas ac tellus dui. Suspendisse ullamcorper tristique quam at suscipit. Cras et vulputate lacus. Quisque aliquam rhoncus rutrum.</p>
            <p>Nunc vel arcu dapibus, tempus mauris eget, gravida leo. Vestibulum pulvinar, nunc vitae egestas sodales, lectus arcu tincidunt lectus, quis laoreet tortor ante sit amet diam. Proin fermentum et risus quis molestie. Vivamus id leo sed nunc condimentum volutpat eu vestibulum nulla. Ut lacinia enim vitae dictum malesuada. Aenean eget nunc sed velit pellentesque pretium. Vivamus et turpis at mi pharetra tempor. Nullam vitae quam condimentum, volutpat urna in, tempus magna. Sed fermentum odio sit amet aliquam varius. Sed bibendum cursus ullamcorper. Suspendisse id porttitor purus. Aenean eget condimentum sapien. Suspendisse ornare tempor massa vitae luctus.</p>
            <p>In ut enim ullamcorper orci dapibus ornare bibendum et urna. Duis turpis arcu, ornare laoreet sapien eget, convallis fermentum urna. Morbi ipsum urna, tristique vitae arcu id, semper imperdiet sapien. Pellentesque iaculis arcu in tincidunt interdum. Curabitur a massa quis augue tristique mattis vel vel orci. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec varius velit eget quam ultricies consectetur. Aliquam vehicula metus non dolor feugiat commodo. Morbi auctor dui massa, nec vulputate nisi porta ut. Curabitur velit nunc, accumsan ac mattis non, iaculis at arcu. Donec elementum mattis leo, ut consectetur felis pulvinar vel. Sed eros orci, cursus nec dui eu, ullamcorper pharetra augue. Sed scelerisque mi vitae leo posuere blandit.</p>
            <p>Sed faucibus, eros non mattis scelerisque, ante erat semper arcu, at hendrerit purus felis quis mauris. Vivamus vitae tempus orci. Mauris suscipit aliquet semper. Suspendisse tincidunt ex libero, sed congue tellus iaculis in. Nulla id magna tortor. Fusce faucibus, arcu suscipit convallis auctor, sem nibh suscipit augue, quis ullamcorper ante neque tempus orci. Integer vitae efficitur est. Integer in eros nunc. Aenean at libero felis. Vivamus hendrerit vel justo quis varius. Nulla facilisi. Cras ultrices, eros vitae sollicitudin hendrerit, nisl odio facilisis tortor, eu dictum massa nulla ut ex. Nunc quis ipsum sagittis, maximus diam in, mattis felis. Donec eu tortor sem. Duis posuere libero et scelerisque fermentum. Sed sed nibh commodo, porttitor lorem vel, volutpat ipsum.</p>
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
