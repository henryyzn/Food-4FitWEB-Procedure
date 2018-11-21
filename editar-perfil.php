<?php
    session_start();
    require_once('modulo.php');
	validateLog();
	
	$id = null;
    $titulo = null;
    $foto = null;
    $botao = "Salvar";

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];

        if($modo == 'remover'){
            require_once('cms/models/DAO/usuarioDAO.php');

            $usuarioDAO = new usuarioDAO();
            $id = $_GET['id'];
            $usuarioDAO->deleteImage($id);

        }else if($modo == 'editarImagem'){
            require_once('cms/models/usuarioClass.php');
            require_once('cms/models/DAO/usuarioDAO.php');

            $usuarioDAO = new usuarioDAO();

            $id = $_GET['id'];
            $listUsuario = $usuarioDAO->selectId($id);

            if(@count($listUsuario)>0){
                $id = $listUsuario->id;
                $titulo = $listUsuario->titulo;
                $foto = $listUsuario->foto;
                $ativo = $listUsuario->ativo;

                $botao = "Editar";
            }
        }
	}
	if(isset($_GET['btn-salvar'])){
        require_once('cms/models/usuarioClass.php');
        require_once('cms/models/DAO/usuarioDAO.php');

        $classUsuario = new Usuario();
		
		$classUsuario->nome = $_GET['nome'];
		$classUsuario->sobrenome = $_GET['sobrenome'];
		$classUsuario->email = $_GET['email'];
		$classUsuario->data_nascimento = date('Y/m/d', strtotime($_GET['data_nascimento']));
		$classUsuario->avatar = $_GET['foto'];
		$classUsuario->genero = $_GET['sexo'];
		$classUsuario->telefone = $_GET['telefone'];
		$classUsuario->celular = $_GET['celular'];
		$classUsuario->pergunta_secreta = $_GET['pergunta_secreta'];
		$classUsuario->resposta_secreta = $_GET['resposta_secreta'];

		$usuarioDAO = new usuarioDAO();
        if($_GET['btn-salvar'] == "Salvar"){
            $classUsuario->id = $_GET['id_usuario'];
            $usuarioDAO->update($classUsuario);
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo($_SESSION['nome_usuario'])?> - Food 4Fit</title>
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
	<script src="assets/public/js/jquery.form.js"></script>
	<script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function(){
            $('#foto').on('change', function(){
                $('#frmfoto').ajaxForm({
                    target:'#visualizar'
                }).submit();
            });
        });
    </script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?>
	<section class="main">
		<h2 id="page-title">EDITAR INFORMAÇÕES</h2>
		<p id="page-subtitle">Por motivos de segurança, dados como RG e CPF/CNPJ não são editáveis.</p>
		<div class="generic-block padding-top-30px">
			<div class="form-generic margin-right-auto margin-left-auto width-600px" style="box-sizing: border-box; background-color: #F1F1F1; border: 30px solid transparent">
				<form action="upload/upload-perfil.php" method="POST" name="frmfoto" id="frmfoto" class="form-generic-content" enctype="multipart/form-data">
					<figure id="visualizar" class="margin-left-auto margin-right-auto profile-edit-image">
						<img src='<?php echo($_SESSION['avatar_usuario'])?>' alt="Imagem a ser cadastrada">
					</figure>
					<div class="profile-edit-image-row margin-left-auto margin-right-auto padding-top-30px padding-bottom-30px">
						<div>
							<label for="foto" class="fileimage">Trocar Avatar</label>
							<input type="file" name="fileimage" id="foto" class="hide">
						</div>
						<div>
							<span onclick="javascript:location.href='editar-perfil.php?modo=remover&id=<?php echo($_SESSION['id_usuario'])?>'">Remover Avatar</span>
						</div>
					</div>
				</form>
				<form id="form-editar-perfil" class="form-generic-content margin-top-30px" name="frmperfil" method="GET" action="editar-perfil.php">
					<input name="foto" type="hidden" value="<?php echo($_SESSION['avatar_usuario'])?>">
					<input name="id_usuario" type="hidden" value="<?php echo($_SESSION['id_usuario'])?>">

		            <label for="nome" class="label-generic">Nome/Nome Fantasia</label>
		            <input type="text" name="nome" class="input-generic" id="nome" value="<?php echo($_SESSION['primeiroNome_usuario'])?>">
		            <!-- ===================== -->
		            <label for="sobrenome" class="label-generic">Sobrenome/Razão Social</label>
		            <input type="text" class="input-generic" name="sobrenome" id="sobrenome" value="<?php echo($_SESSION['sobrenome_usuario'])?>">
		            <!-- ===================== -->
		            <label for="email" class="label-generic">E-Mail</label>
		            <input type="email" name="email" id="email" class="input-generic" value="<?php echo($_SESSION['email_usuario'])?>">
		            <!-- ===================== -->
		            <label for="data_nascimento" class="label-generic">Data de Nascimento</label>
		            <input type="text" id="data_nascimento" name="data_nascimento" class="input-generic data" value="<?php echo($_SESSION['dtNasc_usuario'])?>">
		            <!-- ===================== -->
					<span style="display: block; font-size: 18px; font-family: 'Roboto Regular'; color: #000;" class="margin-top-30px margin-bottom-15px">Gênero:</span>
					<?php
                        //print_r($_SESSION['genero_usuario']);

						if($_SESSION['genero_usuario'] == 'M'){
							$checkM = 'checked';
							$checkF = null;
						}elseif($_SESSION['genero_usuario'] == 'F'){
							$checkF = 'checked';
							$checkM = null;
						}
					?>
                    <div id="sexo" style="display: flex;">
                        <input type="radio" name="sexo" id="masculino" value="M" <?php echo($checkM)?> required>
                        <label for="masculino" class="label-generic">Masculino</label>
                        <input type="radio" name="sexo" id="feminino" value="F" <?php echo($checkF)?> required class="margin-left-15px">
                        <label for="feminino" class="label-generic">Feminino</label>
                    </div>
                    <label for="telefone" class="label-generic">Telefone</label>
		            <input id="telefone" name="telefone" type="text" maxlength="16" class="input-generic" value="<?php echo($_SESSION['telefone_usuario'])?>">
		            <!-- ===================== -->
		            <label for="celular" class="label-generic">Celular</label>
		            <input id="celular" name="celular" type="text" maxlength="16" class="input-generic" value="<?php echo($_SESSION['celular_usuario'])?>">
		            <span class="aviso-contato margin-bottom-20px">Caso necessário o contato através de e-mail ou<br>
                    telefone/celular, usaremos o seu nome escolhido como vulgo.</span>
		            <!-- ===================== -->
		            <label for="pergunta_secreta" class="label-generic">Pergunta Secreta</label>
		            <select id="pergunta_secreta" name="pergunta_secreta" class="input-generic">
						<option selected value="<?php echo($_SESSION['id_pergunta_secreta_usuario'])?>"><?php echo($_SESSION['pergunta_secreta_usuario'])?></option>
						<?php
							require_once("cms/models/DAO/login-usuarioDAO.php");

							$loginUsuarioDAO = new loginUsuarioDAO();

							$lista = $loginUsuarioDAO->selectPerguntas();

							for($i = 0; $i < @count($lista); $i++){
						?>
						<option value="<?php echo($lista[$i]->id)?>"><?php echo($lista[$i]->pergunta)?></option>
						<?php 
							}
						?>
		            </select>
		            <!-- ===================== -->
		            <label for="resposta_secreta" class="label-generic">Resposta:</label>
		            <input id="resposta_secreta" name="resposta_secreta" type="text" class="input-generic" value="<?php echo($_SESSION['resposta_secreta_usuario'])?>">
		            <!-- ===================== -->
		            <div class="margin-top-30px margin-bottom-30px form-row">
                        <span class="margin-right-15px" onclick="javascript:history.back()">Cancelar</span>
                        <button type="submit" name="btn-salvar" value="<?php echo($botao)?>" class="btn-generic">
                            <span>Salvar</span>
                        </button>
                    </div>
		        </form>
		    </div>
		</div>
	</section>
	<?php require_once("components/footer.html"); ?>
</body>
</html>
