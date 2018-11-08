<header class="animate fast fadeInDown">
    <span id="titulo-pagina"></span>
        <div>
            <input type="search" placeholder="Pesquise por algo">
            <img src="../../assets/images/cms/icons/pesquisa.svg" alt="Pesquisar">
        </div>
        <div>
            <label for="themeSwitch"><input type="checkbox" id="themeSwitch" class="switch-styled" name="CMStheme" value="1"></label>
            <div id="notificacoes" class="padding-left-15px">
                <img src="../../assets/images/cms/icons/notificacoes.svg" alt="Notificações">
                <span>12</span>
            </div>
            <img class="btn-logout" src="../../assets/images/cms/icons/sair-navbar.svg" alt="Sair">
        </div>
</header>
<script>
    $(function() {
        var data = localStorage.getItem("CMStheme");
        if (data !== null) {
            var check = $("input[name='CMStheme']").attr("checked", "checked");
            document.getElementById("themeStyle").href="../../assets/css/cms/stylesheet-cms-dark.css";
            document.getElementById("themeBases").href="../../assets/css/bases-dark.css";
        }
    });
    $("input[name='CMStheme']").click(function() {
        if ($(this).is(":checked")) {
            localStorage.setItem("CMStheme", $(this).val());
            document.getElementById("themeStyle").href="../../assets/css/cms/stylesheet-cms-dark.css";
            document.getElementById("themeBases").href="../../assets/css/bases-dark.css";
        } else {
            localStorage.removeItem("CMStheme");
            document.getElementById("themeStyle").href="../../assets/css/cms/stylesheet-cms.css";
            document.getElementById("themeBases").href="../../assets/css/bases-light.css";
        }
    });
</script>
