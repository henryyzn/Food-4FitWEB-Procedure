<?php
    session_start();

    $id = null;
    $titulo = null;
    $texto = null;
    $imagem = null;
    $ativo = "null";
    $botao = "Salvar";
    $edit = "null";

if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $id = $_GET['id'];

        require_once('../models/propagandaClass.php');
        require_once('../models/DAO/propagandaDAO.php');
        $propagandaDAO = new propagandaDAO;

        if($modo == 'excluir'){
            $propagandaDAO->delete($id);

        }else if($modo == 'editar'){
            $listPropaganda = $propagandaDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(@count($listPropaganda)>0){
                $id = $listPropaganda->id;
                $titulo = $listPropaganda->titulo;
                $texto = $listPropaganda->texto;
                $imagem = $listPropaganda->imagem;


                $botao = "Editar";
                $edit = $botao;
            }
        }elseif($modo == 'ativar'){
            $propagandaDAO->active($id);
        }elseif($modo == 'desativar'){
            $propagandaDAO->desactive($id);
        }
    }

    if(isset($_GET['btn-salvar'])){
        require_once('../models/propagandaClass.php');
        require_once('../models/DAO/propagandaDAO.php');

        $classPropaganda = new Propaganda();
        $classPropaganda->id = $_GET['id'];
        $classPropaganda->titulo = $_GET['titulo'];
        $classPropaganda->texto = $_GET['texto'];
        $classParceiros->imagem = $_GET['imagem'];
        $classPropaganda->ativo = '1';

        $propagandaDAO = new propagandaDAO();

        if($_GET['btn-salvar'] == "Salvar"){
           $propagandaDAO->insert($classPropaganda);
       }elseif($_GET['btn-salvar'] == "Editar"){
           $classPropaganda->id = $_GET['id'];
           $propagandaDAO->update($classPropaganda);

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
                    <div onclick="modal('propaganda')">
                        <img src="../../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                        <span>Adicionar Propaganda</span>
                    </div>
                    <a href="propaganda.php">
                        <img src="../../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                        <span>Recarregar Listagem</span>
                    </a>
                </div>
                <table class="generic-table">
                    <tr>
                        <td><span>Título:</span></td>
                        <td><span>Texto:</span></td>
                        <td><span>imagem:</span></td>
                        <td colspan="3"><span>Opções:</span></td>
                    </tr>
                    <?php
                        require_once("../models/DAO/propagandaDAO.php");

                        $propagandaDAO = new propagandaDAO();

                        $lista = $propagandaDAO->selectAll();

                        for($i = 0; $i < @count($lista); $i++){
                            $status = $lista[$i]->ativo;
                            if($status == 1)
                                $status = 'desativar';
                            else
                                $status = 'ativar';
                    ?>
                    <tr>
                        <td><span class="table-result"><strong><?php echo($lista[$i]->titulo)?></strong></span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->texto)?></span></td>
                        <td><span class="table-result"><?php echo($lista[$i]->imagem)?></span></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/<?php echo($status)?>.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='propaganda.php?modo=<?php echo($status)?>&id=<?php echo($lista[$i]->id)?>'"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='propaganda.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                        <td width="42px"><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='propaganda.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
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
