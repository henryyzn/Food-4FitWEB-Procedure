<!DOCTYPE html><html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/bases.css">
        <link rel="stylesheet" href="../assets/css/sizes.css">
        <link rel="stylesheet" href="../assets/css/align.css">
        <link rel="stylesheet" href="../assets/css/keyframes.css">
    </head>
    <body>
        <section id="main">
            <?php require_once("./components/sidebar.php") ?>
            <div id="main-content">
                <?php require_once("./components/navbar.php")?>
                <div id="page-content">
                    <span data-page-controller="VantagemComidaFitnessController" data-page-title="Vantagens da Comida Fitness" data-menu-link="fit-session"></span>

                    <div class="saude-wrapper">
                        <div class="saude-content" id="vantagens-lista">
                            <div id="page-actions">
                                <a href="#" id="btn-adicionar-publicacao">
                                    <img src="../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                                    <span>Adicionar Publicação</span>
                                </a>
                            </div>
                            <div id="tabela-items" data-crud-list>
                                <div class="linha">
                                    <div class="coluna large">Título</div>
                                    <div class="coluna medium">Autor</div>
                                    <div class="coluna medium">Dt. Pub</div>
                                    <div class="coluna">Opções</div>
                                </div>
                            </div>
                            <div data-crud-template>
                                <div class="linha height-100" data-param-id="${id}">
                                    <div class="coluna large">${titulo}</div>
                                    <div class="coluna medium">${autor}</div>
                                    <div class="coluna medium">${data}</div>
                                    <div class="coluna">
                                        <span class="toggle ${checkBoolean(ativo) ? 'desativar' : 'ativar'}"></span><hr>
                                        <span class="editar"></span><hr>
                                        <span class="excluir"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="saude-content form-generic display-none" id="vantagens-form">
                            <h2 class="padding-top-30px padding-bottom-30px">VANTAGENS DA COMIDA FITNESS - PUBLICAÇÕES</h2>
                            <form action="#" class="form-generic-content padding-left-15px padding-right-15px padding-bottom-15px padding-top-15px" data-crud-form>
                                <div class="form-column">
                                    <label for="titulo" class="label-generic">Título:</label>
                                    <input type="text" name="titulo" id="titulo" class="input-generic">
                                </div>
                                <label for="chkdish">Status:</label>
                                <div class="switch_box margin-bottom-15px">
                                    <input type="checkbox" name="ativo" value="1" class="switch-styled">
                                </div>
                                <div class="form-column">
                                    <label for="texto">Texto:</label>
                                    <textarea name="texto" id="texto" class="textarea-generic height-800px" data-sceditor></textarea>
                                </div>
                                <div class="form-row">
                                    <span class="margin-right-20px" data-form-cancel>Cancelar</span>
                                    <div class="btn-generic margin-right-30px" data-form-submit>
                                        <span>Salvar</span>
                                    </div>
                                </div>

                                <input type="submit" name="submit" class="display-none">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("./components/modal.html") ?>
        </section>
    </body>
</html>
