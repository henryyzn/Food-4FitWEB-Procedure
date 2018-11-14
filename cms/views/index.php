<?php
    session_start();
    require_once("modulo.php");
    validateLog();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
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
        <script src="../../assets/js/js.cookie.js"></script>
    </head>
    <body>
        <section id="main">
            <?php require_once("../components/sidebar.php") ?>
            <div id="main-content">
                <?php require_once("../components/navbar.php")?>
                <div id="page-content">
                    <div class="dash-wrapper">
                        <div class="one card-dash">
                            <h2 class="title padding-top-20px padding-bottom-5px padding-left-20px">Bem Vindo!</h2>
                            <span class="subtitle padding-left-20px padding-bottom-20px">O serviço de administração pensado para facilitar a sua vida.</span>
                            <p class="padding-left-20px padding-bottom-20px">
                                Este CMS tem como objetivo controlar o conteúdo do website da empresa Food 4Fit.
                                <br>
                                Caso ache necessário, veja o guia de ajuda de interface disponível logo abaixo para aprender sobre o serviço.
                            </p>
                            <div class="btn-generic margin-left-20px margin-bottom-20px">
                                <span>Ler Mais</span>
                            </div>
                        </div>
                        <div class="two card-dash">
                            <h2 class="title padding-top-20px padding-bottom-5px padding-left-20px">Mais Comprado Este Mês</h2>
                            <span class="subtitle padding-left-20px">Produto de Nome X</span>
                        </div>
                        <div class="three card-dash">
                            <h2 class="title padding-top-20px padding-bottom-10px padding-left-20px">Últimos Pratos Adicionados</h2>
                            <?php
                                require_once("../models/DAO/pratosDAO.php");

                                $pratosDAO = new pratosDAO();

                                $lista = $pratosDAO->selectAll();

                                for($i = 0; $i < @count($lista); $i++){
                            ?>
                            <div class="interact-card">
                                <figure class="margin-top-20px margin-left-20px margin-bottom-20px margin-right-20px">
                                    <img src="../../<?php echo($lista[$i]->foto)?>" alt="">
                                </figure>
                                <div>
                                    <h2>Nome do Usuário:</h2>
                                    <p>Changelog</p>
                                </div>
                                <span>Horário</span>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="four card-dash">
                            <p>a</p>
                        </div>
                        <div class="five card-dash">
                            <p>a</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../assets/js/theme.js"></script>
    </body>
</html>
