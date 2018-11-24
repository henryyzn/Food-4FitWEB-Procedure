<?php

    session_start();

    $id = null;
    $titulo = null;
    $descricao = null;
    $foto = null;
    $botao = "Salvar";
    $edit = "null";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $id = $_GET['id'];

        require_once('../models/categoriaClass.php');
        require_once('../models/DAO/categoriaDAO.php');
        $categoriaDAO = new categoriaDAO();

        if($modo == 'excluir'){
            $categoriaDAO->delete($id);

        }elseif($modo == 'editar'){
            $listCategoria = $categoriaDAO->selectId($id);
            if(@count($listCategoria)>0){
                $id = $listCategoria->id;
                $titulo = $listCategoria->titulo;
                $descricao = $listCategoria->descricao;
                $foto = $listCategoria->foto;
                $ativo = $listCategoria->ativo;
                $botao = "Editar";
                $edit = $botao;
            }
        }elseif($modo == 'desativar'){
            $categoriaDAO->desactive($id);
        }elseif($modo == 'ativar'){
            $categoriaDAO->active($id);
        }
    }

    if(isset($_GET['btn-salvar'])){
        require_once('../models/categoriaClass.php');
        require_once('../models/DAO/categoriaDAO.php');

        $classCategoria = new categoria();
        $classCategoria->titulo = $_GET['titulo'];
        $classCategoria->descricao = $_GET['descricao'];
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
    <title>Categorias :: Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/public/js/jquery.form.js"></script>
    <script src="../../assets/public/js/jquery.mask.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
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
                <div id="list-content">
                    <div class="categoria-block">
                        <div id="page-actions">
                            <div id="open-form">
                                <img src="../../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                                <span>Adicionar Categoria</span>
                            </div>
                            <a href="categoria.php">
                                <img src="../../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                                <span>Recarregar Listagem</span>
                            </a>
                        </div>
                        <table class="generic-table">
                            <tr>
                                <td><span>Imagem:</span></td>
                                <td><span>Título:</span></td>
                                <td><span>Descrição:</span></td>
                                <td colspan="3"><span>Opções</span></td>
                            </tr>
                            <?php
                                require_once('../models/DAO/categoriaDAO.php');

                                $categoriaDAO = new categoriaDAO();

                                $lista = $categoriaDAO->selectAll();

                                for($i = 0; $i < @count($lista); $i++){
                                    $status = $lista[$i]->ativo;
                                    if($status == 1)
                                        $status = 'desativar';
                                    else
                                        $status = 'ativar';
                            ?>
                            <tr>
                                <td><img src="../../<?php echo($lista[$i]->foto)?>" alt="" class="elementPhoto"></td>
                                <td><span class="table-results"><?php echo($lista[$i]->titulo)?></span></td>
                                <td><span class="table-results"><?php echo($lista[$i]->descricao)?></span></td>
                                <td><img src="../../assets/images/cms/symbols/<?php echo($status)?>.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=<?php echo($status)?>&id=<?php echo($lista[$i]->id)?>'"></td>
                                <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                                <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                        <aside class="explanation-aside" id="add-prato-form">
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
                                    <input type="hidden" name="editar" id="editar" value="<?php echo($edit)?>">

                                    <label for="titulo" class="label-generic">Título:</label>
                                    <input type="text" value="<?php echo($titulo)?>" id="titulo" name="titulo" class="input-generic" required maxlength="255">

                                    <label for="descricao" class="label-generic">Descrição:</label>
                                    <textarea id="descricao" name="descricao" class="textarea-generic"><?php echo($descricao)?></textarea>

                                    <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                    <div class="form-row">
                                        <span onclick="javascript:location.href='categoria.php'">Cancelar</span>
                                        <button type="submit" class="btn-generic margin-left-20px" name="btn-salvar" value="<?php echo($botao)?>">
                                            <span><?php echo($botao)?></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="../../assets/js/theme.js"></script>
<script>
    $(document).ready(function(){
        $("#open-form").click(function () {
            $("#add-prato-form").slideToggle("fast");
        });

        var edit = document.getElementById("editar");
        if(edit.value == "Editar"){
            $("#add-prato-form").css("display", "block");
        }
    });
</script>
</body>
</html>
