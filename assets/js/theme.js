$(function() {
    var data = localStorage.getItem("CMStheme");
    if (data !== null) {
        var check = $("input[name='CMStheme']").attr("checked", "checked");
        document.getElementById("CMSthemeStyle").href="../../assets/css/cms/stylesheet-cms-dark.css";
        document.getElementById("CMSthemeBases").href="../../assets/css/bases-dark.css";
    }
});
$("input[name='CMStheme']").click(function() {
    if ($(this).is(":checked")) {
        localStorage.setItem("CMStheme", $(this).val());
        document.getElementById("CMSthemeStyle").href="../../assets/css/cms/stylesheet-cms-dark.css";
        document.getElementById("CMSthemeBases").href="../../assets/css/bases-dark.css";
    } else {
        localStorage.removeItem("CMStheme");
        document.getElementById("CMSthemeStyle").href="../../assets/css/cms/stylesheet-cms.css";
        document.getElementById("CMSthemeBases").href="../../assets/css/bases-light.css";
    }
});
