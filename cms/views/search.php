<?php
    session_start();

    if(isset($_GET['search'])){
        require_once('../models/diario-bordoClass.php');
        require_once('../models/DAO/diario-bordoDAO.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca por '<?php echo($_GET['search'])?>' :: Food 4fit - CMS</title>
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
    <style>
        .search-block{
            width: 100%;
            height: auto;
        }
        #search-page-title{
            font-size: 21px;
            color: white;
            font-family: 'Roboto Bold';
            line-height: 28px;
            text-align: center;
        }
        .search-block-content{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            border: 30px solid transparent;
        }
        .search-result{
            width: 100%;
            height: auto;
            box-sizing: border-box;
            border-radius: 5px;
            overflow: hidden;
            background-color: #282828;
            display: flex;
            align-items: center;
        }
        .search-result figure{
            width: 100%;
            max-width: 200px;
            height: auto;
            padding: 0;
        }
        .search-result figure img{
            width: 100%;
            height: auto;
            display: block;
            object-fit: cover;
        }
        .search-result h2{
            font-size: 18px;
            color: white;
            font-family: 'Roboto Bold';
            line-height: 26px;
            text-align: left;
        }
        .search-result h2 p{
            font-size: 16px;
            color: #E8E8E8;
            font-family: 'Roboto Medium Italic';
            line-height: 22px;
            text-align: left;
        }
        .search-result h2 span{
            font-size: 16px;
            color: #E8E8E8;
            font-family: 'Roboto Medium';
            line-height: 22px;
            text-align: left;
            display: block;
        }
    </style>
</head>
<body>
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <section class="search-block">
                    <h2 id="search-page-title" class="padding-top-30px">Resultados para '<?php echo($_GET['search'])?>'</h2>
                    <div class="search-block-content">
                        <?php
                            require_once("../models/DAO/pesquisaDAO.php");

                            $pesquisaDAO = new pesquisaDAO();

                            $lista = $pesquisaDAO->selectSearch($_GET['search']);

                            for($i = 0; $i < count($lista); $i++){
                        ?>
                        <div class="search-result">
                            <figure>
                                <img src="../../<?php echo($lista[$i]->foto)?>" alt="">
                            </figure>
                            <h2 class="padding-left-20px"><?php echo($lista[$i]->titulo)?>
                                <p class="padding-top-10px"><?php echo($lista[$i]->titulo)?></p>
                                <span class="padding-top-10px"><?php echo($lista[$i]->id)?></span>
                            </h2>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
