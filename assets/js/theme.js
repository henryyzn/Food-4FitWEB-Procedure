$(function() {
    var data = localStorage.getItem("theme");
    if (data !== null) {
        var check = $("input[name='theme']").attr("checked", "checked");
        document.getElementById("themeStyle").href="../../assets/css/cms/stylesheet-cms-dark.css";
        document.getElementById("themeBases").href="../../assets/css/bases-dark.css";
    }
});
$("input[name='theme']").click(function() {
    if ($(this).is(":checked")) {
        localStorage.setItem("theme", $(this).val());
        document.getElementById("themeStyle").href="../../assets/css/cms/stylesheet-cms-dark.css";
        document.getElementById("themeBases").href="../../assets/css/bases-dark.css";
    } else {
        localStorage.removeItem("theme");
        document.getElementById("themeStyle").href="../../assets/css/cms/stylesheet-cms.css";
        document.getElementById("themeBases").href="../../assets/css/bases-light.css";
    }
});
