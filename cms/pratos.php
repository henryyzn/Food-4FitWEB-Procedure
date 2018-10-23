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
                    <form id="form-content" class="display-none" data-crud-form>
                        <div id="form-two-sides">
                            <div id="form-left-side" class="padding-left-20px padding-right-20px">
                                <div class="form-generic">
                                    <div class="form-generic-content">
                                        <h2 class="form-title margin-top-20px">Cadastrar um Prato</h2>
                                        <div class="form-column">
                                            <label for="titulo" class="label-generic">Nome do Prato:</label>
                                            <input id="titulo" name="titulo" class="input-generic" required placeholder="Digite um nome para o prato...">
                                        </div>
                                        <div class="form-column">
                                            <label for="categoria" class="label-generic">Categoria:</label>
                                            <select id="categoria" name="categoria.id" class="input-generic" required>
                                                <option disabled selected value="">Selecione uma opção</option>
                                                <?= $categorias ?>
                                            </select>
                                        </div>
                                        <div class="form-column">
                                            <label for="resumo" class="label-generic">Resumo do Prato:</label>
                                            <textarea id="resumo" name="resumo" class="textarea-generic" required placeholder="Digite um resumo para o prato..."></textarea>
                                        </div>
                                        <div class="form-column">
                                            <label for="descricao" class="label-generic">Descrição do Prato:</label>
                                            <textarea id="descricao" name="descricao" class="textarea-generic" required data-sceditor></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="form-right-side">
                                <div class="padding-top-10px">
                                    <div data-imagem-upload data-imagem-multi>
                                        <img>
                                        <div class="image-upload active" data-target="foto1">
                                            <label for="foto1" class="file-label">Escolher Imagem</label>
                                            <input id="foto1" name="uploadData.foto1" type="file" accept="image/*">
                                        </div>
                                        <div class="image-upload" data-target="foto2">
                                            <label for="foto2" class="file-label">Escolher Imagem</label>
                                            <input id="foto2" name="uploadData.foto2" type="file" accept="image/*">
                                        </div>
                                        <div class="image-upload" data-target="foto3">
                                            <label for="foto3" class="file-label">Escolher Imagem</label>
                                            <input id="foto3" name="uploadData.foto3" type="file" accept="image/*">
                                        </div>
                                        <div class="image-upload" data-target="foto4">
                                            <label for="foto4" class="file-label">Escolher Imagem</label>
                                            <input id="foto4" name="uploadData.foto4" type="file" accept="image/*">
                                        </div>
                                        <div class="thumbnails">
                                            <img data-bind="foto1" class="active">
                                            <img data-bind="foto2">
                                            <img data-bind="foto3">
                                            <img data-bind="foto4">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="preco-prato">
                                        <span>Preço Total: R$ 000,00</span>
                                    </div>
                                    <span class="status margin-bottom-10px">Status Inicial do Prato:</span>
                                    <div class="select-block">
                                        <div class="switch_box">
                                            <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                                        </div>
                                        <label for="ativo" class="padding-left-15px">Ativado/Desativado</label>
                                    </div>
                                    <div id="btn-save" data-form-submit>
                                        <img src="../assets/images/cms/symbols/salvar.svg" alt="Salvar">
                                        <span>Salvar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" name="submit" class="display-none">
                    </form>
                    <div id="list-content">
                        <div class="pratos-wrapper">
                             <div id="page-actions">
                                <a href="#" id="btn-adicionar-prato">
                                    <img src="../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                                    <span>Adicionar Prato</span>
                                </a>
                                <a href="#" data-list-reload>
                                    <img src="../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                                    <span>Recarregar Listagem</span>
                                </a>
                            </div>
                            <div class="generic-grid animate fadeInUp">
                                <?php
                                for($i=1; $i < 15; $i ++ ){


                                ?>
                                <div class="generic-card">
                                    <img src="../assets/images/dishs/img1.jpg" alt="Teste" class="generic-card-img">
                                    <div class="generic-card-ovy">
                                        <span class="card-dish-name margin-bottom-20px">Frango Com Batatas</span>
                                        <div class="card-dish-separator margin-bottom-15px"></div>
                                        <p class="categoria-prato margin-bottom-30px"><b>Categoria:</b> Alguma Coisa</p>


                                        <div class="edit-btns">
                                            <img src="../assets/images/icons/edit.svg" alt="Editar Prato">
                                            <img src="../assets/images/icons/delete-white.svg" alt="Excluir Prato">
                                            <img src="../assets/images/icons/checked-white.svg" alt="">
                                        </div>
                                        <div class="state-row padding-top-15px">
                                            <div class="switch_box margin-right-10px">
                                                <input type="checkbox" id="chkdish" name="chkdish" class="switch-styled" data-f4f-chk-reserve>
                                            </div>
                                            <label for="chkdish">Promoção</label>
                                        </div>
                                        <span class="avaliacoes-pratos">
                                            Ver Avaliações
                                        </span>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("./components/modal.html") ?>
        </section>
    </body>
</html>
