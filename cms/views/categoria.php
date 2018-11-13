<?php

    session_start();

    $id = null;
    $titulo = null;
    $foto = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){
            require_once('../models/categoriaClass.php');
            require_once('../models/DAO/categoriaDAO.php');

            $categoriaDAO = new categoriaDAO();
            $id = $_GET['id'];
            $categoriaDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('../models/categoriaClass.php');
            require_once('../models/DAO/categoriaDAO.php');

            $categoriaDAO = new categoriaDAO();

            $id = $_GET['id'];

            //Cad = Cadastro
            $listCadCategoria = $categoriaDAO->selectId($id);

//              if($listCadCategoria != null)
            if(@count($listCadCategoria)>0){
                $id = $listCadCategoria->id;
                $titulo = $listCadCategoria->titulo;
                $foto = $listCadCategoria->foto;
                $ativo = $listCadCategoria->ativo;
//                var_dump($id);
                $botao = "Editar";
            }

        }

    }

    if(isset($_GET['btn-salvar'])){
        require_once('../models/categoriaClass.php');
        require_once('../models/DAO/categoriaDAO.php');

        $classCategoria = new categoria();
//        $classCategoria->idCategoriaP = $_GET['id_categoria_parent'];
        $classCategoria->titulo = $_GET['titulo'];
        $classCategoria->foto = $_GET['foto'];
        $classCategoria->ativo = $_GET['ativo'];

        $categoriaDAO = new categoriaDAO();
        if($_GET['btn-salvar'] == "Salvar"){
            $categoriaDAO->insert($classCategoria);
        }else{
            $classCategoria->id = $_GET['id'];
            $categoriaDAO->update($classCategoria);
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
            $('#foto').on('change', function(){
                $('#frmfoto').ajaxForm({
                    target:'#visualizar'
                }).submit();
            });
        });
    </script>
    <style>
        .categoria-block{
            width: 100%;
            height: auto;
            display: flex;
        }
        .categoria-form-right{
            width: 100%;
            max-width: 400px;
            height: 100vh;
            background-color: #FCFCFC;
            overflow: auto;
        }
        .image-view{
            max-width: 300px; height: auto; display: block;
        }


        .elementPhoto{
            max-width: 200px;
        }
    </style>
</head>
<body>
     <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
        <?php require_once("../components/navbar.php") ?>
            <div id="page-content">
                <div class="categoria-block">
                    <table class="generic-table">
                        <tr>
                            <td><span>Título</span></td>
                            <td><span>foto</span></td>
                            <td><span>Ativo</span></td>
                            <td colspan="3"><span>Opções</span></td>
                        </tr>
                        <?php
                            require_once('../models/DAO/categoriaDAO.php');

                            $categoriaDAO = new categoriaDAO();

                            $lista = $categoriaDAO->selectAll();

                            for($i = 0; $i < @count($lista); $i++){
                        ?>
                        <tr>
                            <td><?php echo($lista[$i]->titulo)?></td>
                            <td><img src='../../<?php echo($lista[$i]->foto)?>' class="elementPhoto"></td>
                            <td><input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1"></td>
<!--                                    <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>-->
                            <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <div class="categoria-form-right">
                        <div class="form-generic border-30px">
                            <form action="upload/upload-categoria.php" method="POST" name="frmfoto" id="frmfoto" class="form-generic-content" enctype="multipart/form-data">
                                <label class="label-generic">Imagem:</label>
                                <div id="visualizar" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                    <img src='../../<?php echo($foto)?>' alt="Imagem a ser cadastrada" class="image-view">
                                </div>
                                <label for="foto" class="file-generic fileimage">Selecione um arquivo...</label>
                                <input type="file" name="fileimage" id="foto" style="display: none;">
                            </form>
                            <form id="form-categoria" class="form-generic-content margin-top-30px" name="frmcategoria" method="GET" action="categoria.php">
                                <input name="foto" type="hidden" value="<?php echo($foto)?>">
                                <input name="id" type="hidden" value="<?php echo($id)?>">

                                <label for="titulo" class="label-generic">Título Categoria Pai</label>
                                <input type="text" value="<?= @$titulo ?>" id="titulo" name="titulo" class="input-generic" required maxlength="255">

                                <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                <div class="form-row">
                                    <span>Cancelar</span>
                                    <button type="submit" class="btn-generic margin-left-20px" name="btn-salvar" value="<?php echo($botao)?>">
                                        <span><?php echo($botao)?></span>
                                    </button>
                                </div>
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
