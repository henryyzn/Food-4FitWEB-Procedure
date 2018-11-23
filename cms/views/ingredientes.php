<?php
    session_start();

    $id = null;
    $id_categoria_ingrediente = null;
    $id_unidade_medida = null;
    $titulo = null;
    $descricao = null;
    $preco = null;
    $valor_energ = null;
    $carboidratos = null;
    $proteinas = null;
    $gordura_total = null;
    $gordura_saturada = null;
    $gordura_trans = null;
    $fibra_alimentar = null;
    $sodio = null;
    $foto = null;
    $ativo = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){

            require_once('../models/ingredientesClass.php');
            require_once('../models/DAO/ingredientesDAO.php');

            $ingredientesDAO = new ingredientesDAO;
            $id = $_GET['id'];
            $ingredientesDAO->delete($id);

        }else if($modo == 'editar'){

            //echo("<script>console.log('valido')</script>");
            require_once('../models/ingredientesClass.php');
            require_once('../models/DAO/ingredientesDAO.php');

            $ingredientesDAO = new ingredientesDAO;
            $id = $_GET['id'];

            $listIngredientes = $ingredientesDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listIngredientes)>0){
                $id = $listIngredientes->id;
                $id_categoria_ingrediente = $listIngredientes->id_categoria_ingrediente;
                $id_unidade_medida = $listIngredientes->id_unidade_medida;
                $titulo = $listIngredientes->titulo;
                $descricao = $listIngredientes->descricao;
                $preco = $listIngredientes->preco;
                $valor_energ = $listIngredientes->valor_energ;
                $carboidratos = $listIngredientes->carboidratos;
                $proteinas = $listIngredientes->proteinas;
                $gordura_total = $listIngredientes->gordura_total;
                $gordura_saturada = $listIngredientes->gordura_saturada;
                $gordura_trans = $listIngredientes->gordura_trans;
                $fibra_alimentar = $listIngredientes->fibra_alimentar;
                $sodio = $listIngredientes->sodio;
                $foto = $listIngredientes->foto;
                $ativo = $listIngredientes->ativo;

                $botao = "Editar";
            }
        }
    }

    if(isset($_GET['btn-salvar'])){
        //echo("<script>console.log('1');</script>");
        require_once('../models/ingredientesClass.php');
        require_once('../models/DAO/ingredientesDAO.php');

        $classIngredientes = new Ingredientes();
        $classIngredientes->id_categoria_ingrediente = $_GET['id_categoria_ingrediente'];
        $classIngredientes->id_unidade_medida = $_GET['id_unidade_medida'];
        $classIngredientes->titulo = $_GET['titulo'];
        $classIngredientes->descricao = $_GET['descricao'];
        $classIngredientes->preco = $_GET['preco'];
        $classIngredientes->valor_energ = $_GET['valor_energ'];
        $classIngredientes->carboidratos = $_GET['carboidratos'];
        $classIngredientes->proteinas = $_GET['proteinas'];
        $classIngredientes->gordura_total = $_GET['gordura_total'];
        $classIngredientes->gordura_saturada = $_GET['gordura_saturada'];
        $classIngredientes->gordura_trans = $_GET['gordura_trans'];
        $classIngredientes->fibra_alimentar = $_GET['fibra_alimentar'];
        $classIngredientes->sodio = $_GET['sodio'];
        $classIngredientes->foto = $_GET['txtfoto'];
        $classIngredientes->ativo = $_GET['ativo'];

        $ingredientesDAO = new ingredientesDAO();

       if($_GET['btn-salvar'] == "Salvar"){
           $ingredientesDAO->insert($classIngredientes);
       }elseif($_GET['btn-salvar'] == "Editar"){
           $classIngredientes->id = $_GET['id'];
           $ingredientesDAO->update($classIngredientes);
       }
    }
?>
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
            $('#valor_energ').mask("#0000.00", {reverse: true});
            $('#carboidratos').mask("#0000.00", {reverse: true});
            $('#proteinas').mask("#0000.00", {reverse: true});
            $('#gordura_total').mask("#0000.00", {reverse: true});
            $('#gordura_saturada').mask("#0000.00", {reverse: true});
            $('#gordura_trans').mask("#0000.00", {reverse: true});
            $('#fibra_alimentar').mask("#0000.00", {reverse: true});
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
                            <a href="pratos.php">
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
                            ?>
                            <tr>
                                <td><img src="../../<?php echo($lista[$i]->foto)?>" class="show-image"></td>
                                <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->preco)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->descricao)?></span></td>
                                <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='ingredientes.php?modo=<?php echo($active)?>&id=<?php echo($lista[$i]->id)?>'"></td>
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

                            <label for="titulo" class="label-generic">Nome do Ingrediente:</label>
                            <input id="titulo" name="titulo" class="input-generic" required placeholder="Digite um nome para o ingrediente..." value="<?php echo($titulo)?>">

                            <label for="descricao" class="label-generic">Descrição do Ingrediente:</label>
                            <textarea id="descricao" name="descricao" class="textarea-generic"><?php echo($descricao)?></textarea>

                            <label for="preco" class="label-generic">Preço do Ingrediente:</label>
                            <input id="preco" name="preco" class="input-generic" required placeholder="Digite um preço para o ingrediente..." value="<?php echo($preco)?>">

                            <label for="categoria" class="label-generic">Categoria:</label>
                            <select id="id_categoria_ingrediente" name="id_categoria_ingrediente" class="input-generic" required>
                                <option selected>Selecione uma opção:</option>
                                <?php
                                    require_once("../models/DAO/categorias-ingredientesDAO.php");

                                    $catIngredienteDAO = new catIngredienteDAO();

                                    $lista = $catIngredienteDAO->selectAll();

                                    for($i = 0; $i < @count($lista); $i++){
                                ?>
                                <option value="<?php echo($lista[$i]->id)?>"><?php echo($lista[$i]->titulo)?></option>
                                <?php
                                    }
                                ?>
                            </select>

                            <label for="unidadeMedida" class="label-generic">Unidade de Medida:</label>
                            <select id="id_unidade_medida" name="id_unidade_medida" class="input-generic" required>
                                <option selected>Selecione uma opção:</option>
                                <?php
                                    require_once("../models/DAO/unidade-medidaDAO.php");

                                    $unidadeMedidaDAO = new unidadeMedidaDAO();

                                    $lista = $unidadeMedidaDAO->selectAll();

                                    for($i = 0; $i < count($lista); $i++){
                                ?>
                                <option value="<?php echo($lista[$i]->id)?>"><strong>(<?php echo($lista[$i]->sigla)?>)</strong> <?php echo($lista[$i]->unid_medida)?></option>
                                <?php
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

                            <div class="select-block">
                                <label for="ativo" class="label-generic">Status Inicial do Ingrediente:</label>
                                <div class="switch_box margin-left-10px">
                                    <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                                </div>
                            </div>
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
    <script src="../../assets/js/theme.js"></script>
    <script>
        $(document).ready(function(){
            $("#open-form").click(function () {
                $("#add-prato-form").slideToggle("fast");
            });
        });
    </script>
</body>
</html>
