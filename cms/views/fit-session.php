<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases.css">
    <link rel="stylesheet" href="../../assets/public/css/jquery.toast.min.css">
    <link rel="stylesheet" href="../../assets/public/css/sceditor.theme.min.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/public/js/jquery.form.js"></script>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div>
                    <div class="generic-grid animate fadeInUp">
                        <div class="generic-card">
                            <img src="../../assets/images/backgrounds/fitsession/img1.jpg" alt="Teste" class="fitsession-card-img">
                            <div class="fitsession-card-overlay">
                                <span class="fitsession-name margin-bottom-15px">Personal Fitness</span>
                                <div class="btn-generic" onclick="javascript:location.href='personal-fitness.php'">
                                    <span>Ver Mais</span>
                                </div>
                            </div>
                        </div>
                        <div class="generic-card">
                            <img src="../../assets/images/backgrounds/fitsession/img2.jpg" alt="Teste" class="fitsession-card-img">
                            <div class="fitsession-card-overlay">
                                <span class="fitsession-name margin-bottom-15px">Por Que a Comida Fitness</span>
                                <div class="btn-generic" onclick="javascript:location.href='por-que-comida-fitness.php'">
                                    <span>Ver Mais</span>
                                </div>
                            </div>
                        </div>
                        <div class="generic-card">
                            <img src="../../assets/images/backgrounds/fitsession/img4.jpg" alt="Teste" class="fitsession-card-img">
                            <div class="fitsession-card-overlay">
                                <span class="fitsession-name margin-bottom-15px">Dicas Fitness</span>
                                <div class="btn-generic" onclick="javascript:location.href='dicas-fitness.php'">
                                    <span>Ver Mais</span>
                                </div>
                            </div>
                        </div>
                        <div class="generic-card">
                            <img src="../../assets/images/backgrounds/fitsession/img3.jpg" alt="Teste" class="fitsession-card-img">
                            <div class="fitsession-card-overlay">
                                <span class="fitsession-name margin-bottom-15px">Dicas de Saúde</span>
                                <div class="btn-generic" onclick="javascript:location.href='dicas-saude.php'">
                                    <span>Ver Mais</span>
                                </div>
                            </div>
                        </div>
                        <div class="generic-card">
                            <img src="../../assets/images/backgrounds/fitsession/img5.jpg" alt="Teste" class="fitsession-card-img">
                            <div class="fitsession-card-overlay">
                                <span class="fitsession-name margin-bottom-15px">Vantagens da Comida Fitness</span>
                                <div class="btn-generic" onclick="javascript:location.href='vantagem-comida-fitness.php'">
                                    <span>Ver Mais</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
