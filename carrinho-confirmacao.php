<?php
    session_start();
    require_once('modulo.php');
    validateLog();

    if(isset($_GET['last_id'])){
        $_SESSION['last_id'] = $_GET['last_id'];
    }

    require_once('cms/models/pedidoClass.php');
    require_once('cms/models/DAO/pedidoDAO.php');

    $classPedido = new Pedido();
    $classPedido->id_ordem_servico = $_SESSION['last_id'];

    $pedidoDAO = new pedidoDAO();
    if(isset($_GET['btn-comprar'])){
        $pedidoDAO->pagamento($classPedido);
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirmar Informações | Carrinho - Food 4Fit</title>
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
        <form action="carrinho-confirmacao.php" method="GET" name="frmcompra" id="form-compra" class="width-100">
            <?php
                //require_once('cms/models/DAO/pratosDAO.php');

                //$pratosDAO = new pratosDAO;
                //$lista = $pratosDAO->selectAllById($id_prato);

                /*for($i = 0; $i < @count($lista); $i++){
                    $
                }*/
            ?>
            <section id="shopping-cart-address-block" class="padding-top-15px">
                <h3>ENDEREÇO DE ENTREGA</h3>
                <p class="shopping-cart-address-subtitle">Selecione ou cadastre um endereço de entrega</p>
                <div id="shopping-cart-address-row">
                    <div class="shopping-cart-address-column">
                        <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um endereço:</span>
                        <div class="padding-left-30px">
                            <input type="radio" name="endereco" id="input1" value="1">
                            <label for="input1" class="margin-left-5px">R. Silverstone, 391, JD. Flores, Jandira, SP</label>
                        </div>
                        <div class="padding-left-30px padding-top-15px">
                            <input type="radio" name="endereco" id="input2" value="1">
                            <label for="input2" class="margin-left-5px">R. São Roque, 142, Lago dos Cisnes, Barueri, SP</label>
                        </div>
                        <div class="padding-left-30px padding-top-15px">
                            <input type="radio" name="endereco" id="input3" value="1">
                            <label for="input3" class="margin-left-5px">Av. Centuri, 938, João Bosques, Carapicuíba, SP</label>
                        </div>
                        <span class="save-data-button padding-left-30px padding-top-20px" onclick="modalEndereco()">Cadastrar um endereço</span>
                    </div>
                    <div class="shopping-cart-address-column">
                        <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Frete:</span>
                        <p class="padding-left-30px">Frete Gerado: <b>R$ 00,00</b></p>
                    </div>
                </div>
                <h3 class="margin-top-30px">PAGAMENTO</h3>
                <p class="shopping-cart-address-subtitle">Selecione ou cadastre um cartão de crédito para<br>confirmar o pagamento do pedido</p>
                <div id="shopping-cart-address-row">
                    <div class="shopping-cart-address-column">
                        <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um cartão de crédito:</span>
                        <?php
                            require_once('cms/models/DAO/cartaoDAO.php');

                            $cartaoDAO = new cartaoDAO();
                            $id = $_SESSION['id_usuario'];
                            $lista = $cartaoDAO->selectAllId($id);

                            for($i = 0; $i < @count($lista); $i++){
                        ?>
                        <div class="padding-left-30px padding-bottom-10px cartoes">
                            <input type="radio" name="cartao" <?php if($lista[$i]->titular == 'Henrique F. Silva') echo 'checked' ?> id="<?php echo($lista[$i]->id)?>" value="<?php echo($lista[$i]->id)?>">
                            <label for="<?php echo($lista[$i]->id)?>" class="margin-left-5px"><?php echo($lista[$i]->id_bandeira_cartao)?> ****6002, <?php echo($lista[$i]->titular)?></label>
                        </div>
                        <?php
                            }
                        ?>
                        <span class="save-data-button padding-left-30px padding-top-30px" onclick="modalCartao()">Cadastrar um cartão</span>
                    </div>
                </div>
                <div id="total-price" style="">
                    <span>Total da compra:<br><b>R$ 000,00</b></span>
                </div>
                <div class="shopping-cart-row-next">
                    <a href="carrinho.php" class="margin-right-30px">Cancelar</a>
                    <button type="submit" name="btn-comprar" value="Comprar" class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px" id="finalizar-compra">
                        <span>Finalizar Compra</span>
                    </button>
                </div>
            </section>
        </form>
        <div class="shopping-cart-block">
            <div class="shopping-cart-title-menu margin-top-30px">
                <div class="shopping-cart-menu-column align">
                    <span class="padding-top-15px padding-bottom-15px">IMAGEM</span>
                </div>
                <div class="shopping-cart-menu-column align">
                    <span class="padding-top-15px padding-bottom-15px">INFORMAÇÕES</span>
                </div>
                <div class="shopping-cart-menu-column align">
                    <span class="padding-top-15px padding-bottom-15px">PREÇO UNIT.</span>
                </div>
                <div class="shopping-cart-menu-column align">
                    <span class="padding-top-15px padding-bottom-15px">QUANTIDADE</span>
                </div>
                <div class="shopping-cart-menu-column align">
                    <span class="padding-top-15px padding-bottom-15px">SUBT0TAL</span>
                </div>
            </div>
            <section class="shopping-cart-grid">
                <?php
                    require_once("cms/models/DAO/pratosDAO.php");

                    $pratosDAO = new pratosDAO();

                    foreach($_SESSION['carrinho'] as $key => $value) {
                        $id_prato = $value['id_prato'];
                        $titulo = $value['titulo'];
                        $preco = $value['preco'];
                        $foto_prato = $value['foto_prato'];
                        //$quantidade = $value['quantidade'];
                ?>
                <div class="shopping-cart-row">
                    <div class="shopping-cart-column">
                        <figure class="shopping-cart-image-container">
                            <img src="<?php echo($foto_prato)?>" alt="Nome do Prato">
                        </figure>
                    </div>
                    <div class="shopping-cart-column">
                        <h2 class="padding-bottom-5px"><?php echo($titulo)?></h2>
                        <h3 class="padding-bottom-15px">Categoria: Nome da Categoria</h3>
                    </div>
                    <div class="shopping-cart-column align">
                        <span id="shopping-cart-price">R$ <?php echo($preco)?></span>
                    </div>
                    <div class="shopping-cart-column align">
                        <span id="shopping-cart-qty" style="color: #9CC283;">QTD: 3</span>
                    </div>
                    <div class="shopping-cart-column align">
                        <span id="shopping-cart-price-total">R$ 000,00</span>
                    </div>
                </div>
                <?php
                    }
                ?>
            </section>
        </div>
	</section>
	<div class="generic-modal animate fadeIn" id="abrir">
        <article class="generic-modal-wrapper">

        </article>
    </div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
	<script>
        $(document).ready(function () {
            $(".abrir-form-endereco").click(function () {
                $(".hide").slideToggle(200);
            });
            $(".abrir-form-cartao").click(function () {
                $(".hide-2").slideToggle(200);
            });
            $("#finalizar-compra").click(function(){
                $("#form-compra").submit();
            });
        });
    </script>
</body>
</html>
