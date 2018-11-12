<?php
    session_start();
    $botao = "Salvar";

    if(isset($_GET['btn-salvar'])){
        require_once('../models/categorias-pratoClass.php');
        require_once('../models/DAO/categorias-pratoDAO.php');

        $classCatPrato = new categoriaPrato();
        $classCatPrato->titulo = $_GET['titulo'];
        $classCatPrato->foto = $_GET['txtfoto'];

        $cadPratoDAO = new cadPratoDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $cadPratoDAO->insert($classCatPrato);

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
    <script src="../../assets/js/jquery.form.js"></script>
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
                            <td><span>ID:</span></td>
                            <td><span>Foto:</span></td>
                            <td><span>Título:</span></td>
                            <td colspan="3"><span>Opções:</span></td>
                        </tr>
                        <?php
                            require_once("../models/DAO/categorias-pratoDAO.php");

                            $catPratoDAO = new catPratoDAO();

                            $lista = $catPratoDAO->selectAll();

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <tr>
                            <td><span class="table-result"><?php echo($lista[$i]->id)?></span></td>
                            <td><img src="../../<?php echo($lista[$i]->foto)?>" alt="" class="table-image-result"></td>
                            <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                            <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>
                            <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categorias-prato.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='categorias-prato.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <div class="categoria-form-right">
                        <div class="form-generic border-30px">
                            <form action="upload/upload-slider.php" method="POST" name="frmfoto" enctype="multipart/form-data" class="form-generic-content" id="frmfoto">
                                <label class="label-generic">Imagem:</label>
                                <div id="view" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                    <img src='../../assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                                </div>
                                <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                                <input type="file" name="fileimage" id="fotos" style="display: none;">
                            </form>
                            <form id="form-sobre-nos" class="form-generic-content" name="frmcadastro" method="GET" action="slider.php">
                                <input name="txtfoto" type="hidden" value="<?php echo($foto)?>">

                                <label for="ativo" class="label-generic margin-top-30px margin-bottom-10px">Ativação</label>
                                <div style="display: flex;">
                                    <input type="radio" id="ativo" name="ativo" value="1" checked required><label for="ativo" class="label-generic">Ativado</label>
                                    <input type="radio" id="ativo" name="ativo" value="0" class="margin-left-10px" required><label for="ativo" class="label-generic">Desativado</label>
                                </div>

                                <div class="form-row">
                                    <span>Cancelar</span>
                                    <button type="submit" value="<?php echo($botao)?>" name="btn-salvar" class="margin-left-20px btn-generic">
                                        <span>Salvar</span>
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
