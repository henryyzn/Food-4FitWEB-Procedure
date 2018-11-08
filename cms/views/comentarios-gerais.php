<?php
if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    if($modo == 'excluir'){
        require_once('../../cms/models/comentario-geralClass.php');
        require_once("../../cms/models/DAO/comentario-geralDAO.php");

        $comentarioGeralDAO = new comentarioGeralDAO();
        $id = $_GET['id'];
        $comentarioGeralDAO->delete($id);
    }elseif($modo == 'desativar'){
        require_once('../../cms/models/comentario-geralClass.php');
        require_once("../../cms/models/DAO/comentario-geralDAO.php");

        $comentarioGeralDAO = new comentarioGeralDAO();
        $id = $_GET['id'];
        $comentarioGeralDAO->desactive($id);
    }elseif($modo == 'ativar'){
        require_once('../../cms/models/comentario-geralClass.php');
        require_once("../../cms/models/DAO/comentario-geralDAO.php");

        $comentarioGeralDAO = new comentarioGeralDAO();
        $id = $_GET['id'];
        $comentarioGeralDAO->active($id);
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
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div style="width: 100%; height: auto; display: flex;">
                    <table class="generic-table">
                        <tr>
                            <td><span>Nome:</span></td>
                            <td><span>E-Mail:</span></td>
                            <td><span>Data:</span></td>
                            <td><span>Assunto:</span></td>
                            <td colspan="2"><span>Opções:</span></td>
                        </tr>
                        <?php
                            require_once("../../cms/models/DAO/comentario-geralDAO.php");

                            $comentarioGeralDAO = new comentarioGeralDAO();

                            $lista = $comentarioGeralDAO->selectUnaccept();

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <tr>
                            <td><span class="table-result"><?php echo($lista[$i]->nome)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->email)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->data)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->assunto)?></td>
                            <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='comentarios-gerais.php?modo=ativar&id=<?php echo($lista[$i]->id_comentario)?>'"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='comentarios-gerais.php?modo=excluir&id=<?php echo($lista[$i]->id_comentario)?>'"></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <div style="width: 3px; background-color: #E8E8E8;"></div>
                    <table class="generic-table">
                        <tr>
                            <td><span>Nome:</span></td>
                            <td><span>E-Mail:</span></td>
                            <td><span>Data:</span></td>
                            <td><span>Assunto:</span></td>
                            <td colspan="2"><span>Opções:</span></td>
                        </tr>
                        <?php
                            require_once("../../cms/models/DAO/comentario-geralDAO.php");

                            $comentarioGeralDAO = new comentarioGeralDAO();

                            $lista = $comentarioGeralDAO->selectAccept();

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <tr>
                            <td><span class="table-result"><?php echo($lista[$i]->nome)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->email)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->data)?></span></td>
                            <td><span class="table-result"><?php echo($lista[$i]->assunto)?></td>
                            <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='comentarios-gerais.php?modo=desativar&id=<?php echo($lista[$i]->id_comentario)?>'"></td>
                            <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='comentarios-gerais.php?modo=excluir&id=<?php echo($lista[$i]->id_comentario)?>'"></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
