<header class="animate fast fadeInDown">
    <span id="titulo-pagina"></span>
    <form method="GET" action="search.php" name="frmpesquisa">
        <input type="search" name="search" id="search" placeholder="Pesquise por algo">
        <label for="search-button"><img src="../../assets/images/cms/icons/pesquisa.svg" alt="Pesquisar"></label>
        <input type="submit" class="display-none" name="search-button" id="search-button">
    </form>
    <div>
        <?php require_once("input.html")?>
        <div id="notificacoes" class="padding-left-15px">
            <img src="../../assets/images/cms/icons/notificacoes.svg" alt="Notificações">
            <span>12</span>
        </div>
        <img class="btn-logout" src="../../assets/images/cms/icons/sair-navbar.svg" alt="Sair" onclick="location.href='modulo.php?logout';">
    </div>
</header>
