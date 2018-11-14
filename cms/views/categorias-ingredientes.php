<?php
    session_start();
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
    <script src="../../assets/public/js/jquery.form.js"></script>
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
                        <tr>
                            <td><img alt=""></td>
                            <td><span class="table-result"></span></td>
                            <td><span class="table-result"></span></td>
                            <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>
                            <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=editar&id='"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=excluir&id='"></td>
                        </tr>
                    </table>
                    <div class="categoria-form-right">
                        <div class="form-generic border-30px">
                            <form action="upload/upload-categoria.php" method="POST" name="frmfoto" id="frmfoto" class="form-generic-content" enctype="multipart/form-data">
                                <label class="label-generic">Imagem:</label>
                                <div id="visualizar" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                    <img src='../../assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                                </div>
                                <label for="foto" class="file-generic fileimage">Selecione um arquivo...</label>
                                <input type="file" name="fileimage" id="foto" style="display: none;">
                            </form>
                            <form id="form-categoria" class="form-generic-content margin-top-30px" name="frmcategoria" method="GET" action="categoria.php">
                                <input name="foto" type="hidden" value="">

                                <label for="titulo" class="label-generic">Título Categoria Pai</label>
                                <input type="text" value="<?= @$titulo ?>" id="titulo" name="titulo" class="input-generic" required maxlength="255">

                                <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                <div class="form-row">
                                    <span>Cancelar</span>
                                    <button type="submit" class="btn-generic margin-left-20px" name="btn-salvar" value="<?php echo($botao)?>">
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
