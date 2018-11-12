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

            require_once('../models/por-que-comida-fitnessClass.php');
            require_once('../models/DAO/por-que-comida-fitnessDAO.php');

            $porQueComidaFitnessDAO = new porQueComidaFitnessDAO;
            $id = $_GET['id'];
            $porQueComidaFitnessDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('../models/por-que-comida-fitnessClass.php');
            require_once('../models/DAO/por-que-comida-fitnessDAO.php');

            $porQueComidaFitnessDAO = new porQueComidaFitnessDAO;
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            $listPqComidaFitness = $porQueComidaFitnessDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listPqComidaFitness)>0)
            {

                $id = $listPqComidaFitness->id;
                $id_funcionario = $listPqComidaFitness->id_funcionario;
                $titulo = $listPqComidaFitness->titulo;
                $texto = $listPqComidaFitness->texto;
                $data = $listPqComidaFitness->data;
                $ativo = $listPqComidaFitness->ativo;

                $botao = "Editar";

            }
        }
    }
    if(isset($_GET['btn-salvar'])){

        require_once('../models/por-que-comida-fitnessClass.php');
        require_once('../models/DAO/por-que-comida-fitnessDAO.php');

        date_default_timezone_set("America/Sao_Paulo");

        $classPqComidaFitness = new PorQueComidaFitness();
        $classPqComidaFitness->id_funcionario = $_GET['id_funcionario'];
        $classPqComidaFitness->titulo = $_GET['titulo'];
        $classPqComidaFitness->texto = $_GET['texto'];
        $classPqComidaFitness->data = date('y/m/d');
        $classPqComidaFitness->ativo = "1";

        $porQueComidaFitnessDAO = new porQueComidaFitnessDAO();

       if($_GET['btn-salvar'] == "Salvar"){
           $porQueComidaFitnessDAO->insert($classPqComidaFitness);
       }elseif($_GET['btn-salvar'] == "Editar"){
           $classPqComidaFitness->id = $_SESSION['id'];
           $porQueComidaFitnessDAO->update($classPqComidaFitness);
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
                        <h2 class="form-title">Adicionar Publicação - Por Que a Comida Fitness</h2>
                        <form action="add-pub-por-que-comida-fitness.php" method="GET" name="frmcadastro" class="form-generic-content">
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
                            require_once("../../cms/models/DAO/por-que-comida-fitnessDAO.php");

                            $porQueComidaFitnessDAO = new porQueComidaFitnessDAO();

                            $lista = $porQueComidaFitnessDAO->selectAll();

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
