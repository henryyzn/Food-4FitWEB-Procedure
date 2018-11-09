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
	<title><?php echo $_SESSION['nome_usuario'] ?> - Food 4Fit</title>
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
	<?php require_once("components/navbar.html"); ?>
	<section class="main">
		<header class="profile-header-block box-shadow">
			<div class="profile-header-overlay margin-top-30px margin-bottom-30px">
				<div class="profile-header-option margin-right-30px animate fadeInUp">
					<img src="assets/images/icons/settings.svg" alt="Configurações">
				</div>
				<figure class="profile-header-image margin-top-60px animate fadeInUp">
					<img src="assets/images/icons/person.jpg" alt="Nome do Usuário" class="box-shadow">
				</figure>
				<div class="profile-header-option margin-left-30px animate fadeInUp" onclick="javascript:location.href='editar-perfil.php'">
					<img src="assets/images/icons/edit.svg" alt="Editar Informações de Perfil">
				</div>
            </div>
			<h2 class="profile-name animate fadeInDown margin-bottom-5px"><?php echo $_SESSION['nome_usuario'] ?></h2>
			<span class="profile-email animate fadeInDown margin-bottom-30px"><?php echo $_SESSION['email_usuario'] ?></span>
		</header>
		<section class="profile-section-block">
			<div class="profile-section-column">
				<h3 class="padding-bottom-15px">Informações de Perfil</h3>
				<ul class="profile-info-list padding-top-5px padding-bottom-30px">
					<li>Data de Nascimento: <span><?php echo $_SESSION['dtNasc_usuario'] ?></span></li>
					<li>CPF/CNPJ: <span><?php echo $_SESSION['cpf_usuario'] ?></span></li>
					<li>RG: <span><?php echo $_SESSION['rg_usuario'] ?></span></li>
					<li>Sexo: <span><?php
                                        if($_SESSION['genero_usuario'] == 'H')
                                            echo "Homem";
                                        else
                                            echo "Mulher";
                                    ?></span></li>
					<li>Telefone: <span><?php echo $_SESSION['telefone_usuario'] ?></span></li>
					<li>Celular: <span><?php echo $_SESSION['celular_usuario'] ?></span></li>
				</ul>
				<a href="meus-enderecos.php" class="padding-bottom-5px">Meus Endereços de Entrega</a>
				<a href="meus-cartoes.php" class="padding-top-5px">Meus Cartões Salvos</a>
			</div>
			<div class="profile-section-column">
				<h3 class="padding-bottom-15px">Minhas Ações</h3>
				<div class="profile-myactions-card animate fadeInLeft margin-bottom-30px">
					<span class="profile-myactions-location padding-top-30px padding-left-30px padding-bottom-15px">Em: Dicas de Saúde</span>
					<h2 class="profile-myactions-pub-name padding-left-30px padding-bottom-15px">Nome da Publicação</h2>
					<p class="profile-myactions-description padding-left-30px padding-bottom-30px">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
					<span class="profile-myactions-postdate padding-left-30px padding-bottom-30px">22:05 em 01/01/2018</span>
					<div class="options-dots">
						<img src="assets/images/icons/dots.svg" alt="Opções">
					</div>
					<div class="social-bar animate fadeInUp">
						<img src="assets/images/icons/facebook-color.svg" alt="Facebook">
						<img src="assets/images/icons/twitter-color.svg" alt="Twitter">
						<img src="assets/images/icons/share.svg" alt="Link Compartilhável">
					</div>
				</div>

				<div class="profile-myactions-card animate fadeInLeft margin-bottom-30px">
					<span class="profile-myactions-location padding-top-30px padding-left-30px padding-bottom-15px">Em: Dicas de Saúde</span>
					<p class="profile-myactions-description padding-left-30px padding-bottom-30px">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
					<figure class="profile-myactions-image margin-bottom-30px">
						<img src="assets/images/backgrounds/asian.jpg" alt="Nome da Publicação">
					</figure>
					<span class="profile-myactions-postdate padding-left-30px padding-bottom-30px">22:05 em 01/01/2018</span>
					<div class="options-dots">
						<img src="assets/images/icons/dots.svg" alt="Opções">
					</div>
					<div class="social-bar animate fadeInUp">
						<img src="assets/images/icons/facebook-color.svg" alt="Facebook">
						<img src="assets/images/icons/twitter-color.svg" alt="Twitter">
						<img src="assets/images/icons/share.svg" alt="Link Compartilhável">
					</div>
				</div>

				<div class="profile-myactions-card animate fadeInLeft margin-bottom-30px">
					<span class="profile-myactions-location padding-top-30px padding-left-30px padding-bottom-15px">Em: Dicas de Saúde</span>
					<div class="avaliation-stars margin-left-30px margin-bottom-15px">
	                    <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
	                    <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
	                    <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
	                    <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
	                    <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
	                </div>
					<p class="profile-myactions-comment padding-left-30px padding-bottom-30px"><b>Comentário: </b>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a orem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
					<span class="profile-myactions-postdate padding-left-30px padding-bottom-30px">22:05 em 01/01/2018</span>
					<div class="options-dots">
						<img src="assets/images/icons/dots.svg" alt="Opções">
					</div>
					<div class="social-bar animate fadeInUp">
						<img src="assets/images/icons/facebook-color.svg" alt="Facebook">
						<img src="assets/images/icons/twitter-color.svg" alt="Twitter">
						<img src="assets/images/icons/share.svg" alt="Link Compartilhável">
					</div>
				</div>
				<div class="btn-generic margin-left-auto margin-right-auto margin-top-30px margin-bottom-30px">
					<span>Ver Mais</span>
				</div>
			</div>
		</section>
	</section>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
