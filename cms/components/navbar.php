<header class="animate fast fadeInDown">
    <span id="titulo-pagina"></span>
        <div>
            <input type="search" placeholder="Pesquise por algo">
            <img src="../../assets/images/cms/icons/pesquisa.svg" alt="Pesquisar">
        </div>
        <div>
            <label for="themeSwitch"><input type="checkbox" id="themeSwitch" class="switch-styled" name="theme" value="1"></label>
            <div id="notificacoes">
                <label for="themeSwitch"><input type="checkbox" id="themeSwitch" class="switch-styled" name="theme" value="1">Dark Mode</label>
                <img src="../../assets/images/cms/icons/notificacoes.svg" alt="Notificações">
                <span>12</span>
            </div>
            <img class="btn-logout" src="../../assets/images/cms/icons/sair-navbar.svg" alt="Sair">
        </div>
</header>
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
