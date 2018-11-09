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
					<?xml version="1.0" encoding="iso-8859-1"?>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve" width="100%" height="100%">
                        <circle cx="149.996" cy="156.072" r="28.197" fill="#ffffff"/>
                        <path d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003     S232.835,0,149.996,0z M228.82,171.799l-21.306,1.372c-1.193,4.02-2.783,7.866-4.746,11.482l14.088,16.039l-22.245,22.243     l-16.031-14.091c-3.618,1.961-7.464,3.551-11.482,4.741l-1.377,21.311l-31.458-0.003l-1.375-21.309     c-4.015-1.19-7.861-2.78-11.479-4.741l-16.034,14.091l-22.243-22.25l14.088-16.031c-1.963-3.618-3.553-7.464-4.746-11.482     l-21.306-1.375v-31.458l21.306-1.375c1.193-4.015,2.786-7.864,4.746-11.479l-14.088-16.031l22.245-22.248l16.031,14.088     c3.618-1.963,7.464-3.551,11.484-4.744l1.375-21.309h31.452l1.377,21.309c4.017,1.193,7.864,2.78,11.482,4.744l16.036-14.088     l22.243,22.248l-14.088,16.031c1.961,3.618,3.553,7.464,4.746,11.479l21.306,1.375L228.82,171.799z" fill="#ffffff"/>
                    </svg>
				</div>
				<figure class="profile-header-image margin-top-60px animate fadeInUp">
					<img src="<?php echo $_SESSION['avatar_usuario'] ?>" alt="<?php echo $_SESSION['nome_usuario'] ?>" class="box-shadow">
				</figure>
				<div class="profile-header-option margin-left-30px animate fadeInUp" onclick="javascript:location.href='editar-perfil.php'">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 300 300" style="enable-background:new 0 0 300 300;" xml:space="preserve" width="100%" height="100%">
                        <path d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003    S232.835,0,149.996,0z M221.302,107.945l-14.247,14.247l-29.001-28.999l-11.002,11.002l29.001,29.001l-71.132,71.126    l-28.999-28.996L84.92,186.328l28.999,28.999l-7.088,7.088l-0.135-0.135c-0.786,1.294-2.064,2.238-3.582,2.575l-27.043,6.03    c-0.405,0.091-0.817,0.135-1.224,0.135c-1.476,0-2.91-0.581-3.973-1.647c-1.364-1.359-1.932-3.322-1.512-5.203l6.027-27.035    c0.34-1.517,1.286-2.798,2.578-3.582l-0.137-0.137L192.3,78.941c1.678-1.675,4.404-1.675,6.082,0.005l22.922,22.917    C222.982,103.541,222.982,106.267,221.302,107.945z" fill="#ffffff"/>
                    </svg>
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
