<?php
    session_start();
    require_once('modulo.php');
    validateLog();
    if(isset($_GET['btn-comprar'])){
        require_once('cms/models/pedidoClass.php');
        require_once('cms/models/DAO/pedidoDAO.php');

        $id = $_GET['id_prato'];
        $quantidade = $_GET['quantidade'];

        $pedido = array_map(function($id, $qtd){ return array('id_prato' => $id, 'quantidade' => $qtd); }, $id, $quantidade);
        //print_r($pedido);

        $classPedido = new Pedido();
        $classPedido->id_usuario = $_SESSION['id_usuario'];
        $classPedido->pedido = $pedido;

        $pedidoDAO = new pedidoDAO();
        if($_GET['btn-comprar'] == "Comprar"){
            $pedidoDAO->insertOrdem($classPedido);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
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
	<script src="assets/public/js/jquery.mask.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script src="assets/js/card.js"></script>
	<style>
        .btn-counter{
            background-color: #9CC283;
            color: white;
            border-radius: 3px;
            padding: 5px;
            cursor: pointer;
        }
        .counter{
            background-color: white;
            color: black;
            border-radius: 3px;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title" class="margin-left-auto margin-right-auto margin-bottom-30px">MEU CARRINHO</h2>
        <form action="carrinho.php" method="GET" name="frmcarrinho" style="width: 100%;">
            <div class="shopping-cart-block">
                <div class="shopping-cart-title-menu">
                    <div class="shopping-cart-menu-column align-x">
                        <span class="padding-top-15px padding-bottom-15px">IMAGEM</span>
                    </div>
                    <div class="shopping-cart-menu-column align-x">
                        <span class="padding-top-15px padding-bottom-15px">INFORMAÇÕES</span>
                    </div>
                    <div class="shopping-cart-menu-column align-x">
                        <span class="padding-top-15px padding-bottom-15px">PREÇO UNIT.</span>
                    </div>
                    <div class="shopping-cart-menu-column align-x">
                        <span class="padding-top-15px padding-bottom-15px">QUANTIDADE</span>
                    </div>
                    <div class="shopping-cart-menu-column align-x">
                        <span class="padding-top-15px padding-bottom-15px">SUBT0TAL</span>
                    </div>
                </div>
                <section class="shopping-cart-grid">
                    <?php
                        require_once("cms/models/DAO/pratosDAO.php");

                        $pratosDAO = new pratosDAO();

                        foreach(@$_SESSION['carrinho'] as $key => $value) {
                            $id_prato = $value['id_prato'];
                            $titulo = $value['titulo'];
                            $preco = $value['preco'];
                            $foto_prato = $value['foto_prato'];
                            //$quantidade = $value['quantidade'];
                    ?>
                    <input type="hidden" name="id_prato[]" id="id_prato" value="<?php echo($id_prato)?>">
                    <div class="shopping-cart-row" data-quantidade>
                        <div class="shopping-cart-column">
                            <figure class="shopping-cart-image-container">
                                <img src="<?php echo($foto_prato)?>" alt="Nome do Prato">
                            </figure>
                        </div>
                        <div class="shopping-cart-column align-flex-start">
                            <div class="switch_box margin-bottom-15px">
                                <input type="checkbox" name="check" id="check" value="1" class="switch-styled">
                            </div>
                            <h2 class="padding-bottom-5px"><?php echo($titulo)?></h2>
                            <h3 class="padding-bottom-15px">Categoria: Nome da Categoria</h3>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price">R$ <?php echo($preco)?></span>
                        </div>
                        <div class="shopping-cart-column align-y">
                            <div class="input-group input-number-group" data-f4f-number-group>
                                <div class="input-group-button">
                                    <span class="input-number-decrement" data-f4f-number-decrement>-</span>
                                </div>
                                <input class="input-number" type="number" name="quantidade[]" value="1" min="1" max="1000">
                                <div class="input-group-button">
                                    <span class="input-number-increment" data-f4f-number-increment>+</span>
                                </div>
                            </div>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price-total">R$ 000,00</span>
                        </div>
                    </div>
                    <div class="shopping-cart-separator"></div>
                    <?php
                        }
                    ?>
                </section>
                <div id="shopping-cart-select-block">
                    <div class="switch_box margin-left-30px">
                        <input type="checkbox" name="chkall" id="chkall" class="switch-styled">
                    </div>
                    <label for="chkall" class="padding-left-15px">Selecionar Todos</label>
                    <div class="btn-generic-disabled margin-left-30px" ><span>Excluir</span></div>
                </div>
                <section id="shopping-cart-confirm-block" class="padding-bottom-30px">
                    <div id="shopping-cart-confirm-column-one">
                        <h2 class="padding-left-30px padding-top-30px padding-bottom-15px">Cupom de Desconto</h2>
                        <p class="padding-bottom-15px padding-left-30px">Digite o seu cupom de desconto para receber um desconto<br>no seu valor total do pedido. Múltiplos cupons não serão aplicados.</p>
                        <div style="display: flex;">
                            <input class="margin-left-30px" type="text" style="width: 350px; border: none; outline: none; height: 40px; background-color: #E8E8E8; border-radius: 5px; text-indent: 12px; font-family: 'Roboto Medium Italic';" placeholder="Digite o cupom...">
                            <div class="btn-generic margin-left-15px">
                                <span>Processar</span>
                            </div>
                        </div>
                    </div>
                    <div id="shopping-cart-confirm-column-two">
                        <h2 class="padding-right-30px padding-top-30px padding-bottom-30px" style="font-family: 'Roboto light'; font-size: 21px; color: #282828;">Total a Pagar: <span style="font-family: 'Roboto Bold'; font-size: 28px; color: #000;">R$ 000,00</span></h2>
                        <button name="btn-comprar" value="Comprar" type="submit" class="btn-generic margin-right-30px">
                            <span>Comprar</span>
                        </button>
                    </div>
                </section>
            </div>
        </form>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
	<script>
        $("[data-f4f-number-group]").each(function () {
            var input = $(this).find("input");
            $(this).on("click", "[data-f4f-number-decrement], [data-f4f-number-increment]", function () {
                var number = parseInt(input.val());
                if ($(this).is("[data-f4f-number-increment]")) {
                    number + 1;
                } else {
                    number - 1;
                }

                number = Math.max(1, Math.min(1000, number));
                input.val(number);
            });
        });
    </script>
</body>
</html>
