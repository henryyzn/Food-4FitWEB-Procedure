<?php

    session_start();

    $id = null;
    $logradouro = null;
    $numero = null;
    $bairro = null;
    $cep = null;
    $estado = null;
    $cidade = null;
    $latitude = null;
    $longitude = null;
    $botao = "Salvar";


    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'excluir'){

            require_once('../models/lojasClass.php');
            require_once('../models/DAO/lojasDAO.php');

            $lojasDAO = new lojasDAO;
            $id = $_GET['id'];
            $lojasDAO->delete($id);

        }else if($modo == 'editar'){
            require_once('../models/lojasClass.php');
            require_once('../models/DAO/lojasDAO.php');

            $lojasDAO = new lojasDAO;
            session_start();
            $id = $_GET['id'];
            $_SESSION['id'] = $id;

            $listLojas = $lojasDAO->selectId($id);

            //Resgatando do Banco de dados
            //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
            if(count($listLojas)>0)
            {

                $id = $listLojas->id;
                $idendereco = $listLojas->idendereco;
                $latitude = $listLojas->latitude;
                $longitude = $listLojas->longitude;
                $funcionamento = $listLojas->funcionamento;
                $telefone = $listLojas->telefone;
                $ativo = $listLojas->ativo;

                $botao = "Editar";

            }
        }
    }
    if(isset($_GET['btn-salvar'])){

        require_once('../models/lojasClass.php');
        require_once('../models/DAO/lojasDAO.php');

        $classLojas = new Lojas();
        $classLojas->idendereco = $_GET['id_endereco'];
        $classLojas->latitude = $_GET['latitude'];
        $classLojas->longitude = $_GET['longitude'];
        $classLojas->telefone = $_GET['telefone'];
        $classLojas->funcionamento = $_GET['funcionamento'];
        $classLojas->ativo = "1";

        $lojasDAO = new lojasDAO();

           if($_GET['btn-salvar'] == "Salvar"){
               $lojasDAO->insert($classLojas);
           }elseif($_GET['btn-salvar'] == "Editar"){
               $classLojas->id = $_SESSION['id'];
               $lojasDAO->update($classLojas);
           }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
    <link rel="stylesheet" href="../../assets/public/css/jquery.toast.min.css">
    <link rel="stylesheet" href="../../assets/public/css/sceditor.theme.min.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
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
                 $.getJSON("../models/DAO/cidadeDAO.php",{ id : idEstado },function(resultado){

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
    <section id="main">
        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                 <form action="lojas.php" class="form-generic-content" id="form-loja" style="padding: 30px; box-sizing: border-box; border: 20px solid transparent;">
                    <h2 class="form-title">Cadastrar um Local Físico</h2>
                    <label for="logradouro" class="label-generic">Logradouro:</label>
                    <input type="text" name="logradouro" id="logradouro" class="input-generic" placeholder="Ex: R. Ateus">

                    <label for="numero" class="label-generic">Número:</label>
                    <input type="text" name="numero" id="numero" class="input-generic" placeholder="Ex: 438">

                    <label for="bairro" class="label-generic">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="input-generic" placeholder="Ex: JD. Gregório Antunes">

                    <label for="estado" class="label-generic">Estado:</label>
                    <select name="estado" id="estado" class="input-generic"><option>Selecione uma opção:</option>
                    <?php

                        require_once("../models/DAO/estadoDAO.php");


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
                    <select type="text" name="idCidade" id="cidade" class="input-generic" placeholder="Ex: Olímpia">


                    </select>

                    <label for="cep" class="label-generic">CEP:</label>
                    <input type="text" name="cep" id="cep" class="input-generic" placeholder="Ex: 17745-111">

                    <label for="latitude" class="label-generic">Latitude:</label>
                    <input type="text" name="latitude" id="latitude" class="input-generic" placeholder="Ex:">

                    <label for="Longitude" class="label-generic">Longitude:</label>
                    <input type="text" name="longitude" id="longitude" class="input-generic" placeholder="Ex:">

                    <label for="telefone" class="label-generic">Telefone Fixo:</label>
                    <input type="tel" name="telefone" id="telefone" class="input-generic" placeholder="Ex: (11) 98888-7777">
                    <span id="message" class="padding-bottom-20px">Este será o telefone em que clientes próximos desta instalação irão<br>ligar caso exijam alguma informação.</span>

                    <label for="funcionamento" class="label-generic">Horário de Funcionamento:</label>
                    <textarea name="funcionamento" id="funcionamento" class="textarea-generic"></textarea>
                    <div class="form-row">
                        <input type="submit" value="<?php echo($botao)?>" name="btn-salvar">
                        <span class="btn-cancelar">Cancelar</span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
