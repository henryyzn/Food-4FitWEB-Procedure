<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monte Seu Prato - Food 4Fit</title>
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png" />
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
    <?php require_once("components/navbar.php") ?>
    <section class="main">
        <h2 id="page-title" class="animate fadeInUp">MONTE SEU PRATO</h2>
        <p id="page-subtitle">Monte o seu prato de acordo com as<br>suas necessidades, e deixa<br>que a gente prepara tudo para você!</p>
        <div class="generic-block">
            <div>
                <form action="montar-prato.php" method="GET" name="frmcadastro"></form>
            </div>
        </div>
    </section>
    <?php require_once("components/footer.html"); ?>
</body>

</html>
