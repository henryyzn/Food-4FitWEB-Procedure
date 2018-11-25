<?php
    session_start();
    if(isset($_GET['modo'])){
    $modo = $_GET['modo'];
    if($modo == 'excluir'){
        require_once('../../cms/models/contatoClass.php');
        require_once("../../cms/models/DAO/contatoDAO.php");
        require_once("../../caminho-pasta.php");

        $contatoDAO = new contatoDAO();
        $id = $_GET['id'];
        $contatoDAO->delete($id);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato :: Food 4fit - CMS</title>
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
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div class="saude-wrapper">
                    <div class="saude-content" id="personal-lista">
                        <table class="generic-table">
                            <tr>
                                <td><span>Nome:</span></td>
                                <td><span>E-mail:</span></td>
                                <td><span>Telefone:</span></td>
                                <td><span>Celular:</span></td>
                                <td><span>Assunto:</span></td>
                                <td><span>Comentário:</span></td>
                                <td colspan="2"><span>Opções:</span></td>
                            </tr>
                            <?php
                                require_once("../../cms/models/DAO/contatoDAO.php");

                                $contatoDAO = new contatoDAO();

                                $lista = $contatoDAO->selectAll();

                                for($i = 0; $i < count($lista); $i++){
                            ?>
                            <tr>
                                <td><span class="table-result"><?php echo($lista[$i]->nome)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->email)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->telefone)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->celular)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->assunto)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->observacao)?></span></td>
                                <td><img src="../../assets/images/cms/symbols/visualizar.svg" alt="" class="table-generic-opts" onclick="modalDouble(<?php echo($lista[$i]->id)?>, 'fale-conosco')"></td>
                                <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" class="table-generic-opts" onclick="javascript:location.href='fale-conosco.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'"></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="generic-modal animate fadeIn" id="abrir">
        <article class="generic-modal-wrapper width-450px">

        </article>
    </div>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
