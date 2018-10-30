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

            require_once('../models/sobreClass.php');
            require_once('../models/DAO/sobreDAO.php');

            $sobreDAO = new sobreDAO;
            $id = $_GET['id'];
            $sobreDAO->delete($id);

        }else if($modo == 'editar'){
//            require_once('cms/models/enderecoClass.php');
//            require_once('cms/models/DAO/enderecoDAO.php');
//
//            $enderecoDAO = new enderecoDAO;
//            session_start();
//            $id = $_GET['id'];
//            $_SESSION['id'] = $id;
//
//            $listUserEndereco = $enderecoDAO->selectId($id);
//
//            //Resgatando do Banco de dados
//            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
//            if(count($listUserEndereco)>0)
//            {
//
//                $id = $listUserEndereco->id;
//                $logradouro = $listUserEndereco->logradouro;
//                $numero = $listUserEndereco->numero;
//                $bairro = $listUserEndereco->bairro;
//                $cep = $listUserEndereco->cep;
//                $complemento = $listUserEndereco->complemento;
//
//                $botao = "Editar";
//
//            }
        }
    }
    if(isset($_GET['btn-salvar'])){

        require_once('../models/sobreClass.php');
        require_once('../models/DAO/sobreDAO.php');

        $classSobreNos = new Sobre();
        $classSobreNos->titulo = $_GET['titulo'];
        $classSobreNos->texto = $_GET['texto'];
        $classSobreNos->foto = $_GET['uploadData'];
        $classSobreNos->ativo = "1";

        $sobreDAO = new sobreDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $sobreDAO->insert($classSobreNos);
           }else{
               $classSobreNos->id = $_SESSION['id'];

               $sobreDAO->update($classSobreNos);
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
        <link rel="stylesheet" href="../../assets/css/cms/stylesheet-cms.css">
	    <link rel="stylesheet" href="../../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../../assets/css/font-style.css">
        <link rel="stylesheet" href="../../assets/css/bases.css">
        <link rel="stylesheet" href="../../assets/css/sizes.css">
        <link rel="stylesheet" href="../../assets/css/align.css">
        <link rel="stylesheet" href="../../assets/css/keyframes.css">
        <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
        <script src="../../assets/public/js/jquery.form.js"></script>
        <script>
            $(document).ready(function(){
                $('#fotos').on('change', function(){
                    $('#frmfoto').ajaxForm(function(){
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
                                <form action="upload.php" method="GET" name="frmfoto" enctype="multipart/form-data" id="frmfoto">
                                    <span class="label-generic">Imagem:</span>
                                    <figure id="view" class="register_product_image"></figure>

                                    <label for="fotos" class="label-generic fileimage">Selecione um arquivo...</label>
                                    <input type="file" name="fileimage" id="fotos" style="display: none;">
                                </form>
                                <form id="form-sobre-nos" class="form-generic-content" name="frmcadastro" method="GET" action="sobre.php">
                                    <input name="txtfoto" type="hidden">

                                    <label for="titulo" class="label-generic">Título</label>
                                    <input type="text" id="titulo" name="titulo" class="input-generic" required maxlength="255">

                                    <label for="texto" class="label-generic">Texto</label>
                                    <textarea id="texto" type="text" name="texto" class="textarea-generic"></textarea>

                                    <input id="ativo" name="ativo" class="input-generic" type="hidden" value="1" required maxlength="255">

                                    <input type="submit" value="Salvar" name="btn-salvar">
                                </form>
                            </div>
                        </div>
                        <div class="active" id="container-listagem">
                            <table class="generic-table">
                                <tr>
                                    <td><span>Título</span></td>
                                    <td><span>Autor</span></td>
                                    <td><span>Dt. Pub</span></td>
                                    <td colspan="3"><span>Opções</span></td>
                                </tr>
                                <?php
                                    require_once("../models/DAO/sobreDAO.php");

                                    //INSTANCIA DA CLASSE
                                    $sobreDAO = new sobreDAO();

                                    //Chamar o método
                                    $lista = $sobreDAO->selectAll();

                                    //count -> comando que conta quantos itens tem o objeto
                                    for($i = 0; $i < count($lista); $i++){
                                ?>
                                <tr>
                                    <td><img src="../<?php echo($lista[$i]->foto)?>" alt=""></td>
                                    <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                                    <td><span class="table-result"><?php echo($lista[$i]->texto)?></span></td>
                                    <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts"></td>
                                    <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" class="table-generic-opts"></td>
                                    <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='sobre.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
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
</html>
