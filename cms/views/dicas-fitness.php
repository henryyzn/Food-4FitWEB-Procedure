<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dicas Fitness - Fit Session :: Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <span></span>
                <div class="saude-wrapper">
                    <div class="saude-content" id="dicas-lista">
                        <div id="page-actions">
                            <a href="add-pub-dicas-fitness.php" id="btn-adicionar-publicacao">
                                <img src="../../assets/images/cms/symbols/adicionar.svg" alt="Adicionar">
                                <span>Adicionar Publicação</span>
                            </a>
                        </div>
                        <table class="generic-table">
                            <tr>
                                <td><span>Título</span></td>
                                <td><span>Autor</span></td>
                                <td><span>Dt. Pub</span></td>
                                <td colspan="3"><span>Opções</span></td>
                            </tr>
                            <?php
                                require_once("../../cms/models/DAO/dicas-fitnessDAO.php");

                                $dicasFitnessDAO = new dicasFitnessDAO();

                                $lista = $dicasFitnessDAO->selectAll();

                                for($i = 0; $i < count($lista); $i++){
                            ?>
                            <tr>
                                <td><span class="table-result"><?php echo($lista[$i]->titulo)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->autor)?></span></td>
                                <td><span class="table-result"><?php echo($lista[$i]->data)?></span></td>
                                <td><img src="../../assets/images/cms/symbols/ativar.svg" alt="Ativar/Desativar" onclick="javascript:location.href='usuarios.php?modo=visualizar&id=<?php echo($lista[$i]->id)?>'" class="table-generic-opts"></td>
                                <td><img src="../../assets/images/cms/symbols/editar.svg" alt="" onclick="javascript:location.href='add-pub-dicas-fitness.php?modo=editar&id=<?php echo($lista[$i]->id)?>'" class="table-generic-opts"></td>
                                <td><img src="../../assets/images/cms/symbols/excluir.svg" alt="" onclick="javascript:location.href='add-pub-dicas-fitness.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'" class="table-generic-opts"></td>
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
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
