<!DOCTYPE html><html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/bases.css">
        <link rel="stylesheet" href="../assets/css/sizes.css">
        <link rel="stylesheet" href="../assets/css/align.css">
        <link rel="stylesheet" href="../assets/css/keyframes.css">
    </head>
    <body>
        <section id="main">
            <?php require_once("./components/sidebar.php") ?>
            <div id="main-content">
                <?php require_once("./components/navbar.php")?>
                <div id="page-content">
                    <div class="contact-wrapper">
                        <div class="contact-title-row">
                            <input type="checkbox" name="check" id="check"><label for="check" class="mark margin-right-20px">Marcar Todas</label>
                            <div class="margin-right-20px"><span>Marcar Como Lida</span></div>
                            <div class="margin-right-20px"><span>Excluir</span></div>
                        </div>
                        <table>
                            <tr id="contact-table-trow">
                                <td colspan="2"><span>NOME</span></td>
                                <td><span>E-MAIL</span></td>
                                <td><span>ASSUNTO</span></td>
                                <td><span>DATA ENVIO</span></td>
                                <td colspan="2"><span>OPÇÕES</span></td>
                            </tr>
                            <?php foreach($faleConosco as $fc){ ?>
                            <tr class="contact-table-rrow">
                                <td colspan="2">
                                    <input type="checkbox">
                                    <span style="display: inline-block;"><?php echo($fc->getNome()) ?></span>
                                </td>
                                <td><span><?php echo($fc->getEmail()) ?></span></td>
                                <td><span><?php echo($fc->getAssunto()) ?></span></td>
                                <td><span>01/01/2018</span></td>
                                <td>
                                    <div class="coluna">
                                        <img src="../assets/images/cms/symbols/visualizar.svg" alt="" class="margin-right-10px fc-visualizar">
                                        <img src="../assets/images/cms/symbols/excluir.svg" alt="" class="fc-deletar">
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
            <?php require_once("./components/modal.html") ?>
        </section>
    </body>
</html>
