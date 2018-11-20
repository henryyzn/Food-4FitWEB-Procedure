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
        require_once('../models/DAO/caso-sucessoDAO.php');
        
        if($modo == 'excluir'){
            $casoSucessoDAO = new casoSucessoDAO();
            $id = $_GET['id'];
            $casoSucessoDAO->delete($id);
        }elseif($modo == 'ativar'){
            $casoSucessoDAO = new casoSucessoDAO();
            $id = $_GET['id'];
            $casoSucessoDAO->active($id);
        }elseif($modo == 'desativar'){
            $casoSucessoDAO = new casoSucessoDAO();
            $id = $_GET['id'];
            $casoSucessoDAO->desactive($id);
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casos de Sucesso :: Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
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
                        <td><span>Idade:</span></td>
                        <td><span>Título:</span></td>
                        <td colspan="3"><span>Opções:</span></td>
                    </tr>
                    <?php
                        require_once("../models/DAO/caso-sucessoDAO.php");

                        $casoSucessoDAO = new casoSucessoDAO();

                        $lista = $casoSucessoDAO->selectAll();

                        for($i = 0; $i < @count($lista); $i++){
                            $idade = date_diff(date_create($lista[$i]->data_nascimento), date_create('now'))->y;
                            $status = $lista[$i]->ativo;
                            if($status == 1)
                                $status = 'desativar';
                            else
                                $status = 'ativar';
                    ?>
                    <tr>
                        <td><span class="table-result"><strong><?php echo($lista[$i]->nome)?></strong></span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->email)?></span></td>
                        <td><span class="table-result"><?php echo($idade)?> Anos</span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/visualizar.svg" alt="" class="table-generic-opts" onclick="modalDouble(<?php echo($lista[$i]->id)?>, 'caso-sucesso')"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/<?php echo($status)?>.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='casos-sucesso.php?modo=<?php echo($status)?>&id=<?php echo($lista[$i]->id)?>'"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='casos-sucesso.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
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