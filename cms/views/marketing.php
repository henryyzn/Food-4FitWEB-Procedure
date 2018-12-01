<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing p/ E-Mail :: Food 4Fit - CMS</title>
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
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div class="add-pub-wrapper">
                    <div class="form-generic pub-add">
                        <h2 class="form-title">Enviar E-Mail</h2>
                        <form action="marketing.php" method="GET" name="frmmarketing" class="form-generic-content">
                            <label class="label-generic" for="idade">Idade:</label>
                            <select class="input-generic" type="text" name="idade" id="idade">
                                <option selected>Selecione uma opção:</option>
                            </select>

                            <label class="label-generic" for="tipo_pessoa">Tipo de Pessoa:</label>
                            <select class="input-generic" type="text" name="tipo_pessoa" id="tipo_pessoa">
                                <option selected>Selecione uma opção:</option>
                            </select>

                            <label class="label-generic" for="email">E-Mail:</label>
                            <select class="input-generic" type="text" name="email" id="email">
                                <option selected>Selecione uma opção:</option>
                            </select>

                            <label class="label-generic" for="propaganda">Propaganda:</label>
                            <select class="input-generic" type="text" name="propaganda" id="propaganda">
                                <option selected>Selecione uma opção:</option>
                            </select>
                        </form>
                        <form action="upload/upload-foto-marketing.php" method="POST" name="frmfoto" id="frmfoto" class="form-generic-content" enctype="multipart/form-data">
                            <label class="label-generic">Imagem:</label>
                            <div id="visualizar" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                <img src='../../<?php echo($foto)?>' alt="Imagem a ser cadastrada" class="image-view">
                            </div>
                            <label for="foto" class="file-generic fileimage">Selecione um arquivo...</label>
                            <input type="file" name="fileimage" id="foto" style="display: none;">

                            <div class="form-row">
                                <span>Cancelar</span>
                                <button type="submit" value="<?php echo($botao)?>" name="btn-salvar" class="btn-generic margin-left-20px">
                                    <span>Salvar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
