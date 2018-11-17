<?php
    require_once('modulo.php');
    validateLog();
?>
<div id="sidebar">
    <div id="sidebar-header">
        <h1>FOOD 4FIT<br><span>CMS</span></h1>
        <a href="#" id="sidebar-collapse">
            <img src="../../assets/images/icons/menu-lateral.svg" alt="Menu Lateral">
        </a>
    </div>
    <div class="separator"></div>
    <div id="perfil">
            <figure id="avatar">
                <img src="../../<?php echo($_SESSION['avatar_funcionario'])?>" alt="Nome do Usuário" onclick="javascript:location.href='perfil.php'">
            </figure>
        <div id="informacoes">
            <div id="informacoes-content">
                <span id="nome" onclick="javascript:location.href='perfil.php'"><?php echo $_SESSION['nome_funcionario'] ?></span>
                <span id="email"><?php echo $_SESSION['email_funcionario'] ?></span>
            </div>
        </div>
    </div>
    <div class="separator"></div>
    <nav>
        <a href="index.php">
            <span class="image"><img src="../../assets/images/cms/icons/pagina-inicial.svg" alt="Dashboard"></span>
            <span class="label">Dashboard</span>
        </a>
        <a href="diario-bordo.php">
            <span class="image"><img src="../../assets/images/cms/icons/diario-de-bordo.svg" alt="Diário de Bordo"></span>
            <span class="label">Diário de Bordo<?php require_once('../models/DAO/diario-bordoDAO.php'); $diarioBordoDAO = new diarioBordoDAO(); $rows = $diarioBordoDAO->contador(); for($i = 0; $i < @count($rows); $i++){ ?><span class="badge"><?php echo($rows[$i]->total)?></span><?php } ?></span>
        </a>
        <a href="pratos.php">
            <span class="image"><img src="../../assets/images/cms/icons/pratos.svg" alt="Pratos"></span>
            <span class="label">Pratos</span>
        </a>
        <a href="ingredientes.php">
            <span class="image"><img src="../../assets/images/cms/icons/ingredientes.svg" alt="Ingredientes"></span>
            <span class="label">Ingredientes</span>
        </a>
        <a href="categoria.php">
            <span class="image"><img src="../../assets/images/cms/icons/categorias.svg" alt="Categorias"></span>
            <span class="label">Categorias</span>
        </a>

        <a href="categorias-prato.php">
            <span class="image"><img src="../../assets/images/cms/icons/categorias.svg" alt="Categorias de Pratos"></span>
            <span class="label">Categorias de Pratos</span>
        </a>
        <a href="categorias-ingredientes.php">
            <span class="image"><img src="../../assets/images/cms/icons/categorias.svg" alt="Categorias de Ingredientes"></span>
            <span class="label">Categorias de Ingredientes</span>
        </a>
        <a href="#">
            <span class="image"><img src="../../assets/images/cms/icons/marketing.svg" alt="Marketing"></span>
            <span class="label">Marketing p/ E-Mail</span>
        </a>
        <a href="#">
            <span class="image"><img src="../../assets/images/cms/icons/niveis-de-acesso.svg" alt="Níveis de Acesso"></span>
            <span class="label">Níveis de Acesso</span>
        </a>
        <a href="pedidos.php">
            <span class="image"><img src="../../assets/images/cms/icons/pedidos.svg" alt="Pedidos"></span>
            <span class="label">Pedidos<?php require_once('../models/DAO/pedidoDAO.php'); $pedidoDAO = new pedidoDAO(); $rows = $pedidoDAO->contador(); for($i = 0; $i < @count($rows); $i++){ ?><span class="badge"><?php echo($rows[$i]->total)?></span><?php } ?></span>
        </a>
        <a href="promocoes.php">
            <span class="image"><img src="../../assets/images/cms/icons/promocao.svg" alt="Promoções"></span>
            <span class="label">Promoções</span>
        </a>
        <a href="descontos.php">
            <span class="image"><img src="../../assets/images/cms/icons/desconto.svg" alt="Descontos"></span>
            <span class="label">Descontos</span>
        </a>
        <a href="fit-session.php">
            <span class="image"><img src="../../assets/images/cms/icons/fit-session.svg" alt="Fit Session"></span>
            <span class="label">Fit Session</span>
        </a>
        <a href="parceiros.php">
            <span class="image"><img src="../../assets/images/cms/icons/parceiros.svg" alt="Parceiros"></span>
            <span class="label">Parceiros</span>
        </a>
        <a href="usuarios.php">
            <span class="image"><img src="../../assets/images/cms/icons/usuarios.svg" alt="Usuários"></span>
            <span class="label">Usuários</span>
        </a>
    </nav>
    <div class="separator"></div>
    <nav>
        <a href="perfil.php">
            <span class="image"><img src="../../assets/images/cms/icons/meu-perfil.svg" alt="Meu perfil"></span>
            <span class="label">Meu perfil</span>
        </a>
        <a href="fale-conosco.php">
            <span class="image"><img src="../../assets/images/cms/icons/fale-conosco.svg" alt="Fale Conosco"></span>
            <span class="label">Fale Conosco<?php require_once('../models/DAO/contatoDAO.php'); $contatoDAO = new contatoDAO(); $rows = $contatoDAO->contador(); for($i = 0; $i < @count($rows); $i++){ ?><span class="badge"><?php echo($rows[$i]->total)?></span><?php } ?></span>
        </a>
        <a href="sobre.php">
            <span class="image"><img src="../../assets/images/cms/icons/sobre-empresa.svg" alt="Sobre a Empresa"></span>
            <span class="label">Sobre a Empresa</span>
        </a>
        <a href="slider.php">
            <span class="image"><img src="../../assets/images/cms/icons/slider.svg" alt="Slider"></span>
            <span class="label">Slider</span>
        </a>
        <a href="lojas.php">
            <span class="image"><img src="../../assets/images/cms/icons/lojas.svg" alt="Nossas Lojas"></span>
            <span class="label">Nossas Lojas</span>
        </a>
        <a href="ajuda.php">
            <span class="image"><img src="../../assets/images/cms/icons/ajuda.svg" alt="Ajuda"></span>
            <span class="label">Ajuda</span>
        </a>
        <a href="login.php" class="btn-logout">
            <span class="image"><img src="../../assets/images/cms/icons/sair.svg" alt="Sair"></span>
            <span class="label">Sair</span>
        </a>
    </nav>
    <div id="tooltip"></div>
</div>
<script>
$(document).ready(function(){
    $("#sidebar-collapse").click(function(event) {
        event.preventDefault();
        $("#sidebar").toggleClass("collapse");
    });
});
</script>
