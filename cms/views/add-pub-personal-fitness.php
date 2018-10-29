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
    </head>
    <body>
        <section id="main">
            <?php require_once("../components/sidebar.php") ?>
            <div id="main-content">
                <?php require_once("../components/navbar.php")?>
                <div id="page-content">
                    <div class="add-pub-wrapper">
                        <div class="form-generic pub-add">
                            <h2 class="form-title">A</h2>
                            <form action="#" method="POST" class="form-generic-content">
                                <label class="label-generic">Título:</label>
                                <input class="input-generic">

                                <label class="label-generic">Texto:</label>
                                <textarea class="textarea-generic"></textarea>

                                <div class="form-row">
                                    <span>Cancelar</span>
                                    <div class="btn-generic margin-left-20px">
                                        <span>Salvar</span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <aside class="pub-side">
                            <h2></h2>
                            <div>
                                <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
                                <p>André Sanchez</p>
                                <span>01/01/2018</span>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <?php require_once("../components/modal.html") ?>
        </section>
    </body>
</html>
