$(document).ready(function () {
    $("#openform").click(function () {
        $("#add-form").slideToggle("fast");
    });

    $("#navbar-flat-menu").click(function () {
        $("#sidebar-left").fadeIn("fast");
    });

    $("#sidebar-left-close").click(function () {
        $("#sidebar-left").fadeOut("fast");
    });

    $("#navbar-flat-login, #user-bubble").click(function () {
        $("#sidebar-right").fadeIn("fast");
    });

    $("#sidebar-right-close").click(function () {
        $("#sidebar-right").fadeOut("fast");
    });

    $("#show").click(function () {
        $('.dish-form').css('display', 'block');
        $('.dish-form').addClass("animate fadeInUp");
    });

    $("#open-form").click(function () {
        $("#painel-lateral").slideToggle("fast");
    });

    $("#open-prato-form").click(function () {
        $("#add-prato-form").slideToggle("fast");
    });

    $("#open").click(function () {
        $(".form-generic").slideToggle(200);
    });

    $("#fechar").click(function () {
        $(".form-generic").fadeOut(200);
    });

    $("#comentario").click(function () {
        $('.publication-comments').slideToggle(50);
    });

    $('.data').mask('00/00/0000');
    $('.cep').mask('00000-000');
    $('.telefone').mask('(00) 0000-0000');
    $('.celular')
        .mask('(99) 99999-9999')
        .focusout(function (event) {
            let target, phone, element;
            target = (event.currentTarget) ? 
                     event.currentTarget : 
                     event.srcElement;
            phone = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();
            if (phone.length > 10) {
                element.mask("(99) 99999-9999");
            } else {
                element.mask("(99) 9999-99999");
            }
        });
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.real').mask('000.000.000.000.00', {reverse: true});

    $("#form-cadastro-usuario").submit(function (event) {
        event.preventDefault();
        var userData = formToObject($(this).serializeArrayDisabled());
        this.reset();
        $("#modal-cadastro").addClass("display-flex");

        var counter = 5;
        var interval = setInterval(function () {
            $("#modal-cadastro .counter").text(--counter);
            if (counter == 0) {
                clearInterval(interval);
                location.href = "index.php";
            }
        }, 1000);
    });

    $('#foto').on('change', function(){
        $('#frmfoto').ajaxForm({
            target:'#visualizar'
        }).submit();
    });

    if ($.fn.responsiveSlides) {
        $("#slider").responsiveSlides({
            nav: true,
            prevText: "&lt;",
            nextText: "&gt;",
            speed: 1000,
            timeout: 4500
        });
    }

    $("[data-f4f-number-group]").each(function () {
        var input = $(this).find("input");
        $(this).on("click", "[data-f4f-number-decrement], [data-f4f-number-increment]", function () {
            var number = parseInt(input.val());
            if ($(this).is("[data-f4f-number-increment]")) {
                number += 1;
            } else {
                number -= 1;
            }

            number = Math.max(1, Math.min(1000, number));
            input.val(number);
        });
    });

    $("#finalizar-carrinho").on("click", function () {
        $("#modal-carrinho").addClass("display-flex");
    });

    //Função para mostrar mais itens de uma listagem
    (function($) {
        //Setamos o valor inicial da listagem
        var count = 9;

        //Setamos o valor inicial do index para o laço for
        var i = null;

        //Escondemos todos os elementos maior que o valor inicial
        $(".item").slice(count).hide();

        //Declaramos uma ação de click no botão 'see-more'
        $('#see-more').click(function() {

            //Somamos a quantidade nova a ser exibida
            count += 9;

            //Rodamos o loop no valor total
            for (i = 0; i < count; i++) {
                //Mostramos o item
                $('.item').eq(i).show();
            }
        });
        //Fazemos com que a função fique encapsulada
    }(jQuery));

});

function fechar(){
    $('.generic-modal').css('display', 'none');
}

//Essa função chama uma modal que permite a passagem de um ID
//O ID é sempre o identificador do item
//O Path é o nome do arquivo da modal depois do primeiro traço
function modalDouble(id, path){
    var modal = $('.close-modal');
    $('.generic-modal').css('display', 'flex');
    $.ajax({
        url: "modal/modal-" + path + ".php",
        type: "POST",
        data: {modo: 'modal', id:id},
        dataType: "html"
        }).done(function(dados){
            $('.generic-modal-wrapper').html(dados);
        }).fail(function(dados){
            alert("Erro ao abrir.");
        });
}
//Essa função chama uma modal apenas pra visualização
//O Path é o nome do arquivo da modal depois do primeiro traço
function modal(path){
    var modal = $('.close-modal');
    $('.generic-modal').css('display', 'flex');
    $.ajax({
        url: "modal/modal-" + path + ".php",
        type: "POST",
        data: {modo: 'modal'},
        dataType: "html"
        }).done(function(dados){
            $('.generic-modal-wrapper').html(dados);
        }).fail(function(dados){
            alert("Erro ao abrir.");
        });
}


