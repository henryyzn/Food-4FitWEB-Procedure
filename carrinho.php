<?php
    session_start();
    require_once('modulo.php');
    validateLog();

    $total = @$_SESSION['itens-carrinho'];
    $_SESSION["valor-carrinho"] = 0;
    $cupom = null;

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
            foreach($_GET['quantidade'] as $id => $qtd){
                $id  = intval($id);
                $qtd = intval($qtd);

                if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho'][$id]['quantidade'] = $qtd;

                     $qty = $_SESSION['carrinho'][$id]['quantidade'];
                     $preco = $_SESSION['carrinho'][$id]['preco'];

                     $subtotal = $qty * $preco;

                     $_SESSION['carrinho'][$id]['subtotal'] = $subtotal;

                     $n = $_SESSION['carrinho'][$id]['subtotal'];
                     //var_dump($n);

                     $a = $_SESSION['carrinho'][$id]['id_prato'];
                     //var_dump($a);

                     $_SESSION['valor-carrinho'] += $n;
                }else{
                    unset($_SESSION['carrinho'][$id]);
                }
            }
            $pedidoDAO->insertOrdem($classPedido);
        }
    }elseif(isset($_POST['btn-cupom'])){
        require_once('cms/models/descontoClass.php');
        require_once('cms/models/DAO/descontoDAO.php');

        $classDesconto = new Desconto();
        $codig_cupom = $_POST['codig_cupom'];

        $descontoDAO = new descontoDAO();
        if($_POST['btn-cupom'] == "Cupom"){
            if($cupom = $descontoDAO->selectCodigo($codig_cupom)){
                $_SESSION["desconto-carrinho"] = $cupom->valor;
            }else{
                echo('<script>alert("Este cupom não existe ou não é mais válido.");</script>');
            }
        }
    }elseif(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        $id = $_GET['id'];
        if($modo == 'excluir'){
            unset($_SESSION['carrinho'][$id]);
            header('location:carrinho.php');
        }
    }elseif(isset($_GET['clean'])){
        unset($_SESSION['carrinho']);
        unset($_SESSION['itens-carrinho']);
        unset($_SESSION['last_id']);
        unset($_SESSION['valor-carrinho']);
        unset($_SESSION["desconto-carrinho"]);
        header('location:carrinho.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php //var_dump($_SESSION['carrinho']);?>
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
        .input-group-button{
            background: #9CC283;
            border-radius: 5px;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
        }
    </style>
</head>
<body>
	<?php require_once("components/navbar.php") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
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
                <div class="shopping-cart-grid">
                    <?php
                        require_once("cms/models/DAO/pratosDAO.php");

                        $pratosDAO = new pratosDAO();

                        if (isset($_SESSION['carrinho'])) {
                            foreach($_SESSION['carrinho'] as $key => $value) {
                                $id_prato = $value['id_prato'];
                                $titulo = $value['titulo'];
                                $categoria = $value['categoria'];
                                $preco = $value['preco'];
                                $foto_prato = $value['foto_prato'];
                                $quantidade = $value['quantidade'];
                                $subtotal = $value['subtotal'];
                    ?>
                    <div class="shopping-cart-row">
                        <input type="hidden" name="id_prato[]" id="id_prato" value="<?php echo($id_prato)?>">
                        <input type="hidden" name="preco[<?php echo($id_prato);?>]" class="preco" value="<?php echo($preco)?>">
                        <input type="hidden" name="subtotal[<?php echo($id_prato);?>]" class="subtotal" value="<?php echo($subtotal)?>">
                        <div class="shopping-cart-column">
                            <figure class="shopping-cart-image-container">
                                <img src="<?php echo($foto_prato)?>" alt="Nome do Prato">
                            </figure>
                        </div>
                        <div class="shopping-cart-column align-flex-start">
                            <div class="btn-generic margin-bottom-20px" onclick="javascript:location.href='carrinho.php?modo=excluir&id=<?php echo($id_prato)?>'"><span>Remover</span></div>
                            <h2 class="padding-bottom-5px"><?php echo($titulo)?></h2>
                            <h3 class="padding-bottom-15px">Categoria: <?php echo($categoria)?></h3>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price">R$ <?php echo(number_format($preco, 2, ",", "."))?></span>
                        </div>
                        <div class="shopping-cart-column align-y">
                            <div class="input-group input-number-group" data-contador>
                                <div class="input-group-button">
                                    <span class="input-number-decrement" data-remover>-</span>
                                </div>
                                <input readonly class="input-number" type="number" name="quantidade[<?php echo($id_prato);?>]" value="<?php echo($quantidade)?>" min="1" max="100">
                                <div class="input-group-button">
                                    <span class="input-number-increment" data-adicionar>+</span>
                                </div>
                            </div>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price-total">R$ <?php echo(number_format($subtotal, 2, ",", "."))?></span>
                        </div>
                    </div>
                    <div class="shopping-cart-separator"></div>
                    <?php
                            }
                        }
                    ?>
                </div>
                <div class="btn-generic margin-left-30px" id="shopping-cart-select-block">
                    <span onclick="javascript:location.href='carrinho.php?clean'">Excluir Tudo</span>
                </div>
                <div id="shopping-cart-confirm-column-two">
                    <h2 class="padding-right-30px padding-top-30px">
                        Total a Pagar: <span id="total-pagar">R$ <?php echo(number_format($_SESSION['valor-carrinho'], 2, ",", "."));?></span>
                    </h2>
                    <?php if (isset($_SESSION["desconto-carrinho"])) { ?>
                        <span class="padding-right-30px" style="font-size: 12px;"><br>Desconto de <?php echo($_SESSION["desconto-carrinho"]); ?>%</span>
                    <?php } ?>
                    
                    <button onclick="carrinho('comprar')" name="btn-comprar" value="Comprar" class="margin-top-30px btn-generic margin-right-30px">
                        <span>Comprar</span>
                    </button>
                </div>
            </div>
        </form>
        <?php if (!isset($_SESSION["desconto-carrinho"])) { ?>
            <div id="shopping-cart-confirm-block" class="padding-bottom-30px">
                <form action="carrinho.php" method="POST" name="frmdesconto" class="width-100">
                    <div id="shopping-cart-confirm-column-one">
                        <h2 class="padding-left-30px padding-top-30px padding-bottom-15px">Cupom de Desconto</h2>
                        <p class="padding-bottom-15px padding-left-30px">Digite o seu cupom de desconto para receber um desconto<br>no seu valor total do pedido. Múltiplos cupons não serão aplicados.</p>
                        <div style="display: flex;">
                            <input class="margin-left-30px" name="codig_cupom" type="text" style="width: 350px; border: none; outline: none; height: 40px; background-color: #E8E8E8; border-radius: 5px; text-indent: 12px; font-family: 'Roboto Medium Italic';" placeholder="Digite o cupom..." autocomplete="off">
                            <button name="btn-cupom" value="Cupom" type="submit" class="btn-generic margin-left-15px">
                                <span>Processar</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
	</section>
	<?php if ($cupom) { ?>
	    <div class="modal display-flex" id="modal-cupom">
            <div class="popup-confirm padding-left-30px padding-right-30px" style="max-width: 500px;">
                <h2 class="padding-top-30px padding-bottom-15px" style="font-size: 21px; font-family: 'Roboto Medium'; color: #000; text-align: center;">CUPOM ATIVADO</h2>
                <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center; ">Você ativou o cupom <strong><?php echo($cupom->titulo) ?></strong> e ganhou <strong><?php echo($cupom->valor) ?>%</strong> de desconto! Aproveite!.</span>
                <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
                    <a href="carrinho.php" class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
                        <span>Ok</span>
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
	<script>
        $("[data-contador]").each(function () {
            var inputQuantidade = $(this).find("input");
            var inputSubtotal = $(this).closest(".shopping-cart-row").find(".subtotal");
            var inputPreco = $(this).closest(".shopping-cart-row").find(".preco");
            var textPreco = $(this).closest(".shopping-cart-row").find("#shopping-cart-price-total");
            
            $(this).on("click", "[data-adicionar], [data-remover]", function () {
                var number = parseInt(inputQuantidade.val());
                if ($(this).is("[data-adicionar]")) {
                    number += 1;
                } else {
                    number -= 1;
                }

                number = Math.max(1, Math.min(1000, number));
                inputQuantidade.val(number);
                var total = number * parseFloat(inputPreco.val());
                inputSubtotal.val(total);
                textPreco.text("R$ " + total.toFixed(2).replace(".", ",").replace(/\d(?=(\d{3})+,)/g, "$&."));
                atualizarTotal();
            });
        });
        
        function atualizarTotal() {
            var total = 0;
            $(".shopping-cart-row").each(function() {
                total += parseFloat($(this).find(".subtotal").val()); 
            });
            
            $("#total-pagar").text("R$ " + total.toFixed(2).replace(".", ",").replace(/\d(?=(\d{3})+,)/g, "$&."));
        }

        function carrinho(pcaminho){

            if(pcaminho=1){
                document.forms[0].action = "carrinho.php?btn-comprar=Atualizar";
                document.forms[0].submit();
            }
            if(pcaminho=2){
                document.forms[0].action = "carrinho.php?btn-comprar=Comprar";
                document.forms[0].submit();
            }
        }
        
        atualizarTotal();
    </script>
</body>
</html>
