<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingredientes :: Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/public/js/jquery.mask.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/public/js/jquery.form.js"></script>
    <script>
        $(document).ready(function() {
            $('#preco').mask('000.000.000.000.00', {reverse: true});
            $('#valor_energ').mask("#000.0", {reverse: true});
            $('#carboidratos').mask("#000.0", {reverse: true});
            $('#proteinas').mask("#000.0", {reverse: true});
            $('#gordura_total').mask("#000.0", {reverse: true});
            $('#gordura_saturada').mask("#000.0", {reverse: true});
            $('#gordura_trans').mask("#000.0", {reverse: true});
            $('#fibra_alimentar').mask("#000.0", {reverse: true});
            $('#sodio').mask("#0000.00", {reverse: true});

            $('#fotos').on('change', function(){
                $('#frmfoto').ajaxForm({
                    target:'#view'
                }).submit();
            });
        });
    </script>
    <style>
        .image-view{
            width: 300px; height: auto; display: block;
        }
        .select-block{
            display: flex;
            align-items: center;
        }
    </style>
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
                                <span>Adicionar Ingrediente</span>
                            </div>
                            <a href="ingredientes.php">
                                <img src="../../assets/images/cms/symbols/recarregar.svg" alt="Recarregar">
                                <span>Recarregar Listagem</span>
                            </a>
                        </div>
                        <table class="generic-table">
                            <tr>
                                <td><span>Imagem:</span></td>
                                <td><span>Título:</span></td>
                                <td><span>Preço:</span></td>
                                <td><span>Descrição:</span></td>
                                <td colspan="3"><span>Opções:</span></td>
                            </tr>
                            <?php
                                require_once("../models/DAO/ingredientesDAO.php");

                                $ingredientesDAO = new ingredientesDAO();

                                $lista = $ingredientesDAO->selectAll();

                                for($i = 0; $i < @count($lista); $i++){
                                    $status = $lista[$i]->ativo;
                                    if($status == 1)
                                        $status = 'desativar';
                                    else
                                        $status = 'ativar';
                            ?>
                            <tr>
                                <td><img src="../../<?php echo($lista[$i]->foto)?>" class="show-image"></td>
                                <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->preco)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->descricao)?></span></td>
                                <td><img src="../../assets/images/cms/symbols/<?php echo($status)?>.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='ingredientes.php?modo=<?php echo($status)?>&id=<?php echo($lista[$i]->id)?>'"></td>
                                <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='ingredientes.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                                <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='ingredientes.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
                <aside class="explanation-aside hide" id="add-prato-form">
                    <div class="form-generic border-30px">
                        <form action="upload/upload-ingrediente.php" method="POST" name="frmfoto" enctype="multipart/form-data" class="form-generic-content" id="frmfoto">
                            <h2 class="form-title">Cadastrar um Ingrediente</h2>

                            <label class="label-generic">Imagem:</label>
                            <div id="view" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                <img src='../../assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                            </div>
                            <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                            <input type="file" name="fileimage" id="fotos" style="display: none;">
                        </form>
                        <form class="form-generic-content padding-top-30px" action="ingredientes.php" name="frmcadastro" method="GET">
                            <input name="txtfoto" type="hidden" value="<?php echo($foto)?>">
                            <input name="id" type="hidden" value="<?php echo($id)?>">
                            <input type="hidden" name="editar" id="editar" value="<?php echo($edit)?>">

                            <label for="titulo" class="label-generic">Nome do Ingrediente:</label>
                            <input id="titulo" name="titulo" class="input-generic" required placeholder="Digite um nome para o ingrediente..." value="<?php echo($titulo)?>">

                            <label for="descricao" class="label-generic">Descrição do Ingrediente:</label>
                            <textarea id="descricao" name="descricao" class="textarea-generic"><?php echo($descricao)?></textarea>

                            <label for="preco" class="label-generic">Preço do Ingrediente:</label>
                            <input id="preco" name="preco" class="input-generic" required placeholder="Digite um preço para o ingrediente..." value="<?php echo($preco)?>">

                            <label for="categoria" class="label-generic">Categoria:</label>
                            <select id="id_categoria_ingrediente" name="id_categoria_ingrediente" class="input-generic" required>
                                <option selected value="<?php echo($id_categoria_ingrediente)?>"><?php echo($titulo_cat_ing)?></option>
                                <?php
                                    require_once("../models/DAO/categorias-ingredientesDAO.php");

                                    $catIngredienteDAO = new catIngredienteDAO();

                                    $lista = $catIngredienteDAO->selectAll();

                                    for($i = 0; $i < @count($lista); $i++){
                                        echo("<option value='".$lista[$i]->id."'>".$lista[$i]->titulo."</option>");
                                    }
                                ?>
                            </select>

                            <label for="unidadeMedida" class="label-generic">Unidade de Medida:</label>
                            <select id="id_unidade_medida" name="id_unidade_medida" class="input-generic" required>
                                <option selected value="<?php echo($id_unidade_medida)?>">(<?php echo($sigla_unidade_medida)?>) <?php echo($unidade_medida)?></option>
                                <?php
                                    require_once("../models/DAO/unidade-medidaDAO.php");

                                    $unidadeMedidaDAO = new unidadeMedidaDAO();

                                    $lista = $unidadeMedidaDAO->selectAll();


                                    for($i = 0; $i < @count($lista); $i++){
                                        echo("<option value='".$lista[$i]->id."'>(".$lista[$i]->sigla.") ".$lista[$i]->unid_medida."</option>");
                                    }
                                ?>
                            </select>

                            <h3 class="form-title">Informações Nutricionais</h3>
                            <p class="description margin-bottom-30px">Complete a tabela nutricional para completar a descrição do ingrediente e possibilitar a produção dos pratos com ele</p>

                            <label for="valor_energ" class="label-generic">Valor Energético:</label>
                            <input id="valor_energ" name="valor_energ" class="input-generic" required placeholder="kcal=kj (quilos por caloria)" value="<?php echo($valor_energ)?>">

                            <label for="carboidratos" class="label-generic">Carboidratos:</label>
                            <input id="carboidratos" name="carboidratos" class="input-generic" required placeholder="g (gramas)" value="<?php echo($carboidratos)?>">

                            <label for="proteinas" class="label-generic">Proteínas:</label>
                            <input id="proteinas" name="proteinas" class="input-generic" required placeholder="g (gramas)" value="<?php echo($proteinas)?>">

                            <label for="gordura_total" class="label-generic">Gordura Total:</label>
                            <input id="gordura_total" name="gordura_total" class="input-generic" required placeholder="g (gramas)" value="<?php echo($gordura_total)?>">

                            <label for="gordura_saturada" class="label-generic">Gordura Saturada:</label>
                            <input id="gordura_saturada" name="gordura_saturada" class="input-generic" required placeholder="g (gramas)" value="<?php echo($gordura_saturada)?>">

                            <label for="gordura_trans" class="label-generic">Gordura Trans:</label>
                            <input id="gordura_trans" name="gordura_trans" class="input-generic" required placeholder="g (gramas)" value="<?php echo($gordura_trans)?>">

                            <label for="fibra_alimentar" class="label-generic">Fibra Alimentar:</label>
                            <input id="fibra_alimentar" name="fibra_alimentar" class="input-generic" required placeholder="g (gramas)" value="<?php echo($fibra_alimentar)?>">

                            <label for="sodio" class="label-generic">Sódio:</label>
                            <input id="sodio" name="sodio" class="input-generic" required placeholder="mg (miligramas)" value="<?php echo($sodio)?>">

                            <button type="submit" id="btn-save" value="<?php echo($botao)?>" name="btn-salvar">
                                <img src="../../assets/images/cms/symbols/salvar.svg" alt="Salvar">
                                <span>Salvar</span>
                            </button>
                        </form>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</body>
</html>
