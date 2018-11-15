<?php

    session_start();
    require_once('modulo.php');
    validateLog();
    if(isset($_POST['btn-comprar'])){
        echo("<script>alert('teste');</script>");
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
</head>
<body>
	<?php require_once("components/navbar.html") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h2 id="page-title" class="margin-left-auto margin-right-auto margin-bottom-30px">MEU CARRINHO</h2>
        <form action="carrinho.php" method="POST" name="frmcarrinho" style="width: 100%;">
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
                        echo ($_SESSION['shoppingcart'][$id]);
//                        require_once("cms/models/DAO/enderecoDAO.php");
//
//                        $enderecoDAO = new enderecoDAO();
//
//                        $lista = $enderecoDAO->selectAll();
//
//                        for($i = 0; $i < count($lista); $i++){
                    ?>
                    <div class="shopping-cart-row">
                        <div class="shopping-cart-column">
                            <figure class="shopping-cart-image-container">
                                <img src="assets/images/dishs/img1.jpg" alt="Nome do Prato">
                            </figure>
                        </div>
                        <div class="shopping-cart-column align-flex-start">
                            <div class="switch_box margin-bottom-15px">
                                <input type="checkbox" name="chkdish" class="switch-styled">
                            </div>
                            <h2 class="padding-bottom-5px">Nome do Prato</h2>
                            <h3 class="padding-bottom-15px">Categoria: Nome da Categoria</h3>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price">R$ 000,00</span>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <div class="input-group input-number-group">
                                <div class="input-group-button">
                                    <span class="input-number-decrement" >-</span>
                                </div>
                                <input class="input-number" type="number" value="1" min="1" max="1000">
                                <div class="input-group-button">
                                    <span class="input-number-increment">+</span>
                                </div>
                            </div>
                        </div>
                        <div class="shopping-cart-column align-x">
                            <span id="shopping-cart-price-total">R$ 000,00</span>
                        </div>
                    </div>
                    <div class="shopping-cart-separator"></div>
                    <?php
//                        }
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
	<div class="modal" id="modal-carrinho">
        <div class="popup-confirm">
            <h2 class="padding-top-30px padding-bottom-15px" style="font-size: 21px; font-family: 'Roboto Medium'; color: #000; text-align: center;">PEDIDO REALIZADO</h2>
            <span class="padding-bottom-15px" style="display: block; font-size: 16px; font-family: 'Roboto Medium'; color: #282828; text-align: center;">Isso aí! Compra finalizada!</span>
            <figure style="width: 90%; max-width: 180px;" class="margin-left-auto margin-right-auto padding-bottom-30px">
                <img src="" alt="Logo" style="max-width: 100%; object-fit: cover; display: block; max-height: 100%;">
            </figure>
            <span class="padding-bottom-15px cart-descript">Você pode visualizar seus pedidos em Meus Pedidos</span>
            <div style="width: 100%; display: flex; align-items: center; justify-content: flex-end;">
                <a href="index.php" class="padding-right-15px" style="text-decoration: none; font-size: 18px; font-family: 'Roboto Medium Italic'; color: #7F7F7F;">Retornar à página inicial</a>
                <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px">
                    <span>Finalizar</span>
                </div>
            </div>
        </div>
    </div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
