<!DOCTYPE html><html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
        <link rel="stylesheet" href="../../assets/css/cms/stylesheet-cms.css">
	    <link rel="stylesheet" href="../../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../../assets/css/font-style.css">
        <link rel="stylesheet" href="../../assets/css/bases.css">
        <link rel="stylesheet" href="../../assets/css/sizes.css">
        <link rel="stylesheet" href="../../assets/css/align.css">
        <link rel="stylesheet" href="../../assets/css/keyframes.css">
    </head>


         <section id="main">
            <?php require_once("./components/sidebar.php") ?>
            <div id="main-content">
            <?php require_once("components/navbar.php") ?>
                <div id="page-content">
                    <div id="tabs">
                        <span>Adicionar Bloco</span>
                        <span class="active">Listar Blocos</span>
                    </div>
                    <div id="tabs-content">

                        <div id="container-form">
                            <div class="form-generic">
                                <form id="form-sobre-nos" class="form-generic-content">
                                    <label for="titulo" class="label-generic">Título</label>
                                    <input id="titulo" name="titulo" class="input-generic" required maxlength="255">

                                    <label for="texto" class="label-generic">Texto</label>
                                    <textarea id="texto" name="texto" class="textarea-generic"></textarea>

                                    <span class="label-generic">Imagem</span>
                                    <div class="imagem-upload-wrapper">
                                    <div>
                                        <img alt="">
                                    </div>
                                    <label for="imagem" class="label-generic">Selecione um arquivo...</label>
                                     <input id="imagem" name="uploadData" type="file" accept="image/*">
                                    </div>

                                    <input type="submit" name="submit" class="display-none">
                                </form>


                                <div class="controls">
                                    <span class="cancel">Cancelar</span>
                                    <div class="btn-generic">
                                        <span>Enviar</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="active" id="container-listagem">
                            <div id="tabela-items">
                                <div class="linha">
                                    <div class="coluna image-large">Imagem</div>
                                    <div class="coluna middle-align medium">Título</div>
                                    <div class="coluna descricao large">Descrição</div>
                                    <div class="coluna">Opções</div>
                                </div>
                            </div>
                            <div>
                                <div class="linha">
                                    <div class="coluna image-large">

                                    </div>
                                <div class="coluna middle-align medium"><span></span></div>
                                <div class="coluna descricao large">
                                    <div>

                                    </div>
                                </div>
                                <div class="coluna">
                                    <span class="toggle ${checkBoolean(ativo) ? 'desativar' : 'ativar'}"></span><hr>
                                    <span class="editar"></span><hr>
                                    <span class="excluir"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("./components/modal.html") ?>
    </section>
</html>
