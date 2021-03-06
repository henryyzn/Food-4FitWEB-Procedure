<?php
    session_start();

    $tipoPessoa = null;
    $genero = null;

    if(isset($_GET['btn-finalizar'])){
        require_once('cms/models/cadastro-usuarioClass.php');
        require_once('cms/models/DAO/cadastro-usuarioDAO.php');
        require_once('cms/models/DAO/pergunta-secretaDAO.php');
        require_once('cms/models/pergunta-secretaClass.php');

        $classCadUser = new cadastroUsuario();
        $classCadUser->idPerguntaSecreta = $_GET['perguntasecreta'];
        $classCadUser->tipoPessoa = $_GET['pessoa'];
        $classCadUser->nome = $_GET['nome'];
        $classCadUser->sobrenome = $_GET['sobrenome'];
        $classCadUser->nome_fantasia = $_GET['nomeFantasia'];
        $classCadUser->razao_social = $_GET['razaoSocial'];
        $classCadUser->email = $_GET['email'];
        $classCadUser->rg = $_GET['rg'];
        $classCadUser->cpf = $_GET['cpf'];
        $classCadUser->cnpj = $_GET['cnpj'];
        $classCadUser->dataNasc = $_GET['dtnasc'];
        if (isset($_GET["sexo"])) {
            $classCadUser->genero = $_GET['sexo'];
        }
        
        $classCadUser->telefone = $_GET['telefone'];
        $classCadUser->celular = $_GET['celular'];
        $passwd = md5($_GET['senha']);
        $classCadUser->senha = $passwd;

        $classCadUser->respSecreta = $_GET['respostasecreta'];
//        $classCadUser->avatar = $_GET['avatar'];
//        $classCadUser->redeSocial = $_GET['rede_social'];
//        $classCadUser->token = $_GET['token'];
//        $classCadUser->ativo = $_GET['ativo'];

        $classCadUser->inscEstadual = $_GET['inscricaoEstadual'];
//        $classCadUser->altura = $_GET['altura'];
//        $classCadUser->peso = $_GET['peso'];

        $cadUsuarioDAO = new cadUsuarioDAO();
        $cadUsuarioDAO->insert($classCadUser);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro de Usuário - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" href="assets/public/css/jquery-ui.min.css">
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
	<script>
        $(document).ready(function(){
            $("#razaoSocial, label[for='razaoSocial']").hide();
            $("#nomeFantasia, label[for='nomeFantasia']").hide();
            $("#inscricaoEstadual, label[for='inscricaoEstadual']").hide();
            $("#cnpj, label[for='cnpj']").hide();
            
            $("form :input").prop("required", function() {
                return $(this).is(":visible");
            });
            
            $("#fisica").on('change', function(){
                $("#nome, label[for='nome']").show();
                $("#sobrenome, label[for='sobrenome']").show();
                $("#rg, label[for='rg']").show();
                $("#cpf, label[for='cpf']").show();
                $("#dtnasc, label[for='dtnasc']").show();
                $("#sexo, #label-sexo").show();
                $("#razaoSocial, label[for='razaoSocial']").hide();
                $("#nomeFantasia, label[for='nomeFantasia']").hide();
                $("#inscricaoEstadual, label[for='inscricaoEstadual']").hide();
                $("#cnpj, label[for='cnpj']").hide();
                $("form :input").prop("required", function() {
                    return $(this).is(":visible");
                });
            });
            $("#juridica").on('change', function(){
                $("#nome, label[for='nome']").hide();
                $("#sobrenome, label[for='sobrenome']").hide();
                $("#rg, label[for='rg']").hide();
                $("#cpf, label[for='cpf']").hide();
                $("#dtnasc, label[for='dtnasc']").hide();
                $("#sexo, #label-sexo").hide();
                $("#razaoSocial, label[for='razaoSocial']").show();
                $("#nomeFantasia, label[for='nomeFantasia']").show();
                $("#inscricaoEstadual, label[for='inscricaoEstadual']").show();
                $("#cnpj, label[for='cnpj']").show();
                $("form :input").prop("required", function() {
                    return $(this).is(":visible");
                });
            });
        });
    </script>
</head>
<body>
	<?php require_once("components/navbar.php") ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <section class="main">
        <h1 id="page-title" class="margin-left-auto margin-right-auto animate fadeInUp">INFORMAÇÕES BÁSICAS</h1><!-- TÍTULO DA PÁGINA -->
        <div class="form-generic width-600px margin-left-auto margin-right-auto">

            <form id="form-cadastro-usuario" class="form-generic-content" action="cadastro-usuario.php" method="get">

                <span style="display: block; font-size: 18px; font-family: 'Roboto Bold'; color: #000;" class="margin-top-30px margin-bottom-15px">Eu sou...</span>
                <div id="pessoa" style="display: flex;">
                    <input type="radio" checked name="pessoa" id="fisica" value="F">
                    <label for="fisica" class="label-generic">Pessoa Física</label>
                    <input type="radio" name="pessoa" id="juridica" value="J" required class="margin-left-15px">
                    <label for="juridica" class="label-generic">Pessoa Jurídica</label>
                </div>


                <label for="nome" class="label-generic margin-top-30px">Nome:</label>
                <input type="text" name="nome" id="nome" class="input-generic" placeholder="Ex: João" required>



                <label for="sobrenome" class="label-generic margin-top-30px">Sobrenome:</label>
                <input type="text" name="sobrenome" id="sobrenome" class="input-generic" placeholder="Ex: Guedez da Silva" required>



                <label for="razaoSocial" id="label-razaoSocial" class="label-generic margin-top-30px">Razão Social:</label>
                <input type="text" name="razaoSocial" id="razaoSocial" class="input-generic" required>



                <label for="nomeFantasia" id="label-nomeFantasia" class="label-generic margin-top-30px">Nome Fantasia:</label>
                <input type="text" name="nomeFantasia" id="nomeFantasia" class="input-generic" required>


                <label for="email" class="label-generic margin-top-30px">E-Mail:</label>
                <input type="email" name="email" id="email" class="input-generic" placeholder="Ex: endereco@provedor.com" required>

                <label for="rg" class="label-generic margin-top-30px">RG:</label>
                <input type="text" name="rg" id="rg" class="input-generic" placeholder="Ex: 12.345.678-9" pattern="\d{2}\.\d{3}\.\d{3}-\d" title="12.345.678-9">



                <label for="cpf" class="label-generic margin-top-30px">CPF:</label>
                <input type="text" name="cpf" id="cpf" class="input-generic" placeholder="Ex: 111.222.333-44" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" title="111.222.333-44">



                <label for="inscricaoEstadual" class="label-generic margin-top-30px">Inscrição Estadual:</label>
                <input type="text" name="inscricaoEstadual" id="inscricaoEstadual" class="input-generic" placeholder="Ex: 980.572.254.579" pattern="\d{3}\.\d{3}\.\d{3}\.\d{3}" title="980.572.254.579">



                <label for="cnpj" class="label-generic margin-top-30px">CNPJ:</label>
                <input type="text" name="cnpj" id="cnpj" class="input-generic" placeholder="Ex: 55.233.069/0001-57" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" title="55.233.069/0001-57">

                <label for="dtnasc" class="label-generic margin-top-30px">Data de Nascimento:</label>
                <input type="text" name="dtnasc" id="dtnasc" class="input-generic" placeholder="Ex: 01/01/1990" pattern="\d{2}/\d{2}/\d{4}" title="01/01/1990">

                <span style="display: block; font-size: 18px; font-family: 'Roboto Bold'; color: #000;" class="margin-top-30px margin-bottom-15px" id="label-sexo">Gênero:</span>
                <div id="sexo" style="display: flex;">
                    <input type="radio" name="sexo" id="homem" value="M">
                    <label for="homem" class="label-generic">Homem</label>
                    <input type="radio" name="sexo" id="mulher" value="F" required class="margin-left-15px">
                    <label for="mulher" class="label-generic">Mulher</label>
                </div>

                <label for="telefone" class="label-generic margin-top-30px">Telefone:</label>
                <input type="tel" name="telefone" id="telefone" class="input-generic" placeholder="Ex: 1187654321" pattern="\d{10}" title="1187654321">

                <label for="celular" class="label-generic margin-top-30px">Celular:</label>
                <input type="text" name="celular" id="celular" class="input-generic" placeholder="Ex: 11987654321" pattern="\d{11}" title="11987654321">

                <span class="aviso-contato">Caso necessário o contato através de e-mail ou<br>
                    telefone/celular, usaremos o seu nome escolhido como vulgo.
                </span>

                <label for="senha" class="label-generic margin-top-30px">Senha:</label>
                <input type="password" name="senha" id="senha" class="input-generic">

                <label for="confsenha" class="label-generic margin-top-30px">Confirme a Senha:</label>
                <input type="password" name="confsenha" id="confsenha" class="input-generic">

                <label for="perguntasecreta" class="label-generic margin-top-30px">Pergunta Secreta:</label>
                <select name="perguntasecreta" id="perguntasecreta" class="input-generic margin-top-30px">
                <option>Selecione uma opção:</option>

                <?php
                    require_once("./cms/models/DAO/pergunta-secretaDAO.php");

                    $perguntaDAO = new perguntaDAO();
                    $lista = $perguntaDAO->selectAll();
                    for($i = 0; $i < count($lista); $i++){


                ?>
                    <option value="<?php echo ($lista[$i]->id)?>"><?php echo($lista[$i]->pergunta)?></option>
                <?php
                    }
                ?>

                </select>

                <label for="respostasecreta" class="label-generic margin-top-30px">Resposta:</label>
                <input type="text" name="respostasecreta" id="respostasecreta" class="input-generic margin-bottom-60px" required>

                <div class="margin-top-30px margin-bottom-30px form-row">
                    <span class="margin-right-15px">Cancelar</span>
                    <button type="submit" class="btn-generic" name="btn-finalizar">
                        <span>Finalizar</span>
                    </button>
                </div>
            </form>
        </div>
	</section>
	<div class="generic-modal" id="modal-cadastro">
        <article class="generic-modal-wrapper" style="padding: 200px;">
            <h2>Você está cadastrado!</h2>
            <span class="margin-top-20px margin-bottom-20px">Seu navegador te redirecionará para a página de login em <span class="counter">5</span> segundos.</span>
            <p>Clique <a href="index.php">aqui</a> para pular</p>
        </article>
    </div>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
