<!DOCTYPE html>
<html lang="pt-br">
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
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <form id="form-content" class="display-none">
                    <div id="form-two-sides">
                        <div id="form-left-side" class="padding-left-20px padding-right-20px">
                            <div class="form-generic">
                                <div class="form-generic-content">
                                    <h2 class="form-title margin-top-20px">Cadastrar um Ingrediente</h2>
                                    <div class="form-row">
                                        <div class="form-column form-group-6">
                                            <label for="titulo" class="label-generic">Nome do Ingrediente:</label>
                                            <input id="titulo" name="titulo" class="input-generic" required placeholder="Digite um nome para o ingrediente...">
                                        </div>
                                        <div class="form-column form-group-6">
                                            <label for="preco" class="label-generic">Preço do Ingrediente:</label>
                                            <input id="preco" name="preco" class="input-generic" required placeholder="Digite um preço para o ingrediente...">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-column form-group-6">
                                            <label for="unidadeMedida" class="label-generic">Unidade de Medida:</label>
                                            <select id="unidadeMedida" name="unidadeMedida.id" class="input-generic" required>
                                                <option disabled selected value="">Selecione uma opção</option>
                                            </select>
                                        </div>
                                        <div class="form-column form-group-6">
                                            <label for="categoria" class="label-generic">Categoria:</label>
                                            <select id="categoria" name="categoria.id" class="input-generic" required>
                                                <option disabled selected value="">Selecione uma opção</option>
                                            </select>
                                        </div>
                                    </div>

                                    <label for="descricao" class="label-generic">Descrição do Ingrediente:</label>
                                    <textarea id="descricao" name="descricao" class="textarea-generic"></textarea>

                                    <h3>Informações Nutricionais</h3>
                                    <p class="description width-500px">Complete a tabela nutricional para completar a descrição do ingrediente e possibilitar a produção dos pratos com ele</p>

                                    <div class="form-row">
                                        <div class="form-column form-group-4">
                                            <label for="valorEnergetico" class="label-generic">Valor Energético:</label>
                                            <input id="valorEnergetico" name="valorEnergetico" class="input-generic" required placeholder="kcal=kj (quilos por caloria)">
                                        </div>
                                        <div class="form-column form-group-4">
                                            <label for="carboidratos" class="label-generic">Carboidratos:</label>
                                            <input id="carboidratos" name="carboidratos" class="input-generic" required placeholder="g (gramas)">
                                        </div>
                                        <div class="form-column form-group-4">
                                            <label for="proteinas" class="label-generic">Proteínas:</label>
                                            <input id="proteinas" name="proteinas" class="input-generic" required placeholder="g (gramas)">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-column form-group-4">
                                            <label for="gorduraTotal" class="label-generic">Gordura Total:</label>
                                            <input id="gorduraTotal" name="gorduraTotal" class="input-generic" required placeholder="g (gramas)">
                                        </div>
                                        <div class="form-column form-group-4">
                                            <label for="gorduraSaturada" class="label-generic">Gordura Saturada:</label>
                                            <input id="gorduraSaturada" name="gorduraSaturada" class="input-generic" required placeholder="g (gramas)">
                                        </div>
                                        <div class="form-column form-group-4">
                                            <label for="gorduraTrans" class="label-generic">Gordura Trans:</label>
                                            <input id="gorduraTrans" name="gorduraTrans" class="input-generic" required placeholder="g (gramas)">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-column form-group-4">
                                            <label for="fibraAlimentar" class="label-generic">Fibra Alimentar:</label>
                                            <input id="fibraAlimentar" name="fibraAlimentar" class="input-generic" required placeholder="g (gramas)">
                                        </div>
                                        <div class="form-column form-group-4">
                                            <label for="sodio" class="label-generic">Sódio:</label>
                                            <input id="sodio" name="sodio" class="input-generic" required placeholder="mg (miligramas)">
                                        </div>
                                        <div class="form-column form-group-4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="form-right-side">
                            <div class="padding-top-10px">
                                <img>
                                <label for="foto" class="file-label">Escolher Imagem</label>
                                <input id="foto" name="uploadData" type="file" accept="image/*">
                            </div>
                            <div>
                                <span class="status margin-bottom-10px">Status Inicial do Ingrediente:</span>
                                <div class="select-block">
                                    <div class="switch_box">
                                        <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                                    </div>
                                    <label for="ativo" class="padding-left-15px">Ativado/Desativado</label>
                                </div>
                                <div id="btn-save">
                                    <img src="../assets/images/cms/symbols/salvar.svg" alt="Salvar">
                                    <span>Salvar</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="display-none">
                </form>
                <div id="list-content">
                    <div id="page-actions">
                        <a href="#" id="btn-adicionar-ingrediente">
                            <img src="../../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                            <span>Adicionar Ingrediente</span>
                        </a>
                        <a href="#">
                            <img src="../../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                            <span>Recarregar Listagem</span>
                        </a>
                    </div>
                    <div id="tabela-items">
                        <div class="linha">
                            <div class="coluna image-small">Imagem</div>
                            <div class="coluna medium">Título</div>
                            <div class="coluna medium">Categoria</div>
                            <div class="coluna large">Descrição</div>
                            <div class="coluna medium">Preço</div>
                            <div class="coluna">Opções</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
