<style>
.toggleWrapper input {
  position: absolute;
  left: -99em;
}

.toggle {
  cursor: pointer;
  display: inline-block;
  position: relative;
  width: 50px;
  height: 30px;
  background-color: #83D8FF;
  border-radius: 84px;
  transition: background-color 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
.toggle:before {
  content: '';
  position: absolute;
  left: -50px;
  top: 15px;
  font-size: 18px;
}
.toggle:after {
  content: '';
  position: absolute;
  right: -48px;
  top: 15px;
  font-size: 18px;
  color: #FFCF96;
}

.toggle__handler {
  display: inline-block;
  position: relative;
  z-index: 1;
  top: 4.5px;
  left: 4.5px;
  width: 21px;
  height: 21px;
  background-color: #FFCF96;
  border-radius: 50px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  transition: all 400ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
  transform: rotate(-45deg);
}
.toggle__handler .crater {
  position: absolute;
  background-color: #E8CDA5;
  opacity: 0;
  transition: opacity 200ms ease-in-out;
  border-radius: 100%;
}
.toggle__handler .crater--1 {
  top: 18px;
  left: 10px;
  width: 4px;
  height: 4px;
}
.toggle__handler .crater--2 {
  top: 4px;
  left: 6px;
  width: 6px;
  height: 6px;
}
.toggle__handler .crater--3 {
  top: 10px;
  left: 15px;
  width: 8px;
  height: 8px;
}

.star {
  position: absolute;
  background-color: #ffffff;
  transition: all 300ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
  border-radius: 50%;
}

.star--1 {
  top: 8px;
  left: 20px;
  z-index: 1;
  width: 14px;
  height: 3px;
}

.star--2 {
  top: 15px;
  left: 16px;
  z-index: 1;
  width: 14px;
  height: 3px;
}

.star--3 {
  top: 21px;
  left: 20px;
  z-index: 1;
  width: 14px;
  height: 3px;
}

.star--4,
.star--5,
.star--6 {
  opacity: 0;
  transition: all 300ms 0 cubic-bezier(0.445, 0.05, 0.55, 0.95);
}

.star--4 {
  top: 16px;
  left: 11px;
  z-index: 0;
  width: 2px;
  height: 2px;
  transform: translate3d(3px, 0, 0);
}

.star--5 {
  top: 5px;
  left: 10px;
  z-index: 0;
  width: 3px;
  height: 3px;
  transform: translate3d(3px, 0, 0);
}

.star--6 {
  top: 4px;
  left: 28px;
  z-index: 1;
  width: 2px;
  height: 2px;
  transform: translate3d(3px, 0, 0);
}

input:checked + .toggle {
  background-color: #749DD6;
}
input:checked + .toggle:before {
  color: #FFCF96;
}
input:checked + .toggle:after {
  color: #ffa500;
}
input:checked + .toggle .toggle__handler {
  background-color: #FFE5B5;
  transform: translate3d(18px, 0, 0) rotate(0);
}
input:checked + .toggle .toggle__handler .crater {
  opacity: 1;
}
input:checked + .toggle .star--1 {
  width: 2px;
  height: 2px;
}
input:checked + .toggle .star--2 {
  width: 4px;
  height: 4px;
  transform: translate3d(-5px, 0, 0);
}
input:checked + .toggle .star--3 {
  width: 2px;
  height: 2px;
  transform: translate3d(-7px, 0, 0);
}
input:checked + .toggle .star--4,
input:checked + .toggle .star--5,
input:checked + .toggle .star--6 {
  opacity: 1;
  transform: translate3d(0, 0, 0);
}
input:checked + .toggle .star--4 {
  transition: all 300ms 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
input:checked + .toggle .star--5 {
  transition: all 300ms 300ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
input:checked + .toggle .star--6 {
  transition: all 300ms 400ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
}
</style>
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
		<li><a href="minhas-dietas.php">Minhas Dietas</a></li>
		<li><a href="meus-favoritos.php">Favoritos</a></li>
		<li><a href="diario-de-bordo.php">Diário de Bordo</a></li>
		<li><a href="notificacoes.php"><span>12</span>Notificações</a></li>
		<li><a href="meus-pratos.php">Meus Pratos</a></li>
		<li><a href="pratos-reservados.php">Pratos Reservados</a></li>
		<li><a href="app.php">Aplicativo</a></li>
		<li><a href="configuracoes.php">Configurações</a></li>
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
