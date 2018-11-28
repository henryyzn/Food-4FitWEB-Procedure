<nav id="navbar-flat"><!-- BARRA DE NAVEGAÇÃO -->
	<div id="navbar-flat-content">
		<a href="index.php" id="navbar-flat-logo" class="animate fadeInDown">FOOD 4FIT</a>
		<div id="navbar-flat-search" class="animate fadeInDown">
		    <form action="pesquisa.php" name="frmsearch" method="POST" id="form-search">
			    <input type="text" name="pesquisa" placeholder="Pesquise" required>
		        <div id="navbar-flat-search-button">
			        <label for="btn-search"><img src="assets/images/icons/search.svg" alt="Pesquise"></label>
			    </div>
			    <input type="submit" name="btn-search" id="btn-search" class="display-none">
			</form>
		</div>

		<div id="navbar-flat-menu" class="animate fadeInDown">
			<img src="assets/images/icons/menu.svg" alt="Menu">
		</div>
		<div id="navbar-flat-buycart" class="animate fadeInDown">
			<a href="carrinho.php">
			    <img src="assets/images/icons/buycart.svg" alt="Carrinho de Compras">
			</a>
		</div>
		<?php
            if(isset($_SESSION['itens-carrinho'])){
        ?>
		<div id="buycart-bubble" class="animate fadeInDown">
			<span><?php echo sizeof($_SESSION['carrinho'])?></span>
		</div>
		<?php
            }
        ?>
		<div id="navbar-flat-login" class="animate fadeInDown">
			<img src="<?php if(isset($_SESSION['avatar_usuario'])){echo($_SESSION['avatar_usuario']);}else{echo('assets/archives/avatares/padrao.png');} ?>" alt="Login">
		</div>
		<div id="user-bubble" class="animate fadeInDown">
			<span>12</span>
		</div>
	</div>
</nav>
<aside id="sidebar-left" class="padding-top-30px"><!-- MENU LATERAL ESQUERDO -->
	<ul class="sidebar-left-list padding-left-30px">
		<li><a href="index.php">Página Inicial</a></li>
		<li><a href="todos-os-pratos.php">Pratos</a></li>
		<li><a href="promocoes.php">Promoções</a></li>
		<li><a href="fit-session.php">Fit Session</a></li>
		<li><a href="comentarios-gerais.php">Comentários Gerais</a></li>
		<li><a href="homenagem-parceiros.php">Homenagem a Parceiros</a></li>
		<li><a href="sobre.php">Sobre Nós</a></li>
		<li><a href="contato.php">Fale Conosco</a></li>
		<li><a href="nossas-lojas.php">Nossas Lojas</a></li>
	</ul>
	<div id="sidebar-left-close">
		<img src="assets/images/simbols/close.svg" alt="Fechar Menu">
	</div>
</aside>
<aside id="sidebar-right" class="padding-top-30px"><!-- MENU LATERAL DIREITO -->
	<ul class="sidebar-right-list padding-right-30px">
		<li><a href="meu-perfil.php">Meu Perfil</a></li>
		<li><a href="meus-pedidos.php">Pedidos</a></li>
		<li><a href="meus-favoritos.php">Favoritos</a></li>
		<li><a href="diario-de-bordo.php">Diário de Bordo</a></li>
		<li><a href="notificacoes.php"><span>12</span>Notificações</a></li>
		<li><a href="meus-pratos.php">Meus Pratos</a></li>
		<li><a href="pratos-reservados.php">Pratos Reservados</a></li>
		<li><a href="app.php">Aplicativo</a></li>
		<li><a href="termos-uso.php">Termos de Uso</a></li>
		<li><a href="politicas-privacidade.php">Políticas de Privacidade</a></li>
		<li><a href="modulo.php?logout">Logout</a></li>
	    <li id="flex"><label class="label" for="themeSwitch">
            <div class="toggleWrapper">
                <input type="checkbox" class="dn" id="themeSwitch" name="theme" value="1"/>
                <label for="themeSwitch" class="toggle margin-right-5px">
                    <span class="toggle__handler">
                        <span class="crater crater--1"></span>
                        <span class="crater crater--2"></span>
                        <span class="crater crater--3"></span>
                    </span>
                    <span class="star star--1"></span>
                    <span class="star star--2"></span>
                    <span class="star star--3"></span>
                    <span class="star star--4"></span>
                    <span class="star star--5"></span>
                    <span class="star star--6"></span>
                </label>
            </div>
		    Dark Mode</label></li>
	</ul>
	<div id="sidebar-right-close">
		<img src="assets/images/simbols/close.svg" alt="Fechar Menu">
	</div>
</aside>
<script>
	$(function() {
		var data = localStorage.getItem("theme");
		if (data !== null) {
			var check = $("input[name='theme']").attr("checked", "checked");
			document.getElementById("themeStyle").href="assets/css/style-dark.css";
			document.getElementById("themeBases").href="assets/css/bases-dark.css";
			document.getElementById("themeNavbar").href="assets/css/navbar-dark.css";
			document.getElementById("themeFooter").href="assets/css/footer-dark.css";
		}
	});
	$("input[name='theme']").click(function() {
		if ($(this).is(":checked")) {
			localStorage.setItem("theme", $(this).val());
			document.getElementById("themeStyle").href="assets/css/style-dark.css";
			document.getElementById("themeBases").href="assets/css/bases-dark.css";
			document.getElementById("themeNavbar").href="assets/css/navbar-dark.css";
			document.getElementById("themeFooter").href="assets/css/footer-dark.css";
		} else {
			localStorage.removeItem("theme");
			document.getElementById("themeStyle").href="assets/css/style-light.css";
			document.getElementById("themeBases").href="assets/css/bases-light.css";
			document.getElementById("themeNavbar").href="assets/css/navbar-light.css";
			document.getElementById("themeFooter").href="assets/css/footer-light.css";
		}
	});
</script>
