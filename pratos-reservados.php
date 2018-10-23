<?php
    $dataAtual = new DateTime();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#9CC283">
    <meta name="msapplication-navbutton-color" content="#9CC283">
    <meta name="apple-mobile-web-app-status-bar-style" content="#9CC283">
	<title>Pratos Reservados - Food 4Fit</title>
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
    <script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <h2 id="page-title">PRATOS RESERVADOS</h2>
        <div class="generic-grid animate fadeInUp">
            <?php
                for ($i = 1; $i < 10; $i++) {
                    $data = "0${i}/11/2018";
                    $intervalo = $dataAtual->diff(DateTime::createFromFormat("d/m/Y", $data));
            ?>
                    <div class="generic-card">
                        <img src="assets/images/backgrounds/img.jpg" alt="Teste" class="generic-card-img">
                        <div class="generic-card-overlay">
                            <span class="card-dish-name margin-bottom-15px">Frango Grelhado</span>
                            <span class="dish-quantity">5 unidades</span>
                            <div class="card-dish-price margin-bottom-30px"><!-- CONTAINER DO PREÇO DO PRATO NA INDEX -->
                                <span class="padding-right-15px">Reservar +</span><!-- PREÇO -->
                                <div><img src="assets/images/simbols/delivery-truck.svg" alt="Compra Rápida"></div><!-- COMPRA RAPIDA -->
                            </div>
                            <div class="prato-reservado-delete">
                                <img src="assets/images/icons/delete-white.svg" alt="Excluir Reserva">
                            </div>
                            <span class="prato-reservado-remaing">Dias Restantes: <b><?= $intervalo->days ?></b><br>Dt. Lmt. Reserva: <?= $data ?></span>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
	<div class="generic-modal" id="modal-confirm-remove">
        <article class="generic-modal-wrapper">
            <div class="generic-modal-row margin-top-60px">
                <h2 class="margin-left-auto margin-right-auto">Remover Prato Reservado</h2>
            </div>
            <p>Deseja realmente remover este prato? Essa ação não pode ser desfeita!</p>
            <div class="generic-modal-row margin-top-30px margin-bottom-60px">
                <div class="btn-generic-modal cancel box-shadow margin-left-auto margin-right-15px" data-f4f-close-modal>
                    <span>Recusar</span>
                </div>
                <div class="btn-generic-modal confirm box-shadow margin-right-auto" data-f4f-close-modal>
                    <span>Aceitar</span>
                </div>
            </div>
            <figure class="close-modal" data-f4f-close-modal>
                <img src="assets/images/icons/delete.svg" alt="Fechar Modal">
            </figure>
        </article>
    </div>
</body>
</html>
