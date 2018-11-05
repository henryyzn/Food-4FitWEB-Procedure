<?php

?>

<html>
    <head>
        <title>Modal</title>
        <script src="js/jquery.js"></script>
        <script>
        //Código para Modal
        $(document).ready(function(){
            $(".fechar").click(function(){
                //Faz a div container ser aberta na tela usando um efeito
                //slideToggle, toggle, FadeIn, slideDown, etc...
               $(".container").fadeOut(400);
            });

        });

        </script>
    </head>

<body>
    <div class="fechar">
        Fechar
    </div>
    <br>
    <br>
    <br>
    <span style="font-weight:bold;">Nome:</span> <?php echo($nome); ?><br>

</body>
</html>
