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
                            <h2 class="title padding-top-20px padding-bottom-10px padding-left-20px">Últimos Comentários Adicionados</h2>
                            <?php
                                require_once("../models/DAO/comentario-geralDAO.php");

                                $comentarioGeralDAO = new comentarioGeralDAO();

                                $lista = $comentarioGeralDAO->selectAccept();

                                for($i = 0; $i < @count($lista); $i++){
                            ?>
                            <div class="interact-card">
                                <figure class="margin-top-20px margin-left-20px margin-bottom-20px margin-right-20px">
                                    <img src="../../<?php echo($lista[$i]->foto)?>" alt="">
                                </figure>
                                <div>
                                    <h2><?php echo($lista[$i]->assunto)?></h2>
                                    <p><?php echo($lista[$i]->email)?></p>
                                </div>
                                <span><?php echo($lista[$i]->data)?></span>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="two card-dash">
                            <img src="../../assets/images/backgrounds/profile-head.jpeg" alt="" class="index-profile-card">
                            <div class="holder">
                                <figure class="index-profile-image">
                                    <img src="../../<?php echo($_SESSION['avatar_funcionario'])?>" alt="">
                                </figure>
                            </div>
                            <div class="index-profile-infos">
                                <h2 class="margin-top-80px"><?php echo($_SESSION['nome_funcionario'])?></h2>
                                <span id="email"><?php echo($_SESSION['email_funcionario'])?></span>
                                <span id="matricula" class="margin-bottom-20px">Matrícula: <?php echo($_SESSION['matricula_funcionario'])?></span>
                            </div>
                        </div>
                        <div class="three card-dash">
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
                        <div class="four card-dash" onclick="javascript:location.href='diario-bordo.php'">
                            <h2 class="title padding-top-20px padding-bottom-5px padding-left-20px">Resumo do Diário de Bordo</h2>
                            <?php
                                require_once("../models/DAO/diario-bordoDAO.php");

                                $diarioBordoDAO = new diarioBordoDAO();

                                $lista = $diarioBordoDAO->selectProgress('otimo');

                                for($i = 0; $i < @count($lista); $i++){
                                    $porcentagem = 100;
                                    $progresso = $lista[$i]->progresso;

                                    $nova_porcentagem = ($porcentagem / 100) * $progresso . "%";
                            ?>
                            <p class="subtitle padding-left-20px"><strong>Ótimo:</strong> <?php echo($nova_porcentagem)?></p>
                            <?php
                                }
                            ?>
                            <!-- ---------------------- -->
                            <?php
                                require_once("../models/DAO/diario-bordoDAO.php");

                                $diarioBordoDAO = new diarioBordoDAO();

                                $lista = $diarioBordoDAO->selectProgress('bom');

                                for($i = 0; $i < @count($lista); $i++){
                                    $porcentagem = 100;
                                    $progresso = $lista[$i]->progresso;

                                    $nova_porcentagem = ($porcentagem / 100) * $progresso . "%";
                            ?>
                            <p class="subtitle padding-left-20px"><strong>Bom:</strong> <?php echo($nova_porcentagem)?></p>
                            <?php
                                }
                            ?>
                            <!-- ---------------------- -->
                            <?php
                                require_once("../models/DAO/diario-bordoDAO.php");

                                $diarioBordoDAO = new diarioBordoDAO();

                                $lista = $diarioBordoDAO->selectProgress('regular');

                                for($i = 0; $i < @count($lista); $i++){
                                    $porcentagem = 100;
                                    $progresso = $lista[$i]->progresso;

                                    $nova_porcentagem = ($porcentagem / 100) * $progresso . "%";
                            ?>
                            <p class="subtitle padding-left-20px"><strong>Regular:</strong> <?php echo($nova_porcentagem)?></p>
                            <?php
                                }
                            ?>
                            <!-- ---------------------- -->
                            <?php
                                require_once("../models/DAO/diario-bordoDAO.php");

                                $diarioBordoDAO = new diarioBordoDAO();

                                $lista = $diarioBordoDAO->selectProgress('ruim');

                                for($i = 0; $i < @count($lista); $i++){
                                    $porcentagem = 100;
                                    $progresso = $lista[$i]->progresso;

                                    $nova_porcentagem = ($porcentagem / 100) * $progresso . "%";
                            ?>
                            <p class="subtitle padding-left-20px"><strong>Ruim:</strong> <?php echo($nova_porcentagem)?></p>
                            <?php
                                }
                            ?>
                            <!-- ---------------------- -->
                            <?php
                                require_once("../models/DAO/diario-bordoDAO.php");

                                $diarioBordoDAO = new diarioBordoDAO();

                                $lista = $diarioBordoDAO->selectProgress('pessimo');

                                for($i = 0; $i < @count($lista); $i++){
                                    $porcentagem = 100;
                                    $progresso = $lista[$i]->progresso;

                                    $nova_porcentagem = ($porcentagem / 100) * $progresso . "%";
                            ?>
                            <p class="subtitle padding-left-20px padding-bottom-15px"><strong>Péssimo:</strong> <?php echo($nova_porcentagem)?></p>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="five card-dash">
                            <h2 class="title padding-top-20px padding-bottom-5px padding-left-20px">Mais Comprado Este Mês</h2>
                            <span class="subtitle padding-left-20px">Produto de Nome X</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../assets/js/theme.js"></script>
        <script>
            (function($) {
                //Setamos o valor inicial
                var count = 3;
                var i = null;

                //escondemos todos os elementos maior que o valor inicial
                $(".interact-card").slice(count).hide();

            }(jQuery));
        </script>
    </body>
</html>
