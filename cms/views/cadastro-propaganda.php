<?php

session_start();

    $id = null;
    $titulo = null;
    $texto = null;
    $imagem = null;
    $ativo = "Salvar";

    if(isset($_GET['btn-salvar'])){
        require_once('../models/propagandaClass.php');
        require_once('../models/DAO/propagandaDAO.php');

        $classPropaganda = new Propaganda();
        $classPropaganda->id = $_GET['id'];
        $classPropaganda->titulo = $_GET['titulo'];
        $classPropaganda->texto = $_GET['texto'];
        $classParceiros->imagem = 'assets/images/box.png';
        $classPropaganda->ativo = '1';

        $propagandaDAO = new propagandaDAO();

        if($_GET['btn-salvar'] == "Salvar"){
           $propagandaDAO->insert($classPropaganda);
       }/*elseif($_GET['btn-salvar'] == "Editar"){
           $classPropaganda->id = $_GET['id'];
           $propagandaDAO->update($classPropaganda);
       }*/

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Parceiros :: Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
        <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
        <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/sizes.css">
        <link rel="stylesheet" href="../assets/css/align.css">
        <link rel="stylesheet" href="../assets/css/keyframes.css">
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
        <section>
            <form action="upload/upload-propaganda.php" name="frmparceiro" action="cadastro-propaganda.php" method="GET">
                <div class="form-generic">
                    <div class="form-generic-content">
                        <h2 class="form-title">Cadastrar uma propaganda</h2>
                        <div>
                            <label for="titulo" class="label-generic">Imagem:</label>
                <div id="imagem" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                    <img src='../../assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                </div>
                <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                <input type="file" name="fileimage" id="fotos" style="display: none;">

                        </div>
                        <span class="label-fix">Titulo:</span>
                        <input type="text" name="titulo" id="titulo" class="input-generic">

                        <label for="descricao" class="label-generic">Texto:</label>
                        <textarea name="texto" id="texto" class="textarea-generic"></textarea>

                        <div class="form-row">
                            <button type="submit" name="btn-salvar" value="Salvar" class="btn-generic margin-right-20px">
                                <span>Salvar</span>
                            </button>
                            <span class="btn-cancelar">Cancelar</span>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </body>
</html>
