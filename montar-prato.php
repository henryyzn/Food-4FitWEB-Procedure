<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monte Seu Prato - Food 4Fit</title>
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="themeStyle" href="assets/css/style-light.css">
    <link rel="stylesheet" id="themeBases" href="assets/css/bases-light.css">
    <link rel="stylesheet" id="themeNavbar" href="assets/css/navbar-light.css">
    <link rel="stylesheet" id="themeFooter" href="assets/css/footer-light.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/sizes.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <script src="assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="assets/public/js/jquery-ui.min.js"></script>
    <script src="assets/public/js/dragscroll.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/montar-prato.js"></script>
</head>

<body>
    <?php require_once("components/navbar.php") ?>
    <section class="main">
        <h2 id="page-title" class="animate fadeInUp">MONTE SEU PRATO</h2>
        <p id="page-subtitle">Monte o seu prato de acordo com as<br>suas necessidades, e deixa<br>que a gente prepara tudo para você!</p>
        <div id="montar-prato">
            <div id="monte-seu-prato-container" class="animate fadeInUp margin-top-30px margin-bottom-30px">
                <div id="ingredientes-categorias" class="sem-ingredientes">
                    <div id="breadcrumb">
                        <span>
                            <a href="#">Início</a>
                        </span>
                    </div>
                    <p id="categoria-vazia">Esta categoria não possui nenhum ingrediente ou subcategoria.</p>
                    <section id="categorias">
                        <h2>Categorias</h2>
                        <div id="lista-categorias" class="dragscroll"></div>
                    </section>
                    <section id="ingredientes">
                        <h2>Ingredientes</h2>
                        <div id="lista-ingredientes"></div>
                    </section>
                </div>
                <div id="meus-ingredientes">
                    <div class="bar">
                        <span class="bar-span padding-top-15px padding-bottom-15px">Meu Prato</span>
                    </div>
                </div>
            </div>
            <div class="btn-generic animate fadeInUp margin-left-auto margin-right-auto" id="btn-processar">
                <span>Processar</span>
            </div>
        </div>
        <div class="dish-form display-none margin-left-auto margin-right-auto" id="informacoes-adicionais">
            <section style="display: flex; width: 100%; height: auto; flex-direction: column; justify-content: center; align-items: center;">
                <h2 style="font-size: 18px; color: #000; padding: 30px; padding-bottom: 0px; text-align: center; font-family: 'Roboto Bold';">INFORMAÇÕES ADICIONAIS</h2>
                <div style="width: 30px; height: 3px; margin: auto; background: black; border-radius: 50px; margin-top: 8px;"></div>
            </section>
            <table border="0" style="width: 100%; height: auto; border-collapse: collapse;" class="margin-top-30px">
                <tr style="background-color: #9CC283;">
                    <td width="33.33%">
                        <h2 style="text-align: center; color: #FFF; font-size: 18px; font-family: 'Roboto Bold'; padding: 12px;">INGREDIENTE</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; color: #FFF; font-size: 18px; font-family: 'Roboto Bold'; padding: 12px;">QUANTIDADE</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; color: #FFF; font-size: 18px; font-family: 'Roboto Bold'; padding: 12px;">SUBTOTAL</h2>
                    </td>
                </tr>
                <tr>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Regular'; padding: 15px;">Nome do Ingrediente</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Light'; padding: 15px;">3 unidades</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Bold'; padding: 15px;">R$ 000,00</h2>
                    </td>
                </tr>
                <tr>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Regular'; padding: 15px;">Nome do Ingrediente</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Light'; padding: 15px;">3 unidades</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Bold'; padding: 15px;">R$ 000,00</h2>
                    </td>
                </tr>
                <tr>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Regular'; padding: 15px;">Nome do Ingrediente</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Light'; padding: 15px;">3 unidades</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Bold'; padding: 15px;">R$ 000,00</h2>
                    </td>
                </tr>
                <tr>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Regular'; padding: 15px;">Nome do Ingrediente</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Light'; padding: 15px;">3 unidades</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Bold'; padding: 15px;">R$ 000,00</h2>
                    </td>
                </tr>
                <tr>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Regular'; padding: 15px;">Nome do Ingrediente</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Light'; padding: 15px;">3 unidades</h2>
                    </td>
                    <td width="33.33%">
                        <h2 style="text-align: center; font-size: 18px; font-family: 'Roboto Bold'; padding: 15px;">R$ 000,00</h2>
                    </td>
                </tr>
            </table>
            <div style="width: 100%; height: auto; background-color: #9CC283; display: flex; justify-content: flex-end;">
                <h2 style="padding: 15px; font-size: 18px; color: #FFF; padding-right: 30px; font-family: 'Roboto Bold';">TOTAL: R$ 000,00</h2>
            </div>
            <div class="form-generic width-small margin-left-auto margin-right-auto padding-top-30px padding-bottom-30px">
                <form action="#" class="form-generic-content">
                    <label for="nomeprato" class="label-generic">Nome do Prato:</label>
                    <input type="text" name="nomeprato" id="nomeprato" value="Prato Customizado" class="input-generic">
                    <label for="resumoprato" class="label-generic">Resumo do Prato:</label>
                    <input type="text" name="resumoprato" id="resumoprato" value="Este prato foi montado de forma customizada." class="input-generic">
                    <label for="descricaoprato" class="label-generic">Descrição do Prato:</label>
                    <textarea type="text" name="descricaoprato" id="descricaoprato" class="textarea-generic">Este é um prato montado na ferramenta 'Montar Pratos' da Food 4Fit.</textarea>
                </form>
                <div class="form-row">
                    <span>Salvar em "Meus Pratos"</span>
                    <div class="btn-generic margin-left-15px" onclick="javscript:location.href='carrinho.php'">
                        <span>Comprar</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once("components/footer.html"); ?>
</body>

</html>
