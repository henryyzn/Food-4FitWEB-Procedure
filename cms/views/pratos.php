<?php
    session_start();
    $id = null;
    $foto = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == 'excluir'){

            require_once('../models/pratosClass.php');
            require_once('../models/DAO/pratosDAO.php');

            $pratosDAO = new pratosDAO;
            $id = $_GET['id'];
            $pratosDAO->delete($id);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratos :: Food 4fit - CMS</title>
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
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
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
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div id="list-content">
                    <div class="pratos-wrapper">
                         <div id="page-actions">
                            <div id="open-form">
                                <img src="../../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                                <span>Adicionar Prato</span>
                            </div>
                            <a href="pratos.php">
                                <img src="../../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                                <span>Recarregar Listagem</span>
                            </a>
                        </div>
                        <div class="generic-grid animate fadeInUp">
                            <?php
                                require_once("../../cms/models/DAO/pratosDAO.php");

                                $pratosDAO = new pratosDAO();

                                $lista = $pratosDAO->selectAll();

                                for($i = 0; $i < @count($lista); $i++){

                            ?>
                            <div class="generic-card">
                                <img src="../../<?php echo($lista[$i]->foto)?>" alt="Teste" class="generic-card-img">
                                <div class="generic-card-ovy">
                                    <span class="card-dish-name margin-bottom-20px"><?php echo($lista[$i]->titulo)?></span>
                                    <div class="card-dish-separator margin-bottom-15px"></div>
                                    <p class="categoria-prato margin-bottom-30px"><b>Categoria:</b> Alguma Coisa</p>

                                    <div class="edit-btns">
                                        <img src="../../assets/images/icons/edit.svg" alt="Editar Prato">
                                        <img src="../../assets/images/icons/delete-white.svg" alt="Excluir Prato" onclick="javascript:location.href='pratos.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'">
                                        <img src="../../assets/images/icons/checked-white.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <aside class="explanation-aside hide" id="add-prato-form">
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

                            <label for="titulo" class="label-generic">Titulo:</label>
                            <input type="text"  id="titulo" name="titulo" class="input-generic" required maxlength="255">

                            <label for="descricao" class="label-generic">Descricao:</label>
                            <textarea type="text" id="descricao" name="descricao" class="textarea-generic" required maxlength="560"></textarea>

                            <label for="resumo" class="label-generic">Resumo:</label>
                            <textarea type="text"  id="resumo" name="resumo" class="textarea-generic" required maxlength="255"></textarea>

                            <label for="idCategoria" class="label-generic">Categoria:</label>
                            <select type="text"  id="id_categoria" name="id_categoria" class="input-generic" required maxlength="255"><option>Selecione uma categoria:</option>

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

                            <div class="form-row">
                                <span>Cancelar</span>
                                <button type="submit" class="btn-generic margin-left-20px" name="btn-salvar" value="<?php echo($botao)?>">
                                    <span><?php echo ($botao)?></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <div class="generic-modal animate fadeIn" id="abrir">
        <article class="generic-modal-wrapper">

        </article>
    </div>
    <script src="../../assets/js/theme.js"></script>
    <script>
        $(document).ready(function(){
            $("#open-form").click(function () {
                $("#add-prato-form").slideToggle("fast");
            });
        });
    </script>
</body>
</html>
