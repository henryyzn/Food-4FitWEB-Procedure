<?php

    session_start();

    $id = null;
    $titulo = null;
    $texto = null;
    $foto = null;
    $ativo = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){

            require_once('../models/vantagem-comida-fitnessClass.php');
            require_once('../models/DAO/vantagem-comida-fitnessDAO.php');

            $vantagemComidaFitnessDAO = new vantagemComidaFitnessDAO;
            $id = $_GET['id'];
            $vantagemComidaFitnessDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('../models/vantagem-comida-fitnessClass.php');
            require_once('../models/DAO/vantagem-comida-fitnessDAO.php');

            $vantagemComidaFitnessDAO = new vantagemComidaFitnessDAO;
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            $listVantagemComidaFitness = $vantagemComidaFitnessDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listVantagemComidaFitness)>0)
            {

                $id = $listVantagemComidaFitness->id;
                $id_funcionario = $listVantagemComidaFitness->id_funcionario;
                $titulo = $listVantagemComidaFitness->titulo;
                $texto = $listVantagemComidaFitness->texto;
                $data = $listVantagemComidaFitness->data;
                $ativo = $listVantagemComidaFitness->ativo;

                $botao = "Editar";

            }
        }
    }
    if(isset($_GET['btn-salvar'])){

        require_once('../models/vantagem-comida-fitnessClass.php');
        require_once('../models/DAO/vantagem-comida-fitnessDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classVantagemComidaFitness = new VantagemComidaFitness();
        $classVantagemComidaFitness->id_funcionario = $_GET['id_funcionario'];
        $classVantagemComidaFitness->titulo = $_GET['titulo'];
        $classVantagemComidaFitness->texto = $_GET['texto'];
        $classVantagemComidaFitness->data = date('y/m/d');
        $classVantagemComidaFitness->ativo = "1";

        $vantagemComidaFitnessDAO = new vantagemComidaFitnessDAO();

       if($_GET['btn-salvar'] == "Salvar"){
           $vantagemComidaFitnessDAO->insert($classVantagemComidaFitness);
       }elseif($_GET['btn-salvar'] == "Editar"){
           $classVantagemComidaFitness->id = $_SESSION['id'];
           $vantagemComidaFitnessDAO->update($classVantagemComidaFitness);
       }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Publicação - Vantagens da Fitness :: Food 4fit - CMS</title>
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
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div class="add-pub-wrapper">
                    <div class="form-generic pub-add">
                        <h2 class="form-title">Adicionar Publicação - Vantagens da Comida Fitness</h2>
                        <form action="add-pub-vantagem-comida-fitness.php" method="GET" name="frmcadastro" class="form-generic-content">
                            <input type="hidden" name="id_funcionario" value="1">
                            <input type="hidden" name="ativo" value="1">

                            <label class="label-generic">Título:</label>
                            <input class="input-generic" type="text" name="titulo" id="titulo" value="<?php echo($titulo);?>">

                            <label class="label-generic">Texto:</label>
                            <textarea class="textarea-generic" type="text" name="texto" id="texto"><?php echo($texto);?></textarea>

                            <div class="form-row">
                                <span>Cancelar</span>
                                <button type="submit" value="<?php echo($botao)?>" name="btn-salvar" class="btn-generic margin-left-20px">
                                    <span>Salvar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <aside class="pub-side">
                        <h2>Ultimas Adicionadas</h2>
                        <?php
                            require_once("../../cms/models/DAO/vantagem-comida-fitnessDAO.php");

                            $vantagemComidaFitnessDAO = new vantagemComidaFitnessDAO();

                            $lista = $vantagemComidaFitnessDAO->selectAll();

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <div>
                            <h3><?php echo($lista[$i]->titulo)?></h3>
                            <p><?php echo($lista[$i]->id_funcionario)?></p>
                            <span><?php echo($lista[$i]->data)?></span>
                        </div>
                        <?php
                            }
                        ?>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
