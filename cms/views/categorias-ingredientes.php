<?php
    session_start();

    $id = null;
    $titulo = null;
    $foto = null;
    $ativo = null;
    $botao = "Salvar";

    require_once('../models/categorias-ingredientesClass.php');
    require_once('../models/DAO/categorias-ingredientesDAO.php');

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){

        require_once('../models/categorias-ingredientesClass.php');
        require_once('../models/DAO/categorias-ingredientesDAO.php');

            $catIngredienteDAO  = new catIngredienteDAO();
            $id = $_GET['id'];
            $catIngredienteDAO->delete($id);

        }else if($modo == 'editar'){


            $catIngredienteDAO  = new catIngredienteDAO();
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            $listIngrediente = $catIngredienteDAO->selectId($id);

            if(count($listIngrediente)>0)
            {
                $id = $listIngrediente->id;
                $titulo = $listIngrediente->titulo;
                $foto = $listIngrediente->foto;
                $ativo = $listIngrediente->ativo;

                $botao = "Editar";
            }
        }else if($modo == 'ativar'){
            $catIngredienteDAO  = new catIngredienteDAO();
            $id = $_GET['id'];
            $catIngredienteDAO->active($id);
        }else if($modo == 'desativar'){
            $catIngredienteDAO  = new catIngredienteDAO();
            $id = $_GET['id'];
            $catIngredienteDAO->desactive($id);
        }

    }

    if(isset($_GET['btn-salvar'])){
        require_once('../models/categorias-ingredientesClass.php');
        require_once('../models/DAO/categorias-ingredientesDAO.php');

        $classCatIngrediente = new categoriaIngrediente();
//        $classCatIngrediente->idCatIngredienteP = $_GET['tituloFilha'];
        $classCatIngrediente->titulo = $_GET['titulo'];
        $classCatIngrediente->foto = $_GET['foto'];
        $classCatIngrediente->ativo = $_GET['ativo'];

        $catIngredienteDAO = new catIngredienteDAO();
        if($_GET['btn-salvar'] == "Salvar"){
            $catIngredienteDAO->insert($classCatIngrediente);
        }else{
            $classCatIngrediente->id = $_SESSION['id'];

            $catIngredienteDAO->update($classCatIngrediente);
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias de Ingredientes :: Food 4fit - CMS</title>
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
        .image-view{
            max-width: 300px; height: auto; display: block;
        }
        .elementPhoto{
            max-width: 200px;
            display: block;
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
                            <td><span>Título:</span></td>
                            <td><span>Imagem:</span></td>
                            <td colspan="4"><span>Opções:</span></td>
                        </tr>

                        <?php
                           require_once('../models/DAO/categorias-ingredientesDAO.php');

                            $catIngredienteDAO = new catIngredienteDAO();

                            $lista = $catIngredienteDAO->selectAll();

                            for($i = 0; $i < @count($lista); $i++){
                                $ativo = $lista[$i]->ativo;
                            if($ativo == 1)
                                $ativo = 'desativar';
                            else
                                $ativo = 'ativar';
                        ?>

                        <tr>
                            <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                            <td><img src='../../<?php echo($lista[$i]->foto)?>' class="elementPhoto"></td>
                            <td width="70px"><img src="../../assets/images/cms/symbols/<?php echo($ativo)?>.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categorias-ingredientes.php?modo=<?php echo($ativo)?>&id=<?php echo($lista[$i]->id)?>'"></td>
                            <td width="70px"><img src="../../assets/images/cms/symbols/visualizar.svg" alt="" class="table-generic-opts" onclick="modalDouble(<?php echo($lista[$i]->id)?>, 'categoria-ingrediente')"></td>
                            <td width="70px"><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categorias-ingredientes.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                            <td width="70px"><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categorias-ingredientes.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
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
                            <form id="form-categoria-ingrediente" class="form-generic-content margin-top-30px" name="frmcategoriaingrediente" method="GET" action="categorias-ingredientes.php">
                                <input name="foto" type="hidden" value="<?php echo($foto)?>">

                                <input name="id" type="hidden" value="<?php echo($id)?>">
                                <label for="titulo" class="label-generic">Título Categoria</label>
                                <input type="text" value="<?= @$titulo ?>" id="titulo" name="titulo" class="input-generic" required maxlength="255">


<!--
                                <label for="titulo" class="label-generic">Título Categoria Filha</label>
                                <input type="text"  id="tituloFilha" name="tituloFilha" class="input-generic" required maxlength="255">
-->


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
    <div class="generic-modal animate fadeIn" id="abrir">
        <article class="generic-modal-wrapper 550px">

        </article>
    </div>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>

