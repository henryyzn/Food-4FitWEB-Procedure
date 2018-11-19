<?php
    session_start();
    require_once("modulo.php");

    $id = null;
    $titulo = null;
    $categoria = null;
    $preco = null;
    $foto = null;

    //Verifica se o botão de adicionar ao carrinho existe, no caso, se foi clicado
    if(!isset($_SESSION['carrinho'])){
          $_SESSION['carrinho'] = array();
    }
    if(isset($_GET['acao'])){
        if($_GET['acao'] == 'add'){
            $_SESSION['itens-carrinho'] = array("id_prato"=>$_GET['id_prato'], "titulo"=>$_GET['titulo'], "preco"=>$_GET['preco'], "id_categoria_prato"=>$_GET['id_categoria_prato'], "foto_prato"=>$_GET['foto_prato'], "quantidade"=>$_GET['quantidade']);
            $id = $_GET['id_prato'];
            //Verifica se a variavel de sessão id do carrinho não existe
            if(!isset($_SESSION['carrinho'][$id])){
                //Se não existir, cria uma
                $_SESSION['carrinho'][$id] = $_SESSION['itens-carrinho'];
                header("location:carrinho.php");
            }else{
                header("location:carrinho.php");
            }
        }elseif($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho'][$id])){
                //unset($_SESSION['carrinho'][$id]);
                echo($id);
            }
        }
    }
    if(isset($_GET['id_prato'])){
        $id_prato = $_GET['id_prato'];
        if($id_prato == null || ''){
            header("location:404.php");
        }

        require_once('cms/models/DAO/pratosDAO.php');

        $pratosDAO = new pratosDAO;

        $lista = $pratosDAO->selectAllById($id_prato);

        for($i = 0; $i < @count($lista); $i++){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo($lista[$i]->titulo)?> - Food 4fit</title>
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
	<script src="assets/public/js/jquery.elevatezoom-3.0.8.min.js"></script>
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.php") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <div class="main">
<!--
        <div id="breadcrumb" class="product-view">
            <span>
                <a href="#">Pratos para ganhar massa</a>
                <a href="#">Pratos brasileiros</a>
                <a href="#">Pratos nordestinos</a>
            </span>
        </div>
-->
        <div id="product-view-block">
            <figure id="product-view-image-container">
                <img src="<?php echo($lista[$i]->foto)?>" alt="Nome do Prato" id="product-view-image">
                <div id="product-view-image-carrousel">
                    <div class="next-image" style="border-bottom-left-radius: 10px;">
                        <img src="assets/images/dishs/img1.jpg" alt="Mais Imagens">
                    </div>
                    <div class="next-image">
                        <img src="assets/images/dishs/img1.jpg" alt="Mais Imagens">
                    </div>
                    <div class="next-image">
                        <img src="assets/images/dishs/img1.jpg" alt="Mais Imagens">
                    </div>
                    <div class="next-image" style="border-bottom-right-radius: 10px;">
                        <img src="assets/images/dishs/img1.jpg" alt="Mais Imagens">
                    </div>
                </div>
            </figure>
            <article id="product-view-info-container">
                <form action="prato.php" method="GET" name="frmcompra">
                    <h2 id="product-view-dish-name" class="padding-left-30px padding-bottom-5px"><?php echo($lista[$i]->titulo)?></h2>
                    <span id="product-view-dish-code" class="padding-left-30px">código do produto: <?php echo($lista[$i]->id)?></span>
                    <div class="avaliation-stars padding-top-15px padding-left-30px padding-bottom-30px">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                    </div>
                    <span id="product-view-price" class="padding-left-30px padding-bottom-5px">R$ <?php echo($lista[$i]->preco)?></span>
                    <span id="product-view-price-descrip" class="padding-left-30px padding-bottom-30px">Em 12x sem juros no cartão de <b>R$ 00,00</b></span>

                    <h3 id="product-view-price-full" class="padding-left-30px">R$ 000,00 <span>à vista</span></h3>
                    <div id="credit-card-flag" class="padding-left-30px padding-top-15px padding-bottom-30px">
                        <img src="assets/images/icons/credit-card.svg" alt="Bandeira">
                    </div>

                    <input type="hidden" name="acao" id="acao" value="add">
                    <input type="hidden" name="id_prato" value="<?php echo($id_prato)?>" id="id_prato">
                    <input type="hidden" name="id_categoria_prato" id="id_categoria_prato" value="1">
                    <input type="hidden" name="titulo" id="titulo" value="Teste">
                    <input type="hidden" name="preco" id="preco" value="200.00">
                    <input type="hidden" name="quantidade" id="quantidade" value="1">
                    <input type="hidden" name="foto_prato" id="foto_prato" value="<?php echo($lista[$i]->foto)?>">


                    <button type="submit" name="btn-addcart" value="Adicionar" class="buy-button margin-left-30px">
                        <span class="padding-right-5px">Comprar</span>
                        <div class="buy-button-image">
                            <img src="assets/images/icons/shopping-cart-white.svg" alt="Comprar">
                        </div>
                    </button>
                    <div class="social-share padding-top-30px padding-left-30px">
                        <img src="assets/images/icons/facebook-color.svg" alt="Compartilhar no Facebook">
                        <img src="assets/images/icons/twitter-color.svg" alt="Compartilhar no Twitter">
                        <img src="assets/images/icons/share.svg" alt="Obter link compartilhável">
                    </div>
                </form>
            </article>
        </div>
        <section id="product-view-info-block" class="margin-top-60px margin-bottom-30px">
            <div class="product-view-info-column">
                <h2 class="product-view-info-column-title margin-left-30px margin-bottom-15px">Ingredientes</h2>
                <ul class="product-view-info-column-list margin-left-30px">
                    <li>Item 1</li>
                    <li>Item 2</li>
                    <li>Item 3</li>
                    <li>Item 4</li>
                    <li>Item 5</li>
                    <li>Item 6</li>
                    <li>Item 7</li>
                </ul>
            </div>
            <div class="product-view-info-column">
                <h2 class="product-view-info-column-title margin-left-30px margin-bottom-15px">Categoria:</h2>
                <span class="margin-left-30px weight">Nome da Categoria</span>

                <h2 class="product-view-info-column-title margin-top-30px margin-left-30px margin-bottom-15px">Peso/Líquido:</h2>
                <span class="weight margin-left-30px">0,00 mg/kg</span>
                <span class="weight margin-left-30px margin-top-5px">000 L/mL</span>
            </div>
            <div class="product-view-info-column">
                <h2 class="product-view-info-column-title margin-left-30px margin-bottom-15px">Informações Nutricionais</h2>
                <ul class="product-view-info-column-list margin-left-30px">
                    <li><b>Valor Energético:</b> 000 kcal = 000 kJ</li>
                    <li><b>Carboidratos:</b> 000 g</li>
                    <li><b>Proteínas:</b> 000 g</li>
                    <li><b>Gorduras Totais:</b> 000 g</li>
                    <li><b>Gorduras Saturadas:</b> 000 g</li>
                    <li><b>Gorduras trans:</b> 000 g</li>
                    <li><b>Fibra Alimentar:</b> 000 g</li>
                    <li><b>Sódio:</b> 000 mg</li>
                </ul>
            </div>
        </section>
        <section id="product-view-comments-block">
            <h2 id="product-view-comments-title" class="padding-bottom-15px">Comentários:</h2>
            <div class="comment-row margin-top-15px margin-bottom-15">
                <div class="comment-row-image" style="margin-top: 30px;">
                    <img src="assets/images/icons/person.jpg" alt="Nome da Pessoa">
                </div>
                <div class="comment-row-info">
                    <h2 class="padding-left-30px padding-top-30px padding-bottom-15px">Nome</h2>
                    <p class="padding-left-30px padding-bottom-30px">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                    <span class="padding-left-30px padding-bottom-30px">Postado em 01/01/2018</span>
                </div>
            </div>
        </section>
	</div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
<?php
        }
    }
?>
