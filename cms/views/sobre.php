<?php

    session_start();

    $id = null;
    $titulo = null;
    $texto = null;
    $foto = null;
    $ativo = null;
    $botao = "Salvar";


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){

            require_once('../models/sobreClass.php');
            require_once('../models/DAO/sobreDAO.php');

            $sobreDAO = new sobreDAO;
            $id = $_GET['id'];
            $sobreDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('../models/sobreClass.php');
            require_once('../models/DAO/sobreDAO.php');

            $sobreDAO = new sobreDAO;
            $id = $_GET['id'];

            $listSobreNos = $sobreDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(@count($listSobreNos)>0)
            {

                $id = $listSobreNos->id;
                $titulo = $listSobreNos->titulo;
                $texto = $listSobreNos->texto;
                $foto = $listSobreNos->foto;
                $ativo = $listSobreNos->ativo;

                $botao = "Editar";

            }
        }
    }
    if(isset($_GET['btn-salvar'])){

        require_once('../models/sobreClass.php');
        require_once('../models/DAO/sobreDAO.php');

        $classSobreNos = new Sobre();
        $classSobreNos->titulo = $_GET['titulo'];
        $classSobreNos->texto = $_GET['texto'];
        $classSobreNos->foto = $_GET['txtfoto'];
        $classSobreNos->ativo = "1";

        $sobreDAO = new sobreDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $sobreDAO->insert($classSobreNos);
           }elseif($_GET['btn-salvar'] == "Editar"){
               $classSobreNos->id = $_GET['id'];
               $sobreDAO->update($classSobreNos);
           }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre a Empresa :: Food 4fit - CMS</title>
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
    <script>
        $(document).ready(function(){
            $('#fotos').on('change', function(){

                $('#frmfoto').ajaxForm({
                    target:'#view'
                }).submit();
            });
        });

    </script>
    <style>
        .sobre-block{
            width: 100%;
            height: auto;
            display: flex;
        }
        .sobre-form-right{
            width: 100%;
            max-width: 400px;
            height: 100vh;
            background-color: #FCFCFC;
            overflow: auto;
        }
        .image-view{
            max-width: 300px; height: auto; display: block;
        }
    </style>
</head>
<body>
     <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
        <?php require_once("../components/navbar.php") ?>
            <div id="page-content">
                <div class="sobre-block">
                    <table class="generic-table">
                        <tr>
                            <td><span>Imagem:</span></td>
                            <td><span>Título:</span></td>
                            <td><span>Prévia:</span></td>
                            <td colspan="3"><span>Opções</span></td>
                        </tr>
                        <?php
                            require_once("../models/DAO/sobreDAO.php");

                            $sobreDAO = new sobreDAO();

                            $lista = $sobreDAO->selectAll();

                            for($i = 0; $i < @count($lista); $i++){
                        ?>
                        <tr>
                            <td><img src="../../<?php echo($lista[$i]->foto)?>" alt="" class="table-image-result"></td>
                            <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                            <td><span class="table-result big-text"><?php echo($lista[$i]->texto)?></span></td>
                            <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>
                            <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <div class="sobre-form-right">
                        <div class="form-generic border-30px">
                            <form action="upload/upload.php" method="POST" name="frmfoto" enctype="multipart/form-data" id="frmfoto">
                                <label class="label-generic">Imagem:</label>
                                <div id="view" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                    <img src='../../<?php echo($foto)?>' alt="Imagem a ser cadastrada" class="image-view">
                                </div>
                                <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                                <input type="file" name="fileimage" id="fotos" style="display: none;">
                            </form>
                            <form id="form-sobre-nos" class="form-generic-content margin-top-30px" name="frmcadastro" method="GET" action="sobre.php">
                                <input name="txtfoto" type="hidden" value="<?php echo($foto)?>">

                                <label for="titulo" class="label-generic">Título</label>
                                <input type="text" id="titulo" name="titulo" value="<?php echo($titulo);?>" class="input-generic" required maxlength="255">

                                <label for="texto" class="label-generic">Texto</label>
                                <textarea id="texto" type="text" name="texto" class="textarea-generic"><?php echo($texto);?></textarea>

                                <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                <button type="submit" value="<?php echo($botao)?>" name="btn-salvar" class="btn-generic">
                                    <span>Salvar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
