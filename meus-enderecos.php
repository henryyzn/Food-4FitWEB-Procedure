<?php

    session_start();
    require_once('modulo.php');
    validateLog();

    $id = null;
    $logradouro = null;
    $numero = null;
    $bairro = null;
    $cep = null;
    $complemento = null;
    $botao = "Salvar";


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){

            require_once('cms/models/enderecoClass.php');
            require_once('cms/models/DAO/enderecoDAO.php');

            $enderecoDAO = new enderecoDAO;
            $id = $_GET['id'];
            $enderecoDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('cms/models/enderecoClass.php');
            require_once('cms/models/DAO/enderecoDAO.php');

            $enderecoDAO = new enderecoDAO;
            session_start();
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            $listUserEndereco = $enderecoDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listUserEndereco)>0)
            {

                $id = $listUserEndereco->id;
                $logradouro = $listUserEndereco->logradouro;
                $numero = $listUserEndereco->numero;
                $bairro = $listUserEndereco->bairro;
                $cep = $listUserEndereco->cep;
                $complemento = $listUserEndereco->complemento;

                $botao = "Editar";

            }
        }
    }

       if(isset($_GET['btn-salvar'])){

        require_once('cms/models/enderecoClass.php');
        require_once('cms/models/DAO/enderecoDAO.php');

        $classMeuEndereco = new Endereco();
        $classMeuEndereco->logradouro = $_GET['logradouro'];
        $classMeuEndereco->numero = $_GET['numero'];
        $classMeuEndereco->bairro = $_GET['bairro'];
        $classMeuEndereco->cep = $_GET['cep'];
        $classMeuEndereco->complemento = $_GET['complemento'];

        $enderecoDAO = new enderecoDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $enderecoDAO->insert($classMeuEndereco);
           }else{
               $classMeuEndereco->id = $_SESSION['id'];

               $enderecoDAO->update($classMeuEndereco);
           }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#9CC283">
    <meta name="msapplication-navbutton-color" content="#9CC283">
    <meta name="apple-mobile-web-app-status-bar-style" content="#9CC283">
	<title>Food 4Fit</title>
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
    <script>

        //Função em jquery para sicronizar com estado e cidade no site
        $(document).ready(function(){

            //Pegando o ID do estado do HTML, criando uma função
            //em CHANGE ->
            $("#estado").change(function(){

                //Crio uma variavel, pego o id do estado em HTML
                //Dentro dele, jogo meu option
                //. -> onjeto
                // val() ->
                 var idEstado = $('#estado option:selected').val();

                //$. ->
                //getJSON -> pego a array que criei em JSON
                //Passo como parametro o caminho de onde quero pegar
                //pego o id do Estado igual no Banco sql
                //Crio uma função e uma avriavel chamada RESULTADO
                 $.getJSON("cms/models/DAO/cidadeDAO.php",{ id : idEstado },function(resultado){

                    //Crio uma variavel chamada novoConteudo e outra cont começando do 0
                    var novoConteudo;
                    var cont = 0;

                    //Pego o id da cidade em HTML e aqui
                     //Estopu fazendo com que sempre limpe toda vez que eu pegar
                     //um novo item/dado do mysql
                    $("#cidade").html("");

                     //Este while faz o cont do PHP < resultado (variavel que eu criei)
                     //.length -> dizendo quantos elementos de uma array eu tenho, preenchendo minha variavel resultado
                     while( cont < resultado.length){

                        //jogo na minha variavel novoConteudo,
                        //meu HTML, contatenando com o ID e cidade
                        //onde em [cont], conto quantos itens tem na minha variavel resultado
                        novoConteudo = "<option value='"+ resultado[cont].id +"'>" + resultado[cont].cidade + "</option>";

                        //Pego minha id da cidade do HTML
                         //append ->Colocando diretamente dentro do HTML
                         $("#cidade").append(novoConteudo);

                         cont++;
                     }

                });
            });
        });

    </script>
