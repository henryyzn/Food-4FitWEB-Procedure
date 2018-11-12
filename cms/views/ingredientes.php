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
            require_once('../models/ingredientesClass.php');
            require_once('../models/DAO/ingredientesDAO.php');

            $ingredientesDAO = new ingredientesDAO;
            $id = $_GET['id'];

            $listIngredientes = $ingredientesDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listIngredientes)>0){
                $id = $listSobreNos->id;
                $id_categoria_ingrediente = $listSobreNos->id_categoria_ingrediente;
                $id_unidade_medida = $listSobreNos->id_unidade_medida;
                $titulo = $listSobreNos->titulo;
                $descricao = $listSobreNos->descricao;
                $preco = $listSobreNos->preco;
                $valor_energ = $listSobreNos->valor_energ;
                $carboidratos = $listSobreNos->carboidratos;
                $proteinas = $listSobreNos->proteinas;
                $gordura_total = $listSobreNos->gordura_total;
                $gordura_saturada = $listSobreNos->gordura_saturada;
                $gordura_trans = $listSobreNos->gordura_trans;
                $fibra_alimentar = $listSobreNos->fibra_alimentar;
                $sodio = $listSobreNos->sodio;
                $foto = $listSobreNos->foto;
                $ativo = $listSobreNos->ativo;

                $botao = "Editar";
            }
        }
    }

    if(isset($_GET['btn-salvar'])){

        require_once('../models/ingredientesClass.php');
        require_once('../models/DAO/ingredientesDAO.php');

        $classIngredientes = new Ingredientes();
        $classIngredientes->id_categoria_ingrediente = $_GET['id_categoria_ingrediente'];
        $classIngredientes->id_unidade_medida = $_GET['id_unidade_medida'];
        $classIngredientes->titulo = $_GET['titulo'];
        $classIngredientes->titulo = $_GET['descricao'];
        $classIngredientes->titulo = $_GET['preco'];
        $classIngredientes->titulo = $_GET['valor_energ'];
        $classIngredientes->titulo = $_GET['carboidratos'];
        $classIngredientes->titulo = $_GET['proteinas'];
        $classIngredientes->titulo = $_GET['gordura_total'];
        $classIngredientes->titulo = $_GET['gordura_saturada'];
        $classIngredientes->titulo = $_GET['gordura_trans'];
        $classIngredientes->titulo = $_GET['fibra_alimentar'];
        $classIngredientes->titulo = $_GET['sodio'];
        $classIngredientes->titulo = $_GET['foto'];
        $classIngredientes->titulo = $_GET['ativo'];

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
    <title>Food 4fit - CMS</title>
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
    <script src="../../assets/public/js/jquery.mask.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
    <script>
        $(document).ready(function() {
            $('#valor_energ').mask("#0000,00kj", {reverse: false});
        });
    </script>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div style="display: flex; width: 100%; height: auto;">
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

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <tr>
                            <td><span class="table-result"><img src="<?php echo($lista[$i]->foto)?>"></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->preco)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->descricao)?></span></td>
                            <td>
                                <div class="coluna">
                                    <img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="view margin-right-10px" onclick="">
                                    <img src="../../assets/images/cms/symbols/editar.svg" alt="" onclick="javascript:location.href='ingredientes.php?modo=editar&id=<?php echo($lista[$i]->id)?>'">
                                    <img src="../../assets/images/cms/symbols/excluir.svg" alt="" onclick="javascript:location.href='ingredientes.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'">
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <div id="form-right-side">
                        <form class="form-generic border-30px" action="ingredientes.php" method="GET">
                            <div class="form-generic-content">
                                <h2 class="form-title">Cadastrar um Ingrediente</h2>

                                <label for="titulo" class="label-generic">Nome do Ingrediente:</label>
                                <input id="titulo" name="titulo" class="input-generic" required placeholder="Digite um nome para o ingrediente...">

                                <label for="descricao" class="label-generic">Descrição do Ingrediente:</label>
                                <textarea id="descricao" name="descricao" class="textarea-generic"></textarea>

                                <label for="preco" class="label-generic">Preço do Ingrediente:</label>
                                <input id="preco" name="preco" class="input-generic" required placeholder="Digite um preço para o ingrediente...">

                                <label for="categoria" class="label-generic">Categoria:</label>
                                <select id="id_categoria_ingrediente" name="id_categoria_ingrediente" class="input-generic" required>
                                    <option selected>1</option>
                                </select>

                                <label for="unidadeMedida" class="label-generic">Unidade de Medida:</label>
                                <select id="id_unidade_medida" name="id_unidade_medida" class="input-generic" required>
                                    <option selected>1</option>
                                </select>

                                <h3 class="form-title">Informações Nutricionais</h3>
                                <p class="description margin-bottom-30px">Complete a tabela nutricional para completar a descrição do ingrediente e possibilitar a produção dos pratos com ele</p>

                                <label for="valor_energ" class="label-generic">Valor Energético:</label>
                                <input id="valor_energ" name="valor_energ" class="input-generic" required placeholder="kcal=kj (quilos por caloria)">

                                <label for="carboidratos" class="label-generic">Carboidratos:</label>
                                <input id="carboidratos" name="carboidratos" class="input-generic" required placeholder="g (gramas)">

                                <label for="proteinas" class="label-generic">Proteínas:</label>
                                <input id="proteinas" name="proteinas" class="input-generic" required placeholder="g (gramas)">

                                <label for="gordura_total" class="label-generic">Gordura Total:</label>
                                <input id="gordura_total" name="gordura_total" class="input-generic" required placeholder="g (gramas)">

                                <label for="gordura_saturada" class="label-generic">Gordura Saturada:</label>
                                <input id="gordura_saturada" name="gordura_saturada" class="input-generic" required placeholder="g (gramas)">

                                <label for="gordura_trans" class="label-generic">Gordura Trans:</label>
                                <input id="gordura_trans" name="gordura_trans" class="input-generic" required placeholder="g (gramas)">

                                <label for="fibra_alimentar" class="label-generic">Fibra Alimentar:</label>
                                <input id="fibra_alimentar" name="fibra_alimentar" class="input-generic" required placeholder="g (gramas)">

                                <label for="sodio" class="label-generic">Sódio:</label>
                                <input id="sodio" name="sodio" class="input-generic" required placeholder="mg (miligramas)">
                                <span class="status margin-bottom-10px">Status Inicial do Ingrediente:</span>
                                <div class="select-block">
                                    <div class="switch_box">
                                        <input type="checkbox" name="ativo" id="ativo" class="switch-styled" value="1">
                                        <label for="ativo" class="padding-left-15px">Ativado/Desativado</label>
                                    </div>
                                </div>
                                <button type="submit" id="btn-save" value="<?php echo($botao)?>" name="btn-save">
                                    <img src="../../assets/images/cms/symbols/salvar.svg" alt="Salvar">
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
