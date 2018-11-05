<?php

    //Estou dando require_once nesta página
    //pois se não for feito isso
    //não irá achar os métodos da Class
    require_once('../../cms/models/cadastro-usuarioClass.php');

    if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    if($modo == 'excluir'){

    require_once('../../cms/models/cadastro-usuarioClass.php');
    require_once("../../cms/models/DAO/cadastro-usuarioDAO.php");

        $cadUsuarioDAO = new cadUsuarioDAO();
        $id = $_GET['id'];
        $cadUsuarioDAO->delete($id);
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
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png" />
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
                 <form action="#" class="form-generic-content" id="form-loja">

                 <div class="saude-wrapper">
                    <div class="saude-content" id="personal-lista">
                        <table class="generic-table">
                            <tr>
                                <td><span>Nome</span></td>
                                <td><span>Sobrenome</span></td>
                                <td><span>E-mail</span></td>
                                <td><span>Teste</span></td>
                                <td><span>Teste</span></td>

                                <td colspan="4"><span>Opções</span></td>
                            </tr>
                            <?php

                                require_once("../../cms/models/DAO/cadastro-usuarioDAO.php");

                                $cadUsuarioDAO = new cadUsuarioDAO();

                                $lista = $cadUsuarioDAO->selectAll();

                                for($i = 0; $i < count($lista); $i++){



                            ?>
                            <tr>
                                <td><span class="table-result"><?php echo($lista[$i]->nome)?></span></td>
                                <td><span class="table-result"></span></td>
                                <td><span class="table-result"></span></td>
                                <td><span class="table-result"></span></td>
                                <td><span class="table-result"></span></td>
                                <td><span class="table-result"></span></td>
                                <td><span class="table-result"></span></td>


                                <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='usuarios.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                            </tr>
                            <?php
                                }
                            ?>

                        </table>
                    </div>
                </div>

                </form>
            </div>
        </div>

    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>