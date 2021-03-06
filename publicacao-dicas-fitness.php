<?php
    session_start();
    if(isset($_GET['publication'])){
        $id = $_GET['id'];
        $_SESSION['id_dica_fitness'] = $id;
        require_once('cms/models/dicas-fitnessClass.php');
        require_once('cms/models/DAO/dicas-fitnessDAO.php');

        $dicasFitnessDAO = new dicasFitnessDAO;
        $listDicasFitness = $dicasFitnessDAO->selectDoubleId($id);

        //Resgatando do Banco de dados
        //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
        if(@count($listDicasFitness)>0)
        {
            $id = $listDicasFitness->id;
            $id_funcionario = $listDicasFitness->id_funcionario;
            $titulo = $listDicasFitness->titulo;
            $texto = $listDicasFitness->texto;
            $data = $listDicasFitness->data;
            $email = $listDicasFitness->email;
            $autor = $listDicasFitness->autor;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo($titulo)?> - Food 4Fit</title>
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
	<script src="assets/js/scripts.js"></script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
        <header class="publication-header">
            <figure>
                <img src="assets/images/backgrounds/fitsession/img1.jpg" alt="Título da Publicação">
            </figure>
            <h2 class="padding-left-50px padding-top-30px"><?php echo($titulo)?></h2>
            <span class="padding-left-50px padding-bottom-10px">Autor: <b><?php echo($autor)?></b></span>
            <span class="padding-left-50px padding-bottom-30px">Data da Postagem: <b><?php echo($data)?></b></span>
        </header>
        <div class="publication-text-block">
            <?php
                require_once("cms/models/DAO/personal-fitnessDAO.php");

                $personalFitnessDAO = new personalFitnessDAO();

                $lista = $personalFitnessDAO->selectId($id);

                if(@count($lista)>0){
            ?>
            <p><?php echo($lista->texto)?></p>
            <?php
                }
            ?>
        </div>
        <form action="dicas-fitness.php" method="POST" name="frmcomentario" class="form-generic-content width-100 border-30px">
            <h2 class="form-title">Faça um comentário:</h2>
            <input type="hidden" name="id_dica_fitness" value="<?php echo($_SESSION['id_dica_fitness'])?>">

            <label for="assunto" class="label-generic">Assunto:</label>
            <input class="input-generic" type="text" name="assunto" id="assunto">

            <label for="texto" class="label-generic">Comente Algo:</label>
            <textarea class="textarea-generic" type="text" name="texto" id="texto"></textarea>
            <div class="form-row">
                <span>Cancelar</span>
                <button type="submit" name="btn-salvar" value="Salvar" class="btn-generic margin-left-20px">
                    <span>Enviar</span>
                </button>
            </div>
        </form>
        <article class="comments-post-wrapper width-100 border-30px">
            <h2>Todos os Comentários</h2>
            <?php
                require_once("cms/models/DAO/comentario-postDAO.php");

                $comentarioPostDAO = new comentarioPostDAO();

                $lista = $comentarioPostDAO->selectAll($_SESSION['id_dica_fitness']);

                for($i = 0; $i < count($lista); $i++){
            ?>
            <div class="comments-post-row animate fadeIn border-30px margin-top-30px">
                <div class="comments-post-row-infos">
                    <figure>
                        <img src="assets/images/icons/person.jpg" alt="<?php echo($lista[$i]->nome)?>" title="<?php echo($lista[$i]->nome)?>">
                    </figure>
                    <h3 class="margin-left-20px"><?php echo($lista[$i]->nome)?><br/><span><?php echo($lista[$i]->email)?></span></h3>
                </div>
                <div class="comments-post-row-content margin-top-30px">
                    <h4 class="margin-left-20px padding-bottom-5px"><?php echo($lista[$i]->assunto)?></h4>
                    <p class="margin-left-20px"><?php echo($lista[$i]->texto)?></p>
                    <span class="margin-left-20px padding-top-20px">Enviado em <?php echo($lista[$i]->data)?></span>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="margin-right-auto margin-left-auto margin-bottom-30px margin-top-30px btn-generic" id="see-more">
                <span>Ver Mais</span>
            </div>
        </article>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
	<script>
        (function($) {
            //Setamos o valor inicial
            var count = 2;
            var i = null;

            //escondemos todos os elementos maior que o valor inicial
            $(".comments-post-row").slice(count).hide();

            $('#see-more').click(function() {

                //Somamos a quantidade nova a ser exibida
                count += 5;

                //Rodamos o loop no valor total
                for (i = 0; i < count; i++) {
                    //Mostramos o item
                    $('.comments-post-row').eq(i).show();
                }
            });

        }(jQuery));
    </script>
</body>
</html>
<?php
        }else{
            header('location:404.php');
        }
    }
?>
