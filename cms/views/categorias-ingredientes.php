<?php
    session_start();
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
        <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases.css">
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

                    <div id="tabs-content">
                        <div id="container-form">
                            <div class="form-generic">
                                <form action="upload.php" method="POST" name="frmfoto" enctype="multipart/form-data" id="frmfoto">
                                    <span class="label-generic">Imagem:</span>
                                    <div id="view" class="register_product_image" style="width: 300px; height: 300px; background: #9CC283;">

                                    </div>

                                    <label for="fotos" class="label-generic fileimage">Selecione um arquivo...</label>
                                    <input type="file" name="fileimage" id="fotos" style="display: none;">
                                </form>
                                <form id="form-sobre-nos" class="form-generic-content" name="frmcadastro" method="GET" action="sobre.php">
                                    <input name="txtfoto" type="hidden">

                                    <label for="titulo" class="label-generic">Título</label>
                                    <input type="text" id="titulo" name="titulo"  required maxlength="255">

                                    <label for="texto" class="label-generic">Cetgoria</label>
                                    <input type="text" id="titulo" name="titulo"  required maxlength="255">

                                    <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                    <div class="select-block">
                                    <div class="switch_box">
                                        <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                                    </div>
                                    <label for="ativo" class="padding-left-15px">Ativado/Desativado</label>
                                </div>

                                    <input type="submit"  name="btn-salvar">
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

                                <tr>
                                    <td><img alt=""></td>
                                    <td><span class="table-result"></span></td>
                                    <td><span class="table-result"></span></td>
                                    <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>
                                    <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=editar&id='"></td>
                                    <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=excluir&id='"></td>
                                </tr>

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
