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
                    <div class="profile-wrapper">
                        <aside class="profile-aside">

                                <figure>
                                    <img src="../assets/images/" alt="">
                                </figure>

                                <figure></figure>


                            <h2></h2>
                            <span></span>
                        </aside>
                        <div class="profile-content width-500px padding-top-30px">
                            <label for="matricula" class="lbl-ext">Matrícula:</label>
                            <span class="lbl-result" id="matricula"></span>

                            <label for="dtefetivacao" class="lbl-ext">Data Efetiv.:</label>
                            <span class="lbl-result" id="dtefetivacao"></span>

                            <label for="genero" class="lbl-ext">Gênero:</label>
                            <span class="lbl-result" id="genero"></span>

                            <label for="dtnascimento" class="lbl-ext">Data Nasc.:</label>
                            <span class="lbl-result" id="dtnascimento"></span>

                            <label for="rg" class="lbl-ext">RG:</label>
                            <span class="lbl-result" id="rg"></span>

                            <label for="cpf" class="lbl-ext">CPF:</label>
                            <span class="lbl-result" id="cpf"></span>

                            <label for="salario" class="lbl-ext">Salário:</label>
                            <span class="lbl-result" id="salario"></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php require_once("./components/modal.html") ?>
        </section>
    </body>
</html>
