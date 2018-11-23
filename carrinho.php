<?php
    session_start();
    require_once('modulo.php');
    validateLog();

    $total = $_SESSION['itens-carrinho'];

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

                     $_SESSION['carrinho']['total'] = $_SESSION['carrinho']['total'] + $n;

                     $pedidoDAO->insertOrdem($classPedido);
                }else{
                    unset($_SESSION['carrinho'][$id]);
                }
            }
            $pedidoDAO->insertOrdem($classPedido);
        }
//        }elseif($_GET['btn-comprar'] == "Atualizar"){
//            foreach($_GET['quantidade'] as $id => $qtd){
//                $id  = intval($id);
//                $qtd = intval($qtd);
//
//                if(!empty($qtd) || $qtd <> 0){
//                     $_SESSION['carrinho'][$id]['quantidade'] = $qtd;
//
//                     $qty = $_SESSION['carrinho'][$id]['quantidade'];
//                     $preco = $_SESSION['carrinho'][$id]['preco'];
//
//                     $subtotal = $qty * $preco;
//
//                     $_SESSION['carrinho'][$id]['subtotal'] = $subtotal;
//
//                     $n = $_SESSION['carrinho'][$id]['subtotal'];
//                     //var_dump($n);
//
//                     $a = $_SESSION['carrinho'][$id]['id_prato'];
//                     //var_dump($a);
//
//                     $_SESSION['carrinho']['total'] = $_SESSION['carrinho']['total'] + $n;
//
//                     header('location:carrinho.php');
//                }else{
//                    unset($_SESSION['carrinho'][$id]);
//                }
//            }
//        }
    }elseif(isset($_POST['btn-cupom'])){
        require_once('cms/models/descontoClass.php');
        require_once('cms/models/DAO/descontoDAO.php');

        $classDesconto = new Desconto();
        $codig_cupom = $_POST['codig_cupom'];

        $descontoDAO = new descontoDAO();
        if($_POST['btn-cupom'] == "Cupom"){
            if($descontoDAO->selectCodigo($codig_cupom)){
                echo('<script>alert("Processado!");</script>');
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
                <section class="shopping-cart-grid">
                    <?php
                        require_once("cms/models/DAO/pratosDAO.php");

                        $pratosDAO = new pratosDAO();

                        foreach(@$_SESSION['carrinho'] as $key => $value) {
                            $id_prato = $value['id_prato'];
                            $titulo = $value['titulo'];
                            $preco = $value['preco'];
                            $foto_prato = $value['foto_prato'];
                            $quantidade = $value['quantidade'];
                            $subtotal = $value['subtotal'];
                            $total = $_SESSION['carrinho']['total'];
                    ?>
                    <input type="hidden" name="id_prato[]" id="id_prato" value="<?php echo($id_prato)?>">
                    <input type="hidden" name="preco[<?php echo($id_prato);?>]" id="preco" value="<?php echo($preco)?>">
                    <input type="hidden" name="subtotal[<?php echo($id_prato);?>]" id="subtotal" value="<?php echo($subtotal)?>">
                    <div class="shopping-cart-row" data-quantidade>
                        <div class="shopping-cart-column">
                            <figure class="shopping-cart-image-container">
                                <img src="<?php echo($foto_prato)?>" alt="Nome do Prato">
                            </figure>
                        </div>
                        <div class="shopping-cart-column align-flex-start">
                            <h4 onclick="javascript:location.href='carrinho.php?modo=excluir&id=<?php echo($id_prato)?>'">Remover<h4>
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
                                <input class="input-number" type="number" name="quantidade[<?php echo($id_prato);?>]" value="<?php echo($quantidade)?>" min="1" max="100">
                                <div class="input-group-button">
                                    <span class="input-number-increment" data-f4f-number-increment>+</span>
                                </div>
                            </div>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price-total">R$ <?php echo($subtotal)?></span>
                        </div>
                    </div>
                    <div class="shopping-cart-separator"></div>
                    <?php
                        }
                    ?>
                </section>
                <div id="shopping-cart-select-block">
                    <span onclick="javascript:location.href='carrinho.php?clean'">Excluir Tudo</span>
                    <button onclick="carrinho('atualizar')" name="btn-comprar" value="Atualizar" class="btn-generic margin-left-30px">
                        <span>Atualizar</span>
                    </button>
                </div>
                <div id="shopping-cart-confirm-column-two">
                    <h2 class="padding-right-30px padding-top-30px padding-bottom-30px">Total a Pagar: <span>R$ <?php echo($total)?></span></h2>
                    <button onclick="carrinho('comprar')" name="btn-comprar" value="Comprar" class="btn-generic margin-right-30px">
                        <span>Comprar</span>
                    </button>
                </div>
            </div>
        </form>
        <div id="shopping-cart-confirm-block" class="padding-bottom-30px">
            <form action="carrinho.php" method="POST" name="frmdesconto" class="width-100">
                <div id="shopping-cart-confirm-column-one">
                    <h2 class="padding-left-30px padding-top-30px padding-bottom-15px">Cupom de Desconto</h2>
                    <p class="padding-bottom-15px padding-left-30px">Digite o seu cupom de desconto para receber um desconto<br>no seu valor total do pedido. Múltiplos cupons não serão aplicados.</p>
                    <div style="display: flex;">
                        <input class="margin-left-30px" name="codig_cupom" type="text" style="width: 350px; border: none; outline: none; height: 40px; background-color: #E8E8E8; border-radius: 5px; text-indent: 12px; font-family: 'Roboto Medium Italic';" placeholder="Digite o cupom...">
                        <button name="btn-cupom" value="Cupom" type="submit" class="btn-generic margin-left-15px">
                            <span>Processar</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
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

        function carrinho(pcaminho){

        if(pcaminho=1)
            document.forms[0].action = "carrinho.php?btn-comprar=Atualizar";
            document.forms[0].submit();
        if(pcaminho=2)
            document.forms[0].action = "carrinho.php?btn-comprar=Comprar";

            document.forms[0].submit();

        }
    </script>
</body>
</html>
