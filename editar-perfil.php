<?php
    session_start();
    require_once('modulo.php');
    validateLog();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nome do Usuário - Food 4Fit</title>
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
	<script src="assets/public/js/jquery.mask.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?>
	<section class="main">
		<h2 id="page-title">EDITAR INFORMAÇÕES</h2>
		<p id="page-subtitle">Por motivos de segurança, dados como RG e CPF/CNPJ não são editáveis.</p>
		<div class="generic-block padding-top-30px">
		    <figure class="margin-left-auto margin-right-auto profile-edit-image">
		        <img src="assets/images/icons/person.jpg" alt="Nome do Usuário">
		    </figure>
		    <div class="profile-edit-image-row margin-left-auto margin-right-auto padding-top-30px padding-bottom-30px">
		        <div>
		            <span>Escolher Imagem</span>
		        </div>
		        <div>
		            <span>Remover Imagem</span>
		        </div>
		    </div>
		    <div class="form-generic margin-right-auto margin-left-auto width-600px" style="box-sizing: border-box; background-color: #F1F1F1; border: 30px solid transparent">
		        <form action="#" class="form-generic-content">
		            <label for="nome" class="label-generic">Nome/Nome Fantasia</label>
		            <input type="text" name="nome" class="input-generic" id="nome" value="João">
		            <!-- ===================== -->
		            <label for="sobrenome" class="label-generic">Sobrenome/Razão Social</label>
		            <input type="text" class="input-generic" name="sobrenome" id="sobrenome" value="Ferraz Guedez">
		            <!-- ===================== -->
		            <label for="email" class="label-generic">E-Mail</label>
		            <input type="email" name="email" id="email" class="input-generic" value="endereco@provedor.com">
		            <!-- ===================== -->
		            <label for="dtnasc" class="label-generic">Data de Nascimento</label>
		            <input type="text" id="dtnasc" name="dtnasc" class="input-generic">
		            <!-- ===================== -->
                    <span style="display: block; font-size: 18px; font-family: 'Roboto Regular'; color: #000;" class="margin-top-30px margin-bottom-15px">Gênero:</span>
                    <div id="sexo" style="display: flex;">
                        <input type="radio" name="sexo" id="homem" value="H" required>
                        <label for="homem" class="label-generic">Homem</label>
                        <input type="radio" name="sexo" id="mulher" value="M" required class="margin-left-15px">
                        <label for="mulher" class="label-generic">Mulher</label>
                    </div>
                    <label for="telefone" class="label-generic">Telefone</label>
		            <input id="telefone" type="text" class="input-generic">
		            <!-- ===================== -->
		            <label for="celular" class="label-generic">Celular</label>
		            <input id="celular" type="text" class="input-generic">
		            <span class="aviso-contato margin-bottom-20px">Caso necessário o contato através de e-mail ou<br>
                    telefone/celular, usaremos o seu nome escolhido como vulgo.</span>
		            <!-- ===================== -->
		            <label for="pergunta-secreta" class="label-generic">Pergunta Secreta</label>
		            <select id="pergunta-secreta" class="input-generic">
		                <option selected>Pergunta Selecionada</option>
		            </select>
		            <!-- ===================== -->
		            <label for="resposta-secreta" class="label-generic">Resposta:</label>
		            <input id="resposta-secreta" type="text" class="input-generic" value="Resposta Escolhida">
		            <!-- ===================== -->
		            <div class="margin-top-30px margin-bottom-30px form-row">
                        <span class="margin-right-15px" onclick="javascript:history.back()">Cancelar</span>
                        <div class="btn-generic" onclick="javascript:location.href='meu-perfil.php'">
                            <span>Salvar</span>
                        </div>
                    </div>
		        </form>
		    </div>
		</div>
	</section>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
