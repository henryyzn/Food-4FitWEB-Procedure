<?php

    session_start();

    $id = null;
    $logradouro = null;
    $numero = null;
    $bairro = null;
    $cep = null;
    $complemento = null;
    $botao = "Salvar";

    require_once('../models/descontoClass.php');
    require_once('../models/DAO/descontoDAO.php');

    $descontoDAO = new descontoDAO();

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == 'excluir'){
            $id = $_GET['id'];
            $descontoDAO->delete($id);
        }elseif($modo == 'ativar'){
            $id = $_GET['id'];
            $descontoDAO->active($id);
        }elseif($modo == 'desativar'){
            $id = $_GET['id'];
            $descontoDAO->desactive($id);
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diário de Bordo :: Food 4fit - CMS</title>
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
    <script src="../../assets/public/js/jquery.mask.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
</head>
<body>
<section id="main">
    <?php require_once("../components/sidebar.php") ?>
    <div id="main-content">
        <?php require_once("../components/navbar.php")?>
        <div id="page-content">
            <div class="generic-block">
                <div id="page-actions">
                    <div onclick="modal('desconto')">
                        <img src="../../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                        <span>Adicionar Desconto</span>
                    </div>
                    <a href="descontos.php">
                        <img src="../../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                        <span>Recarregar Listagem</span>
                    </a>
                </div>
                <table class="generic-table">
                    <tr>
                        <td><span>Título:</span></td>
                        <td><span>Código Cupom:</span></td>
                        <td><span>Valor:</span></td>
                        <td><span>Validade Envio:</span></td>
                        <td colspan="3"><span>Opções:</span></td>
                    </tr>
                    <?php
                        require_once("../models/DAO/descontoDAO.php");

                        $descontoDAO = new descontoDAO();

                        $lista = $descontoDAO->selectAll();

                        for($i = 0; $i < @count($lista); $i++){
                            $status = $lista[$i]->ativo;
                            if($status == 1)
                                $status = 'desativar';
                            else
                                $status = 'ativar';
                    ?>
                    <tr>
                        <td><span class="table-result"><strong><?php echo($lista[$i]->titulo)?></strong></span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->codig_cupom)?></span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->valor)?></span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->validade)?></span></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/<?php echo($status)?>.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='descontos.php?modo=<?php echo($status)?>&id=<?php echo($lista[$i]->id)?>'"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='descontos.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='descontos.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                    </tr>
                    <?php
                        }
                    ?>
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
