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
            $_SESSION['itens-carrinho'] = array("id_prato"=>$_GET['id_prato'], "titulo"=>$_GET['titulo'], "preco"=>$_GET['preco'], "subtotal"=>$_GET['preco'], "id_categoria_prato"=>$_GET['id_categoria_prato'], "foto_prato"=>$_GET['foto_prato'], "quantidade"=>$_GET['quantidade'], "categoria"=>$_GET["categoria_prato"]);
            $id = $_GET['id_prato'];
            //Verifica se a variavel de sessão id do carrinho não existe
            if(!isset($_SESSION['carrinho'][$id])){
                //Se não existir, cria uma
                $_SESSION['carrinho'][$id] = $_SESSION['itens-carrinho'];
                header("location:carrinho.php");
            }else{
                header("location:carrinho.php");
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
        for($index = 0; $index < @count($lista); $index++){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo($lista[$index]->titulo)?> - Food 4fit</title>
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
                <img src="<?php echo($lista[$index]->foto)?>" alt="Nome do Prato" id="product-view-image">
            </figure>
            <article id="product-view-info-container">
                <form action="prato.php" method="GET" name="frmcompra">
                    <h2 id="product-view-dish-name" class="padding-left-30px padding-bottom-5px"><?php echo($lista[$index]->titulo)?></h2>
                    <span id="product-view-dish-code" class="padding-left-30px">código do produto: <?php echo($lista[$index]->id)?></span>
                    <div class="avaliation-stars padding-top-15px padding-left-30px padding-bottom-30px">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                        <img src="assets/images/icons/star.svg" class="avaliation-stars-image" alt="Star">
                    </div>
                    <span id="product-view-price" class="padding-left-30px padding-bottom-5px">R$ <?php echo($lista[$index]->preco)?></span>
                    <span id="product-view-price-descrip" class="padding-left-30px padding-bottom-30px">Em 12x sem juros no cartão de <b>R$ 00,00</b></span>

                    <h3 id="product-view-price-full" class="padding-left-30px">R$ <?php echo($lista[$index]->preco)?> <span>à vista</span></h3>
                    <div id="credit-card-flag" class="padding-left-30px padding-top-15px padding-bottom-30px">
                        <img src="assets/images/icons/credit-card.svg" alt="Bandeira">
                    </div>

                    <input type="hidden" name="acao" id="acao" value="add">
                    <input type="hidden" name="id_prato" value="<?php echo($id_prato)?>" id="id_prato">
                    <input type="hidden" name="id_categoria_prato" id="id_categoria_prato" value="<?php echo($lista[$index]->idCategoria)?>">
                    <input type="hidden" name="categoria_prato" id="categoria_prato" value="<?php echo($lista[$index]->categoria)?>">
                    <input type="hidden" name="titulo" id="titulo" value="<?php echo($lista[$index]->titulo)?>">
                    <input type="hidden" name="preco" id="preco" value="<?php echo($lista[$index]->preco)?>">
                    <input type="hidden" name="quantidade" id="quantidade" value="1">
                    <input type="hidden" name="foto_prato" id="foto_prato" value="<?php echo($lista[$index]->foto)?>">


                    <button type="submit" name="btn-addcart" value="Adicionar" class="buy-button margin-left-30px">
                        <span class="padding-right-5px">Comprar</span>
                        <div class="buy-button-image">
                            <img src="assets/images/icons/shopping-cart-white.svg" alt="Comprar">
                        </div>
                    </button>
                </form>
            </article>
        </div>
        <section id="product-view-info-block" class="margin-top-60px margin-bottom-30px">
            <div class="product-view-info-column">
                <h2 class="product-view-info-column-title margin-left-30px margin-bottom-15px">Ingredientes</h2>
                <ul class="product-view-info-column-list margin-left-30px">
                    <?php
                        require_once('cms/models/DAO/prato-ingredienteDAO.php');

                        $pratoIngredienteDAO = new pratoIngredienteDAO();

                        $listaIngredientes = $pratoIngredienteDAO->selectAllIngredientes($_GET['id_prato']);
                        for($i = 0; $i < @count($listaIngredientes); $i++){
                    ?>
                    <li><?php echo($listaIngredientes[$i]->titulo)?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="product-view-info-column">
                <h2 class="product-view-info-column-title margin-left-30px margin-bottom-15px">Categoria:</h2>
                <span class="margin-left-30px weight"><?php echo($lista[$index]->categoria)?></span>

                <h2 class="product-view-info-column-title margin-top-30px margin-left-30px margin-bottom-15px">Peso/Líquido:</h2>
                <span class="weight margin-left-30px">0,00 mg/kg</span>
                <span class="weight margin-left-30px margin-top-5px">000 L/mL</span>
            </div>
            <div class="product-view-info-column">
                <h2 class="product-view-info-column-title margin-left-30px margin-bottom-15px">Informações Nutricionais</h2>
                <ul class="product-view-info-column-list margin-left-30px">
                    <?php
                        require_once('cms/models/DAO/prato-ingredienteDAO.php');

                        $pratoIngredienteDAO = new pratoIngredienteDAO();

                        $listaNutrientes = $pratoIngredienteDAO->selectAllNutrientes($_GET['id_prato']);
                        for($j = 0; $j < @count($listaNutrientes); $j++){
                    ?>
                    <li><b>Valor Energético:</b> <?php echo(number_format($listaNutrientes[$j]->valor_energ, 2, ",", "."))?></li>
                    <li><b>Carboidratos:</b> <?php echo(number_format($listaNutrientes[$j]->carboidratos, 2, ",", "."))?> g</li>
                    <li><b>Proteínas:</b> <?php echo(number_format($listaNutrientes[$j]->proteinas, 2, ",", "."))?> g</li>
                    <li><b>Gorduras Totais:</b> <?php echo(number_format($listaNutrientes[$j]->gordura_total, 2, ",", "."))?> g</li>
                    <li><b>Gorduras Saturadas:</b> <?php echo(number_format($listaNutrientes[$j]->gordura_saturada, 2, ",", "."))?> g</li>
                    <li><b>Gorduras trans:</b> <?php echo(number_format($listaNutrientes[$j]->gordura_trans, 2, ",", "."))?> g</li>
                    <li><b>Fibra Alimentar:</b> <?php echo(number_format($listaNutrientes[$j]->fibra_alimentar, 2, ",", "."))?> g</li>
                    <li><b>Sódio:</b> <?php echo(number_format($listaNutrientes[$j]->sodio, 2, ",", "."))?> mg</li>
                    <?php } ?>
                </ul>
            </div>
        </section>
        <!-- <section id="product-view-comments-block">
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
        </section> -->
	</div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
<?php
        }
    }
?>
