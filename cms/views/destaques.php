<?php
    session_start();

    $id = null;
    $foto = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == 'excluir'){

            require_once('../models/destaqueClass.php');
            require_once('../models/DAO/destaqueDAO.php');

            $destaqueDAO = new destaqueDAO;
            $id = $_GET['id'];
            $destaqueDAO->delete($id);
        }
    }

    if(isset($_GET['btn-salvar'])){
//        $values = $_GET['id_ingrediente'];
//        $keys = array_keys($values);
//        $size = count($values);
//
//        for ($i = 0; $i < $size; $i++) {
//            $key   = $keys[$i];
//            $value = $values[$key];
//
//            print_r($value);
//
//        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratos :: Food 4fit - CMS</title>
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
    <script src="../../assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            $('#foto').on('change', function(){
                $('#frmfoto').ajaxForm({
                    target:'#visualizar'
                }).submit();
            });
        });
    </script>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div id="list-content">
                    <div class="pratos-wrapper">
                        <div class="generic-grid animate fadeInUp">
                            <?php
                                require_once("../../cms/models/DAO/destaqueDAO.php");

                                $destaqueDAO = new destaqueDAO();

                                $lista = $destaqueDAO->selectAll();

                                for($i = 0; $i < @count($lista); $i++){

                            ?>
                            <div class="generic-card">
                                <img src="../../<?php echo($lista[$i]->imagem)?>" alt="Teste" class="generic-card-img">
                                <div class="generic-card-ovy">
                                    <span class="card-dish-name margin-bottom-20px"><?php echo($lista[$i]->titulo)?></span>
                                    <div class="card-dish-separator margin-bottom-15px"></div>
                                    <p class="categoria-prato margin-bottom-30px"><b>Categoria:</b> <?php echo($lista[$i]->titulo_categoria)?></p>
                                    <div class="edit-btns">
                                        <img src="../../assets/images/icons/edit.svg" alt="Editar Prato">
                                        <img src="../../assets/images/icons/delete-white.svg" alt="Excluir Prato" onclick="javascript:location.href='pratos.php?modo=excluir&id=<?php echo($lista[$i]->id_destaque)?>'">
                                        <img src="../../assets/images/icons/checked-white.svg" alt="">
                                    </div>
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
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
