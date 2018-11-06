<!DOCTYPE html>
<html lang="pt-br">
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
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div class="diario-border-wrapper">
                    <table class="table-diario">
                        <tr id="contact-table-trow">
                            <td colspan="2"><span>NOME</span></td>
                            <td><span>E-MAIL</span></td>
                            <td><span>ASSUNTO</span></td>
                            <td><span>DATA ENVIO</span></td>
                            <td colspan="2"><span>OPÇÕES</span></td>
                        </tr>
                        <?php
                            require_once("../models/DAO/diario-bordoDAO.php");

                            $diarioBordoDAO = new diarioBordoDAO();

                            $lista = $diarioBordoDAO->selectAll();

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <tr class="contact-table-rrow">
                            <td colspan="2">
                                <input type="checkbox">
                                <span style="display: inline-block;">Nome do Usuário</span>
                            </td>
                            <td><span>endereco@provedor.com</span></td>
                            <td><span><?php echo($lista[$i]->titulo)?></span></td>
                            <td><span><?php echo($lista[$i]->data)?></span></td>
                            <td>
                                <div class="coluna">
                                    <img src="../../assets/images/cms/symbols/visualizar.svg" alt="" class="margin-right-10px">
                                    <img src="../../assets/images/cms/symbols/excluir.svg" alt="">
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <aside class="menu-lateral-diario form-generic">
                        <div>
                            <h2>Filtros</h2>
                        </div>
                        <form class="form-generic-content width-300px margin-right-auto margin-left-auto">
                            <label class="label-generic padding-top-20px">
                                Progresso:
                            </label>
                            <input type="checkbox">
                            <label class="label-generic">PÉSSIMO</label>
                            <input type="checkbox">
                            <label class="label-generic">RUIM</label>
                            <input type="checkbox">
                            <label class="label-generic">REGULAR</label>
                            <input type="checkbox">
                            <label class="label-generic">BOM</label>
                            <input type="checkbox">
                            <label class="label-generic">ÓTIMO</label>

                            <h3 class="padding-top-20px">Idade:</h3>
                            <label class="label-generic">Entre:</label>
                            <input type="text" class="input-generic">
                            <label class="label-generic">À:</label>
                            <input type="text" class="input-generic">

                            <label class="label-generic">Data de Envio Posterior a:</label>
                            <input type="text" class="input-generic">
                            <label class="label-generic">Data de Envio anterior a:</label>
                            <input type="text" class="input-generic">

                            <input type="submit" name="submit" class="display-none" class="input-generic">
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>


