<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos :: Food 4fit - CMS</title>
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
            <div class="diario-border-wrapper">
                <table class="generic-table">
                    <tr>
                        <td><span>Nome:</span></td>
                        <td><span>E-Mail:</span></td>
                        <td><span>Prato:</span></td>
                        <td><span>Quantidade:</span></td>
                        <td colspan="2"><span>Opções:</span></td>
                    </tr>
<!--
                    <?php
//                        require_once("../models/DAO/pedidosDAO.php");
//
//                        $diarioBordoDAO = new diarioBordoDAO();
//
//                        $lista = $diarioBordoDAO->selectDouble();
//
//                        for($i = 0; $i < count($lista); $i++){
                    ?>
                    <tr>
                        <td><span class="table-result"><strong><?php //echo($lista[$i]->nome)?></strong></span></td>
                        <td><span class="table-result"><?php //echo($lista[$i]->email)?></span></td>
                        <td><span class="table-result"><?php //echo($lista[$i]->titulo)?></span></td>
                        <td><span class="table-result"><?php //echo($lista[$i]->progresso)?></span></td>
                        <td><span class="table-result"><?php //echo($lista[$i]->data)?></span></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/visualizar.svg" alt="" class="table-generic-opts" onclick="abrir(<?php //echo($lista[$i]->id)?>)"></td>
                        <td width="42px"><img src="../../assets/images/icons/level-up.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='diario-bordo.php?modo=transformar&id=<?php //echo($lista[$i]->id)?>'"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='diario-bordo.php?modo=excluir&id=<?php //echo($lista[$i]->id)?>'"></td>
                    </tr>
                    <?php
                        //}
                    ?>
-->
                </table>
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


