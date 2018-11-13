<?php
    session_start();

    $id = null;
    $foto = null;
    $botao = "Salvar";

    if(isset($_GET['btn-salvar'])){
        require_once('../models/pratosClass.php');
        require_once('../models/categoriaClass.php');
        require_once('../models/DAO/pratosDAO.php');
        require_once('../models/pratoFotoClass.php');
        require_once('../models/DAO/pratoFotoDAO.php');
        require_once('../models/DAO/categoriaDAO.php');

        $classPrato = new Prato();
        $classPrato->idCategoria = $_GET['id_categoria'];
        $classPrato->titulo = $_GET['titulo'];
        $classPrato->descricao = $_GET['descricao'];
        $classPrato->resumo = $_GET['resumo'];
        $classPrato->ativo = $_GET['ativo'];
//        $classPrato->idUsuario = $_GET['id_usuario'];

        $pratosDAO = new pratosDAO();
        if($_GET['btn-salvar'] == "Salvar"){
            $pratosDAO->insert($classPrato);
        }else{
           $pratosDAO->id = $_GET['id'];
           $pratosDAO->update($classPrato);
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
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
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
            <?php require_once("../components/navbar.php")?>
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
                            require_once('../models/DAO/pratosDAO.php');

                            $pratosDAO = new pratosDAO();
                            $lista = $pratosDAO->selectAll();
                            for($i = 0; $i < @count($lista); $i++){


                        ?>
                        <tr>
                            <td></td>
                            <td><img src=''></td>
                            <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=editar&id='">
                            </td>

                            <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=editar&id='"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categoria.php?modo=excluir&id='"></td>
                            <td><img src="../../assets/images/cms/symbols/visualizar-white.svg" alt="" class="table-generic-opts"></td>
                        </tr>

                        <?php
                            }
                        ?>
                    </table>
                      <div class="categoria-form-right">
                        <div class="form-generic border-30px">
                            <form action="upload/upload-foto-prato.php" method="POST" name="frmfoto" id="frmfoto" class="form-generic-content" enctype="multipart/form-data">
                                <label class="label-generic">Imagem:</label>
                                <div id="visualizar" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                    <img src='../../<?php echo($foto)?>' alt="Imagem a ser cadastrada" class="image-view">
                                </div>
                                <label for="foto" class="file-generic fileimage">Selecione um arquivo...</label>
                                <input type="file" name="fileimage" id="foto" style="display: none;">
                            </form>
                            <form id="form-add-prato" class="form-generic-content margin-top-30px" name="frmaddprato" method="GET" action="add-prato.php">
                                <input name="foto" type="hidden" value="<?php echo($foto)?>">
                                <input name="id" type="hidden" value="<?php echo($id)?>">

                                <label for="titulo" class="label-generic">Titulo</label>
                                <input type="text"  id="titulo" name="titulo" class="input-generic" required maxlength="255">

                                <label for="titulo" class="label-generic">Descricao</label>
                                <input type="text"  id="titulo" name="descricao" class="input-generic" required maxlength="255">

                                <label for="titulo" class="label-generic">Resumo</label>
                                <input type="text"  id="titulo" name="resumo" class="input-generic" required maxlength="255">

                                <label for="titulo" class="label-generic">Categoria</label>
                                <select type="text"  id="idCategoria" name="id_categoria" class="input-generic" required maxlength="255"><option>Selecione uma Categoria:</option>

                                <?php
                                    require_once('../models/DAO/categoriaDAO.php');

                                    $categoriaDAO = new categoriaDAO();
                                    $lista = $categoriaDAO->selectAll();

                                    for($i = 0; $i < count($lista); $i++){


                                ?>
                                  <option value="<?php echo($lista[$i]->id)?>"><?php echo($lista[$i]->titulo)?></option>
                                <?php
                                    }
                                ?>

                                </select>
                                <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                <div class="form-row">
                                    <span>Cancelar</span>
                                    <button type="submit" class="btn-generic margin-left-20px" name="btn-salvar" value="<?php echo($botao)?>">
                                        <span><?php echo ($botao)?></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <form id="form-content">
                </form>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
