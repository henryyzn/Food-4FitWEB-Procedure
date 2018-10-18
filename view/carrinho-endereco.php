<div data-f4f-cart-step="2" class="display-none" style="width: 100%;">
    <?php require_once("carrinho-cadastrar-endereco.html"); ?>
    <section id="shopping-cart-address-block" class="padding-top-15px">
        <h3>ENDEREÇO DE ENTREGA</h3>
        <p class="shopping-cart-address-subtitle">Selecione ou cadastre um endereço de entrega</p>
        <div id="shopping-cart-address-row">
            <div class="shopping-cart-address-column">
                <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um endereço:</span>
                <div class="padding-left-30px">
                    <input type="radio" name="endereco" id="input1" value="1">
                    <label for="input1" class="margin-left-5px">R. Silverstone, 391, JD. Flores, Jandira, SP</label>
                </div>
                <div class="padding-left-30px padding-top-15px">
                    <input type="radio" name="endereco" id="input2" value="1">
                    <label for="input2" class="margin-left-5px">R. São Roque, 142, Lago dos Cisnes, Barueri, SP</label>
                </div>
                <div class="padding-left-30px padding-top-15px">
                    <input type="radio" name="endereco" id="input3" value="1">
                    <label for="input3" class="margin-left-5px">Av. Centuri, 938, João Bosques, Carapicuíba, SP</label>
                </div>
                <span class="save-data-button padding-left-30px padding-top-20px" data-f4f-slide-show="#form-cadastrar-endereco">Cadastrar um endereço</span>
            </div>
            <div class="shopping-cart-address-column">
                <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Frete:</span>
                <p class="padding-left-30px">Frete Gerado: <b>R$ 00,00</b></p>
            </div>
        </div>
        <div id="total-price" style="">
            <span>Total da compra:<br><b>R$ 000,00</b></span>
        </div>
        <div class="shopping-cart-row-next">
            <span class="padding-left-30px">Passo 1 de 2</span>
            <a href="#" class="margin-right-30px">Cancelar</a>
            <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px" data-f4f-cart-change-step="3">
                <span>Próximo</span>
            </div>
        </div>
    </section>
    <div class="shopping-cart-block">
        <div class="shopping-cart-title-menu margin-top-30px">
            <div class="shopping-cart-menu-column align">
                <span class="padding-top-15px padding-bottom-15px">IMAGEM</span>
            </div>
            <div class="shopping-cart-menu-column align">
                <span class="padding-top-15px padding-bottom-15px">INFORMAÇÕES</span>
            </div>
            <div class="shopping-cart-menu-column align">
                <span class="padding-top-15px padding-bottom-15px">PREÇO UNIT.</span>
            </div>
            <div class="shopping-cart-menu-column align">
                <span class="padding-top-15px padding-bottom-15px">QUANTIDADE</span>
            </div>
            <div class="shopping-cart-menu-column align">
                <span class="padding-top-15px padding-bottom-15px">SUBT0TAL</span>
            </div>
        </div>
        <section class="shopping-cart-grid">
            <div class="shopping-cart-row">
                <div class="shopping-cart-column">
                    <figure class="shopping-cart-image-container">
                        <img src="assets/images/dishs/img1.jpg" alt="Nome do Prato">
                    </figure>
                </div>
                <div class="shopping-cart-column">
                    <h2 class="padding-bottom-5px">Nome do Prato</h2>
                    <h3 class="padding-bottom-15px">Categoria: Nome da Categoria</h3>
                </div>
                <div class="shopping-cart-column align">
                    <span id="shopping-cart-price">R$ 000,00</span>
                </div>
                <div class="shopping-cart-column align">
                    <span id="shopping-cart-qty">QTD: 3</span>
                </div>
                <div class="shopping-cart-column align">
                    <span id="shopping-cart-price-total">R$ 000,00</span>
                </div>
            </div>
        </section>
    </div>
</div>
