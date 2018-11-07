<?php

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

<!DOCTYPE html><html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
        <link rel="stylesheet" id="themeStyle" href="../../assets/css/cms/stylesheet-cms.css">
        <link rel="stylesheet" id="themeBases" href="../../assets/css/bases-light.css">
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

    </head>
    <body>
        <section id="main">
            <?php require_once("../components/sidebar.php") ?>
            <div id="main-content">
                <?php require_once("../components/navbar.php")?>
                <div id="page-content">
                    <div id="form-two-sides">
                        <div id="form-left-side" class="no-padding">
                            <div id="tabela-items">
                                <div class="linha">
                                    <div class="coluna full padding-left-15px">Categorias de Prato</div>
                                </div>
                            </div>
                            <div>
                                <div class="linha">
                                    <div class="coluna image-small">

                                    </div>
                                    <div class="coluna middle-left-align"><span></span></div>
                                    <div class="coluna">
                                        <span class="toggle ${checkBoolean(ativo) ? 'desativar' : 'ativar'}"></span><hr>
                                        <span class="editar"></span><hr>
                                        <span class="excluir"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

<!--
                        <form action="upload/upload-categoria-prato.php" method="post" name="frmfoto" id="frmfoto" enctype="multipart/form-data">

                             <label for="foto" class="file-label">Escolher Imagem</label>
                                    <input id="foto" name="fileimage" type="file" accept="image/*">

                        </form>

                        <div id="visualizar" style="width:300px; height:300px;border:solid;margin-left:-200px; ">

                        </div>
-->

                        <form  action="categorias-prato.php" method="post" name="frmcadastro" id="form-right-side" class="form-generic">
                            <div class="form-generic-content">
                                <h2 class="form-title margin-left-20px margin-top-20px">Cadastrar uma Categoria</h2>

                            <div>
                                <img>
                                <label for="foto" class="file-label">Escolher Imagem</label>
                                <input type="text" name="txtfoto">

                            </div>

                                <div class="margin-right-20px margin-left-20px margin-top-30px">
                                    <label for="titulo" class="label-generic">Nome</label>
                                    <input id="titulo" name="titulo" class="input-generic" required placeholder="Ex: Saladas">
                                </div>
                                <div class="margin-right-20px margin-left-20px margin-top-30px">
                                    <label for="titulo" class="label-generic">Categoria Pai</label>
                                    <select id="parent" name="parent" class="input-generic">
                                        <option value="" selected>Nenhuma categoria</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <span class="status margin-bottom-10px">Status Inicial desta Categoria:</span>
                                <div class="select-block">
                                    <div class="switch_box">
                                        <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                                    </div>
                                    <label for="ativo" class="padding-left-15px">Ativado/Desativado</label>
                                </div>
                               <div id="btn-save">
                                <img src="../../assets/images/cms/symbols/salvar.svg" alt="Salvar">
                                <span>Salvar</span>

<!--                                <input type="submit" value="<?php echo($botao)?>" name="btn-salvar">-->
                            </div>
                            </div>
                            <input type="submit" class="display-none">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="../../assets/js/theme.js"></script>
    </body>
</html>
