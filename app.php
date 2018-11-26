<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Baixe o App Food 4Fit</title>
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
    <script src="assets/public/js/jquery.mask.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</head>
<body>
    <?php require_once("components/navbar.php"); ?><!-- BARRA DE NAVEGAÇÃO VIA PHP -->
    <header class="app-header">
        <img src="assets/images/app/app-cover.jpg" alt="Download do aplicativo">
        <div class="app-header-overlay">
            <div class="app-header-overlay-wrapper">
                <div class="app-header-overlay-column">
                    <figure class="app-header-overlay-figure padding-top-50px animate fadeInDown">
                        <img src="assets/images/app/app.png" alt="App Food 4Fit">
                    </figure>
                </div>
                <section class="app-header-overlay-column animate fadeInLeft">
                    <h2 class="margin-left-30px">APP <strong>FOOD 4FIT</strong></h2>
                    <h3 class="margin-left-30px">DIETAS FITNESS</h3>
                    <p class="margin-left-30px">Aproveitar a vida fitness nunca foi tão fácil.</p>
                    <div>
                        <div class="btn-generic-fancy see-more margin-left-30px margin-top-20px">
                            <a href="#app">Ver Mais</a>
                        </div>
                        <div class="btn-generic margin-left-15px margin-top-20px">
                            <span>Baixar</span>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </header>
    <article class="app-block padding-bottom-30px" id="app">
        <h2 class="padding-top-60px">NA PALMA DA MÃO</h2>
        <div class="app-wrapper">
            <section class="app-wrapper-column right">
                <h2>Controle suas dietas</h2>
                <p>Com o aplicativo da Food 4Fit, você consegue administrar dietas fitness de forma muito mais fácil e intuitiva.</p>
                <div class="btn-generic margin-top-20px">
                    <span>Baixar</span>
                </div>
            </section>
            <div class="app-wrapper-column">
                <figure class="app-wrapper-figure">
                    <img src="assets/images/app/app-3d.png" alt="App Food 4Fit">
                </figure>
            </div>
        </div>
    </article>
    <section class="app-caracteristicas">
        <img src="assets/images/app/app-bg.jpg" alt="App Food 4Fit" class="app-caracteristicas-img">
        <div class="app-caracteristicas-overlay">
            <div class="app-caracteristicas-overlay-wrapper">
                <article class="app-caracteristicas-card">
                    <figure class="margin-top-30px">
                        <img src="assets/images/app/dieta.png" alt="Dietas">
                    </figure>
                    <h2 class="padding-top-30px">CONTROLE DE DIETAS</h2>
                    <p class="padding-bottom-30px">Monte e controle suas próprias dietas fitness</p>
                </article>

                <article class="app-caracteristicas-card">
                    <figure class="margin-top-30px">
                        <img src="assets/images/app/compras.png" alt="Dietas">
                    </figure>
                    <h2 class="padding-top-30px">NOTIFICAÇÕES DE COMPRAS</h2>
                    <p class="padding-bottom-30px">Notificações sobre compras reservadas</p>
                </article>

                <article class="app-caracteristicas-card">
                    <figure class="margin-top-30px">
                        <img src="assets/images/app/agua.png" alt="Dietas">
                    </figure>
                    <h2 class="padding-top-30px">CONTROLE DE HIDRATAÇÃO</h2>
                    <p class="padding-bottom-30px">Mantenha-se sempre em alerta sobre a sua hidratação corporal</p>
                </article>
            </div>
        </div>
    </section>
    <?php require_once("components/footer.html"); ?>
    <script>
        $(document).ready(function() {
	
            var headerHeight = $('nav').outerHeight(); // Target your header navigation here
            
            $('.btn-generic-fancy a').click(function(e) {
                
                var targetHref   = $(this).attr('href');
                
            $('html, body').animate({
                scrollTop: $(targetHref).offset().top - headerHeight // Add it to the calculation here
            }, 1000);
            
            e.preventDefault();
            });
        });
        
        //Função que limita a quantidade de vezes que um trecho de código é executado
        debounce = function(func, wait, immediate){
            var timeout;
            return function(){
                var context = this, args = arguments;
                var later = function(){
                    timeout = null;
                    if(!immediate) func.apply(context, args);
                };
                var callNow = immediate && !timeout;
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
                if (callNow) func.apply(context, args);
            };
        };
        
        //Função que anima o scroll suave
        (function(){
            //Variavel da classe animar com o calculo sobre a navbar
            var $target = $('.anime'),
                animationClass = 'anime-start',
                offset = $(window).height() * 3/4;
            
            //Função que anima o scroll em si
            function animeScroll(){
                //Pega distância do topo do elemento
                var documentTop = $(document).scrollTop();
                $target.each(function(){
                    var itemTop = $(this).offset().top;
                    if(documentTop > itemTop - offset){
                        //Adiciona a classe de animação caso o topo do documento seja maior que o calculo
                        $(this).addClass(animationClass);
                    }else{
                        //Remove a classe de animação caso o topo do documento seja maior que o calculo
                        $(this).removeClass(animationClass);
                    }
                });
            }
        
            animeScroll();
        
            $(document).scroll(debounce(function(){
                animeScroll();
            }, 80));
        }());
    </script>
</body>
</html>
