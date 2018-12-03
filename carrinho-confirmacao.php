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

    $pagamentoRecusado = false;
    $concluido = false;
    $unset = false;

    if (isset($_SESSION["desconto-carrinho"])) {
        $totalCompra = $_SESSION["valor-carrinho"] - ($_SESSION["valor-carrinho"] * $_SESSION["desconto-carrinho"] / 100);
    } else {
        $totalCompra = $_SESSION["valor-carrinho"];
    }
    
    $pedidoDAO = new pedidoDAO();
    if(isset($_GET['btn-comprar'])){
        require_once("pagamento.php");
        $pagamentoConcluido = realizarPagamento($totalCompra, $_GET["endereco"], $_GET["cartao"], $_GET["codigo_cartao"]);
        if ($pagamentoConcluido) {
            $concluido = true;
            $unset = $pedidoDAO->pagamento($classPedido, $totalCompra);
        } else {
            $pagamentoRecusado = true;
        }
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
</head>
<body>
	<?php require_once("components/navbar.php") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <form action="carrinho-confirmacao.php" method="GET" name="frmcompra" id="form-compra" class="width-500 margin-auto form-generic-content">
            <section id="shopping-cart-address-block">
                <h3 id="page-title">ENDEREÇO DE ENTREGA</h3>
                <p id="page-subtitle" class="padding-bottom-20px">Selecione ou cadastre um endereço de entrega</p>
                <select name="endereco" id="endereco" type="text" class="input-generic" required>
                    <option selected disabled value="">Selecione uma opção:</option>
                    <?php
                        $id = $_SESSION['id_usuario'];
                        require_once("cms/models/DAO/enderecoDAO.php");

                        $enderecoDAO = new enderecoDAO();
                        $lista = $enderecoDAO->listarEnderecosUsuario($id);

                        foreach($lista as $endereco) {
                            echo("<option value=".$endereco->id.">".$endereco->logradouro."</option>");
                        }
                    ?>
                </select>
                <div class="btn-generic margin-left-auto margin-right-auto"><span class="save-data-button padding-left-30px padding-top-20px" onclick="modal('carrinho-endereco')">Cadastrar um endereço</span></div>

                <h3 id="page-title-second" class="margin-top-30px">PAGAMENTO</h3>
                <p id="page-subtitle-second">Selecione ou cadastre um cartão de crédito para confirmar o pagamento do pedido</p>
                <div id="shopping-cart-address-row">
                    <div class="shopping-cart-address-column margin-top-30px">
                        <select name="cartao" id="cartao" class="input-generic" required>
                        <option selected disabled value="">Selecione uma opção:</option>
                        <?php
                            require_once('cms/models/DAO/cartaoDAO.php');

                            $cartaoDAO = new cartaoDAO();
                            $id = $_SESSION['id_usuario'];
                            $lista = $cartaoDAO->selectAllId($id);
                            for($i = 0; $i < @count($lista); $i++){
                        ?>
                            <option value="<?php echo($lista[$i]->id)?>"><?php echo($lista[$i]->numero)?>, <?php echo($lista[$i]->titular)?></option>
                        <?php
                            }
                        ?>
                        </select>
                        
                        <input type="number" name="codigo_cartao" id="codigo_cartao" placeholder="Digite o código de segurança do cartão selecionado" class="input-generic" required>
                        
                        <div class="btn-generic margin-left-auto margin-right-auto margin-bottom-30px" onclick="modal('carrinho-cartao')">
                            <span>Cadastrar um cartão</span>
                        </div>
                    </div>
                </div>
                <div id="total-price" style="text-align: center; font-size: 28px;">
                    <span>Total da compra:<br><b>R$ <?php echo(number_format($totalCompra, 2, ",", "."));?></b></span>
                </div>
                <?php if (isset($_SESSION["desconto-carrinho"])) { ?>
                    <div style="text-align: center; font-size: 12px;"><br>Desconto de <?php echo($_SESSION["desconto-carrinho"]); ?>%</div>
                <?php } ?>
                <div class="shopping-cart-row-next">
                    <a href="carrinho.php" class="margin-right-30px">Cancelar</a>
                    <input type="submit" name="btn-comprar" value="Comprar" id="finalizar-compra" class="display-none">
                    <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px" onclick="document.getElementById('finalizar-compra').click()">
                        <span>Finalizar Compra</span>
                    </div>
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
                        $quantidade = $value['quantidade'];
                        $categoria = $value['categoria'];
                        $subtotal = $value['subtotal'];
                ?>
                <div class="shopping-cart-row">
                    <div class="shopping-cart-column">
                        <figure class="shopping-cart-image-container">
                            <img src="<?php echo($foto_prato)?>" alt="Nome do Prato">
                        </figure>
                    </div>
                    <div class="shopping-cart-column">
                        <h2 class="padding-bottom-5px"><?php echo($titulo)?></h2>
                        <h3 class="padding-bottom-15px">Categoria: <?php echo($categoria)?></h3>
                    </div>
                    <div class="shopping-cart-column align">
                        <span id="shopping-cart-price">R$ <?php echo(number_format($preco, 2, ",", "."))?></span>
                    </div>
                    <div class="shopping-cart-column align">
                        <span id="shopping-cart-qty" style="color: #9CC283;"><?php echo($quantidade)?></span>
                    </div>
                    <div class="shopping-cart-column align">
                        <span id="shopping-cart-price-total">R$ <?php echo(number_format($subtotal, 2, ",", ".")) ?></span>
                    </div>
                </div>
                <?php
                    }
                ?>
            </section>
        </div>
	</section>
	<div class="generic-modal animate fadeIn" id="abrir">
        <article class="generic-modal-wrapper width-500px">

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
        });
    </script>
	<?php if ($pagamentoRecusado) { ?>
	    <div class="modal display-flex" id="modal-recusado">
            <div class="popup-confirm" style="max-width: 500px;">
                <h2 class="padding-top-30px padding-bottom-15px" style="font-size: 21px; font-family: 'Roboto Medium'; color: #000; text-align: center;">PEDIDO RECUSADO</h2>
                <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Seu cartão de crédito foi recusado! Tente novamente.</span>
                <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
                    <div onclick="$('#modal-recusado').remove()" class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
                        <span>Ok</span>
                    </div>
                </div>
            </div>
        </div>
    <?php }elseif ($concluido) { ?>
        <div class="modal display-flex" id="modal-carrinho">
            <div class="popup-confirm">
                <h2 class="padding-top-30px padding-bottom-15px" style="font-size: 21px; font-family: 'Roboto Medium'; color: #000; text-align: center;">PEDIDO REALIZADO</h2>
                <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Isso aí! Compra finalizada!</span>
                <figure style="width: 90%; max-width: 180px;" class="margin-left-auto margin-right-auto padding-bottom-30px">
                    <img src="assets/images/logo/logo-4fit.svg" alt="Logo" style="max-width: 100%; object-fit: cover; display: block; max-height: 100%;">
                </figure>
                <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Você pode visualizar seus pedidos em Meus Pedidos</span>
                <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
                    <a href="index.php" class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
                        <span>Finalizar</span>
                    </a>
                </div>
            </div>
        </div>
    <?php }elseif ($unset) {
        unset($_SESSION['carrinho']);
        unset($_SESSION['itens-carrinho']);
        unset($_SESSION['valor-carrinho']);
        unset($_SESSION['desconto-carrinho']);
        unset($_SESSION['last_id']);
        } 
    ?>
</body>
</html>