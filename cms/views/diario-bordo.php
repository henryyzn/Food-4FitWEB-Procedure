<?php

    session_start();

    $id = null;
    $logradouro = null;
    $numero = null;
    $bairro = null;
    $cep = null;
    $complemento = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == 'excluir'){

            require_once('../models/diario-bordoClass.php');
            require_once('../models/DAO/diario-bordoDAO.php');

            $diarioBordoDAO = new diarioBordoDAO;
            $id = $_GET['id'];
            $diarioBordoDAO->delete($id);
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="themeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="themeBases" href="../../assets/css/bases-light.css">
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
            <div class="diario-border-wrapper">
                <table class="table-diario">
                    <tr id="contact-table-trow">
                        <td><span>NOME</span></td>
                        <td><span>E-MAIL</span></td>
                        <td><span>ASSUNTO</span></td>
                        <td><span>PROGRESSO</span></td>
                        <td><span>DATA ENVIO</span></td>
                        <td colspan="2"><span>OPÇÕES</span></td>
                    </tr>
                    <?php
                        require_once("../models/DAO/diario-bordoDAO.php");

                        $diarioBordoDAO = new diarioBordoDAO();

                        $lista = $diarioBordoDAO->selectDouble();

                        for($i = 0; $i < count($lista); $i++){
                    ?>
                    <tr class="contact-table-rrow">
                        <td><span><?php echo($lista[$i]->nome)?></span></td>
                        <td><span><?php echo($lista[$i]->email)?></span></td>
                        <td><span><?php echo($lista[$i]->titulo)?></span></td>
                        <td><span><?php echo($lista[$i]->progresso)?></span></td>
                        <td><span><?php echo($lista[$i]->data)?></span></td>
                        <td>
                            <div class="coluna">
                                <img src="../../assets/images/cms/symbols/visualizar.svg" alt="" class="view margin-right-10px" onclick="abrir(<?php echo($lista[$i]->id)?>)">
                                <img src="../../assets/images/cms/symbols/excluir.svg" alt="" onclick="javascript:location.href='diario-bordo.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'">
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <aside class="menu-lateral-diario form-generic">
                    <div>
                        <h2>Filtros</h2>
                    </div>
                    <form class="form-generic-content width-300px margin-right-auto margin-left-auto">
                        <label class="label-generic padding-top-20px">
                            Progresso:
                        </label>
                        <input type="checkbox">
                        <label class="label-generic">PÉSSIMO</label>
                        <input type="checkbox">
                        <label class="label-generic">RUIM</label>
                        <input type="checkbox">
                        <label class="label-generic">REGULAR</label>
                        <input type="checkbox">
                        <label class="label-generic">BOM</label>
                        <input type="checkbox">
                        <label class="label-generic">ÓTIMO</label>

                        <h3 class="padding-top-20px">Idade:</h3>
                        <label class="label-generic">Entre:</label>
                        <input type="text" class="input-generic">
                        <label class="label-generic">À:</label>
                        <input type="text" class="input-generic">

                        <label class="label-generic">Data de Envio Posterior a:</label>
                        <input type="text" class="input-generic">
                        <label class="label-generic">Data de Envio anterior a:</label>
                        <input type="text" class="input-generic">

                        <input type="submit" name="submit" class="display-none" class="input-generic">
                    </form>
                </aside>
            </div>
        </div>
    </div>
</section>
<div class="generic-modal animate fadeIn" id="abrir">
    <article class="generic-modal-wrapper">

    </article>
</div>
<script src="../../assets/js/theme.js"></script>
</body>
</html>


