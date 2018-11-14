<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fit Session :: Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
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
                <div class="fit-session-block">
                    <div class="generic-block">
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
                            <div class="generic-card">
                                <img src="../../assets/images/backgrounds/keyboard.jpeg" alt="Teste" class="fitsession-card-img">
                                <div class="fitsession-card-overlay">
                                    <span class="fitsession-name margin-bottom-15px">Comentários Gerais</span>
                                    <div class="btn-generic" onclick="javascript:location.href='comentarios-gerais.php'">
                                        <span>Ver Mais</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="display-none" style="width: 100%; height: auto; box-sizing: border-box; border-top: 0px solid transparent; border-left: 30px solid transparent; border-right: 30px solid transparent;">
                            <div style="width: 100%; height: 3px; background: #282828;"></div>
                        </div>
                    </div>
                    <aside class="explanation-aside">
                        <h2 class="padding-top-30px padding-left-20px padding-bottom-15px">Fit Session</h2>
                        <p class="padding-left-20px padding-bottom-10px">O Fit Session é um portal de comunicação com tema fitness para os usuários do Food 4Fit.<br>É uma área descontraída, informativa e voltada para o público que deseja buscar conhecimento e entretenimento com base no que a equipe responsável pelo site produz.</p>
                        <p class="padding-left-20px">Esta é uma sessão que permite ao funcionário logado a administração de todos os subtemas do Fit Session, listadas ao lado deste informativo.</p>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
