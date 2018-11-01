<?php

    if(isset($_GET['btn-salvar'])){
        require_once('cms/models/contatoClass.php');
        require_once('cms/models/DAO/contatoDAO.php');

        $classContato = new Contato();
        $classContato->nome = $_GET['nome'];
        $classContato->sobrenome = $_GET['sobrenome'];
        $classContato->email = $_GET['email'];
        $classContato->telefone = $_GET['telefone'];
        $classContato->celular = $_GET['celular'];
        $classContato->assunto = $_GET['assunto'];
        $classContato->observacao = $_GET['observacao'];

        $contatoDAO = new contatoDAO(true);
        $contatoDAO->insert($classContato);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fale Conosco - Food 4Fit</title>
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
	<script src="assets/public/js/jquery.mask.min.js"></script>
    <script src="assets/public/js/jquery.toast.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/form.js"></script>

</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title" class="margin-left-auto margin-right-auto">ENTRE EM CONTATO</h2>

        <div class="form-generic width-750px margin-left-auto margin-right-auto margin-top-30px">
            <form class="form-generic-content" id="form-contato" action="contato.php" method="get">
                <label for="nome" class="label-generic">Nome:</label>
                <input type="text" id="nome" name="nome" class="input-generic" placeholder="Digite o seu nome..." required>

                <label for="sobrenome" class="label-generic">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" class="input-generic" placeholder="Digite o seu sobrenome..." required>

                <label for="email" class="label-generic">E-mail:</label>
                <input type="email" id="email" name="email" class="input-generic" placeholder="Ex: endereco@provedor.com" required>

                <label for="telefone" class="label-generic">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" class="input-generic" placeholder="Fixo" >

                <label for="celular" class="label-generic">Celular:</label>
                <input type="text" id="celular" name="celular" class="input-generic" placeholder="(11) 98888-8888" required>

                <label for="assunto" class="label-generic">Assunto:</label>
                <input type="text" id="assunto" name="assunto" class="input-generic" placeholder="Sobre o que é esta mensagem?" required>

                <label for="comentario" class="label-generic">O que deseja nos dizer?</label>
                <textarea id="comentario" name="observacao" class="textarea-generic" required></textarea>

                <div class="btn-generic margin-bottom-30px">
                <input type="submit" value="Salvar" name="btn-salvar">
                <span>Salvar</span>
            </div>
            </form>

        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
