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

            require_once('../models/sliderClass.php');
            require_once('../models/DAO/sliderDAO.php');

            $sliderDAO = new sliderDAO;
            $id = $_GET['id'];
            $sliderDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('../models/sliderClass.php');
            require_once('../models/DAO/sliderDAO.php');

            $sliderDAO = new sliderDAO;
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            $listSlider = $sliderDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listSlider)>0)
            {

                $id = $listSlider->id;
                $imagem = $listSlider->imagem;
                $ativo = $listSlider->ativo;

                $botao = "Editar";

            }
        }
    }
    if(isset($_GET['btn-salvar'])){

        require_once('../models/sliderClass.php');
        require_once('../models/DAO/sliderDAO.php');

        $classSlider = new Slider();
        $classSlider->imagem = $_GET['txtfoto'];
        $classSlider->ativo = $_GET['ativo'];

        $sliderDAO = new sliderDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $sliderDAO->insert($classSlider);
           }elseif($_GET['btn-salvar'] == "Editar"){
               $classSlider->id = $_SESSION['id'];
               $sliderDAO->update($classSlider);
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
        <script src="../../assets/public/js/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                $('#fotos').on('change', function(){

                    $('#frmfoto').ajaxForm({
                        target:'#view'
                    }).submit();
                });
            });
        </script>
    </head>
         <section id="main">
            <?php require_once("../components/sidebar.php") ?>
            <div id="main-content">
            <?php require_once("../components/navbar.php") ?>
                <div id="page-content">
                    <div id="tabs">
                        <span>Adicionar Bloco</span>
                        <span class="active">Listar Blocos</span>
                    </div>
                    <div id="tabs-content">
                        <div id="container-form">
                            <div class="form-generic">
                                <form action="upload/upload-slider.php" method="POST" name="frmfoto" enctype="multipart/form-data" id="frmfoto">
                                    <span class="label-generic">Imagem:</span>
                                    <div id="view" class="register_product_image" style="width: 300px; height: 300px; background: #9CC283;">
                                        <img src='../../<?php echo($foto);?>' alt="">
                                    </div>

                                    <label for="fotos" class="label-generic fileimage">Selecione um arquivo...</label>
                                    <input type="file" name="fileimage" id="fotos" style="display: none;">
                                </form>
                                <form id="form-sobre-nos" class="form-generic-content" name="frmcadastro" method="GET" action="slider.php">
                                   <input name="txtfoto" type="hidden" value="<?php echo($foto)?>">

                                    <label for="ativo" class="label-generic">Ativação</label>
                                    <div style="display: flex;">
                                        <input type="radio" id="ativo" name="ativo" value="1" class="" required><label for="ativo" class="label-generic">Ativado</label>
                                        <input type="radio" id="ativo" name="ativo" value="0" class="" required><label for="ativo" class="label-generic">Desativado</label>
                                    </div>

                                    <input type="submit" value="<?php echo($botao)?>" name="btn-salvar">
                                </form>
                            </div>
                        </div>
                        <div class="active" id="container-listagem">
                            <table class="generic-table">
                                <tr>
                                    <td><span>Imagem</span></td>
                                    <td><span>Ativo</span></td>
                                    <td colspan="3"><span>Opções</span></td>
                                </tr>
                                <?php
                                    require_once("../models/DAO/sliderDAO.php");

                                    //INSTANCIA DA CLASSE
                                    $sliderDAO = new sliderDAO();
                                    $ativo = null;
                                    //Chamar o método
                                    $lista = $sliderDAO->selectAll();

                                    //count -> comando que conta quantos itens tem o objeto
                                    for($i = 0; $i < count($lista); $i++){
                                        $ativo = $lista[$i]->imagem;
                                        if($ativo == 1){
                                            $ativo = "checked";
                                        }else{
                                            $ativo = null;
                                        }
                                ?>
                                <tr>
                                    <td><img src="../../<?php echo($lista[$i]->imagem)?>" alt=""></td>
                                    <td><input type="radio" name="ativo" <?php echo($ativo)?>></td>
                                    <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>
                                    <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='slider.php?modo=editar&id=<?php echo($lista[$i]->id)?>'"></td>
                                    <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='slider.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
