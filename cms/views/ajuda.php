<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajuda :: Food 4fit - CMS</title>
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
    <script src="../../assets/js/scripts.js"></script>
    <style>
        .help-block{
            width: 100%;
            max-width: 800px;
            height: auto;
            margin: 0 auto;
        }
        .help-block h2{
            font-size: 32px;
            color: white;
            font-family: 'Roboto Bold';
            line-height: 42px;
            text-align: center;
        }
        .help-block h3{
            font-size: 18px;
            color: #7F7F7F;
            font-family: 'Roboto Medium Italic';
            line-height: 26px;
            text-align: center;
        }
        .help-block h4{
            font-size: 21px;
            color: white;
            font-family: 'Roboto Bold';
            line-height: 28px;
            text-align: center;
        }
        .help-block p{
            font-size: 16px;
            color: #E8E8E8;
            font-family: 'Roboto Regular';
            line-height: 26px;
            text-align: justify;
            width: 85%;
            margin: auto;
        }
    </style>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <article class="help-block">
                    <h2 class="padding-top-30px">Ajuda</h2>
                    <h3 class="padding-top-5px">CMS da Food 4Fit</h3>

                    <h4 class="padding-top-15px">O que é este CMS?</h4>
                    <p class="padding-top-5px">A <strong>Food 4Fit</strong>, com a necessidade de expandir seus negócios, investiu fortemente em um sistema web que gerenciasse seu website com conteúdos voláteis, que podem ser adicionados, editados, removidos e visualizados com extrema facilidade.</p>
                    <p class="padding-top-5px">Esta é uma extensão do website oficial da <strong>Food 4Fit</strong> que gerencia o conteúdo do mesmo. Para maiores informações, leia o <strong>Manual do Usuário - CMS</strong> ou contate um administrador ou um técnico responsável pelo desenvolvimento da plataforma.</p>

                    <h2 class="padding-top-30px">Funções</h2>
                    <!- -->
                    <h4 class="padding-top-15px">Diário de Bordo</h4>
                    <p class="padding-top-5px">O <strong>Diário de Bordo</strong> consiste em resgatar depoimentos dos usuários do website da <strong>Food 4Fit</strong>, dos quais são analisados individualmente por uma equipe destinada especialmente para esta função. Os resultados satisfatórios do Diário de Bordo são transformados em <strong>Casos de Sucesso</strong>, exemplos de superação para que visitantes e usuários do website possam se sentir motivados a entrar para a rotina fitness e comprar os produtos da Food 4Fit.</p>
                    <!- -->
                    <h4 class="padding-top-15px">Marketing por E-Mail</h4>
                    <p class="padding-top-5px">O <strong>Marketing por E-Mail</strong> permite aos funcionários da <strong>Food 4Fit</strong> enviar e-mails promocionais para os usuários cadastrados no website, assim ajudando a equipe de marketing a distribuir o conteúdo e os serviços da empresa.</p>

                </article>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
