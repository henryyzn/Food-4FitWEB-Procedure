<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Personal Fitness - Food 4Fit</title>
	<link rel="icon" type="image/png" href="assets/images/icons/favicon.png"/>
	<link rel="stylesheet" id="themeStyle" href="assets/css/style-light.css">
    <link rel="stylesheet" id="themeBases" href="assets/css/bases-light.css">
    <link rel="stylesheet" id="themeNavbar" href="assets/css/navbar-light.css">
    <link rel="stylesheet" id="themeFooter" href="assets/css/footer-light.css">
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/font-style.css">
    <link rel="stylesheet" href="assets/css/align.css">
    <link rel="stylesheet" href="assets/css/keyframes.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
	<script src="assets/public/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/scripts.js"></script>
	<script>
        // Identificar o clique no menu
        // Verificar o item que foi clicado e fazer referência com o alvo
        // Verificar a distância entre o alvo e o topo
        // Animar o scroll até o alvo

        const menuItems = document.querySelectorAll('.button a[href^="#"]');

        function getScrollTopByHref(element) {
            const id = element.getAttribute('href');
            return document.querySelector(id).offsetTop;
        }

        function scrollToPosition(to) {
          // Caso queira o nativo apenas
            // window.scroll({
            // top: to,
            // behavior: "smooth",
            // })
          smoothScrollTo(0, to);
        }

        function scrollToIdOnClick(event) {
            event.preventDefault();
            const to = getScrollTopByHref(event.currentTarget)- 134;
            scrollToPosition(to);
        }

        menuItems.forEach(item => {
            item.addEventListener('click', scrollToIdOnClick);
        });

        // Caso deseje suporte a browsers antigos / que não suportam scroll smooth nativo
        /**
         * Smooth scroll animation
         * @param {int} endX: destination x coordinate
         * @param {int) endY: destination y coordinate
         * @param {int} duration: animation duration in ms
         */
        function smoothScrollTo(endX, endY, duration) {
          const startX = window.scrollX || window.pageXOffset;
          const startY = window.scrollY || window.pageYOffset;
          const distanceX = endX - startX;
          const distanceY = endY - startY;
          const startTime = new Date().getTime();

          duration = typeof duration !== 'undefined' ? duration : 400;

          // Easing function
          const easeInOutQuart = (time, from, distance, duration) => {
            if ((time /= duration / 2) < 1) return distance / 2 * time * time * time * time + from;
            return -distance / 2 * ((time -= 2) * time * time * time - 2) + from;
          };

          const timer = setInterval(() => {
            const time = new Date().getTime() - startTime;
            const newX = easeInOutQuart(time, startX, distanceX, duration);
            const newY = easeInOutQuart(time, startY, distanceY, duration);
            if (time >= duration) {
              clearInterval(timer);
            }
            window.scroll(newX, newY);
          }, 1000 / 60); // 60 fps
        };
    </script>
</head>
<body>
	<?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
	<header class="personal-fitness-block animate fadeIn fast">
		<div class="personal-fitness-content">
	        <figure class="column1 animate fadeInLeft">
	            <img src="assets/images/backgrounds/men.png" alt="Personal Fitness" style="width: 460px; height: 460px; display: block; object-fit: cover;">
	        </figure>
	        <div class="column2 animate fadeInRight">
	        	<h2>PERSONAL FITNESS</h2>
	        	<p>A vida fitness simplificada<br>como você nunca viu.</p>
	        </div>
	    </div>
	    <div style="width: 100%; position: absolute; bottom: 60px;">
	    	<div class="button animate fadeInUp">
	    		<a href="#archor">Ver Mais</a>
	   	 	</div>
	    </div>
    </header>
    <section class="main" style="margin: 0 auto;" id="archor"><!-- CONTAINER-MÃE DO SITE -->
    	<h2 id="page-title">PUBLICAÇÕES</h2>
        <div class="personal-fitness-pubs-block width-medium margin-top-15px">
            <?php
                require_once("cms/models/DAO/personal-fitnessDAO.php");

                $personalFitnessDAO = new personalFitnessDAO();

                $lista = $personalFitnessDAO->selectAll();

                for($i = 0; $i < count($lista); $i++){
            ?>
        	<div class="pub-row margin-bottom-20px">
        		<h2 class="padding-top-15px padding-left-15px"><?php echo($lista[$i]->titulo)?></h2>
        		<a href="publicacao-personal-fitness.php?publication&id=<?php echo($lista[$i]->id)?>" class="margin-left-15px margin-bottom-15px">Ler Mais</a>
        		<span class="padding-left-15px padding-bottom-5px"><b>Postado:</b> <?php echo($lista[$i]->data)?></span>
        		<span class="padding-left-15px padding-bottom-15px"><b>Autor:</b> <?php echo($lista[$i]->id_funcionario)?></span>
        	</div>
        	<?php
                }
            ?>
        </div>
	</section>
	<?php require_once("components/footer.html"); ?><!-- RODAPÉ VIA PHP -->
</body>
</html>
