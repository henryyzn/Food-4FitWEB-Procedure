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
//            session_start();
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            //Cad = Cadastro
            $listCadCategoria = $categoriaDAO->selectId($id);

            if($listCadCategoria != null)
            {
                $id = $listCadCategoria->id;
                $titulo = $listCadCategoria->titulo;
                $foto = $listCadCategoria->foto;
                $ativo = $listCadCategoria->ativo;

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
                $classCategoria->id = $_SESSION['id'];
                $categoriaDAO->update($classCategoria);
            }

    }
?>

<!DOCTYPE html><html lang="pt-br">
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

    </head>
        <body>
         <section id="main">
            <?php require_once("../components/sidebar.php") ?>
            <div id="main-content">
            <?php require_once("../components/navbar.php") ?>
                <div id="page-content">

                    <div id="tabs-content">
                        <div id="container-form">
                            <div class="form-generic">
                                <form action="upload/upload-categoria.php" method="post" name="frmfoto" id="frmfoto" enctype="multipart/form-data">

                                    <label for="foto" class="file-label">Escolher Imagem</label>
                                    <input id="foto" name="fileimage" type="file" accept="image/*">



                                    <span class="label-generic">Imagem:</span>
                                    <div id="visualizar" class="register_product_image" style="width: 300px; height: 300px; background: #9CC283;">
                                        <img src='../<?php echo($foto);?>'>
                                    </div>



                                </form>
                                <form id="form-categoria" class="form-generic-content" name="frmcategoria" method="GET" action="categoria.php">
                                    <input name="foto" type="hidden" value="">

                                    <label for="titulo" class="label-generic">Título Categoria Pai</label>
                                    <input type="text" value="<?= @$titulo ?>" id="titulo" name="titulo"  required maxlength="255">

                                    <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">



                                    <input type="submit"  name="btn-salvar" value="<?php echo($botao)?>">
                                </form>
                            </div>
                        </div>


                        <div class="active" id="container-listagem">
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

                                        for($i = 0; $i < count($lista); $i++){

                                    ?>


                                <tr>
                                    <td><?php echo($lista[$i]->titulo)?></td>
                                    <td><img src='../../<?php echo($lista[$i]->foto)?>'></td>
                                    <td><input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1"></td>
<!--                                    <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>-->



                                    <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=editar&id=<?= $lista[$i]->id ?>'"></td>
                                    <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>

                                </tr>
                                     <?php
                                }
                            ?>
                            </table>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