</head>
<body>
	<?php require_once("components/navbar.html"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<section class="main"><!-- CONTAINER-MÃE DO SITE -->
		<h2 id="page-title">MEUS ENDEREÇOS</h2>
		<div class="address-block margin-top-30px">
		    <article>
		        <h2 class="padding-top-30px padding-left-20px padding-bottom-15px">Endereços Salvos</h2>
		        <?php
                    require_once("cms/models/DAO/enderecoDAO.php");

                //INSTANCIA DA CLASSE
                    $enderecoDAO = new enderecoDAO();

                //Chamar o método
                    $lista = $enderecoDAO->selectAll();


                    //count -> comando que conta quantos itens tem o objeto
                    for($i = 0; $i < count($lista); $i++){
                ?>

		        <div class="address-row">

		            <span class="padding-top-15px padding-bottom-15px padding-left-20px"> <?php echo($lista[$i]->logradouro)?> </span>

		            <div id="address-opts">

		                  <img src="assets/images/icons/delete.svg" alt="Excluir Endereço" class="padding-right-5px" onclick="javascript:location.href='meus-enderecos.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'">



                            <img src="assets/images/icons/edit-dark.svg" alt="Editar Endereço" onclick="javascript:location.href='meus-enderecos.php?modo=editar&id=<?php echo($lista[$i]->id)?>'">


		            </div>

		        </div>
		        <?php
                    }
                ?>
		    </article>
		    <section class="form-generic">
		        <h2 class="form-title padding-top-20px">Cadastrar/Editar Endereço</h2>
		        <form action="meus-enderecos.php" class="form-generic-content width-550px margin-left-auto margin-right-auto" method="get">

		            <label for="logradouro" class="label-generic">Logradouro:</label>
		            <input type="text" name="logradouro" id="logradouro" placeholder="Ex: R. Elton Silva" class="input-generic" value="<?php echo($logradouro);?>">

		            <label for="numero" class="label-generic">Número:</label>
		            <input type="text" name="numero" id="numero" placeholder="Ex: 905" class="input-generic" value="<?php echo($numero);?>">

		            <label for="bairro" class="label-generic">Bairro:</label>
		            <input type="text" name="bairro" id="bairro" placeholder="Ex: JD. Angular" class="input-generic" value="<?php echo($bairro);?>">

		            <label for="complemento" class="label-generic">Complemento:</label>
		            <input type="text" name="complemento" id="complemento" placeholder="Ex: Próximo a X lugar" class="input-generic" value="<?php echo($complemento);?>">

		            <label for="cep" class="label-generic">CEP:</label>
		            <input type="text" name="cep" id="cep" placeholder="Ex: 01234-567" class="input-generic" value="<?php echo($cep);?>">

                    <label for="estado" class="label-generic">Estado:</label>
		            <select name="estado" id="estado" class="input-generic"><option>Selecione uma opção:</option>
                        <?php

                        require_once("cms/models/DAO/estadoDAO.php");


                        $estadoDAO = new estadoDAO();


                        $lista = $estadoDAO->selectAll();


                            for($i = 0; $i < count($lista); $i++){
                        ?>
		                <option value="<?php echo($lista[$i]->id)?>"><?php echo($lista[$i]->sigla)?></option>

                        <?php
                            }
                        ?>
		            </select>


		            <label for="cidade" class="label-generic">Cidade:</label>
		            <select name="cidade" id="cidade" class="input-generic">

		                <option selected>Selecione uma opção:</option>

		            </select>



		            <div class="margin-top-30px margin-bottom-30px form-row">
                        <span class="margin-right-15px" onclick="javascript:history.back()">Voltar</span>
                        <div class="btn-generic" onclick="$('.generic-modal').css('display', 'flex');">
                            <input type="submit" value="<?php echo($botao)?>" name="btn-salvar">
<!--                            <span>Salvar</span>-->
                        </div>
                    </div>

		        </form>
		    </section>
		</div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
