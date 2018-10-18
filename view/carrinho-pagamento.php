<?php
    $meses = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
    $mes = date("n");
    $ano = date("Y");
?>

<div data-f4f-cart-step="3" class="display-none" style="width: 100%;">
    <?php require_once("carrinho-cadastrar-cartao.php"); ?>
    <section id="shopping-cart-address-block" class="margin-top-15px">
        <h3>PAGAMENTO</h3>
        <p class="shopping-cart-address-subtitle">Selecione ou cadastre um cartão de crédito para<br>confirmar o pagamento do pedido</p>
        <div id="shopping-cart-address-row">
            <div class="shopping-cart-address-column">
                <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Selecione um cartão de crédito:</span>
                <div class="padding-left-30px">
                    <input type="radio" name="cartao" id="input1" value="1">
                    <label for="input1" class="margin-left-5px">VISA ****6002, João Silva</label>
                </div>
                <div class="padding-left-30px padding-top-15px">
                    <input type="radio" name="cartao" id="input2" value="1">
                    <label for="input2" class="margin-left-5px">VISA ****6002, João Silva</label>
                </div>
                <div class="padding-left-30px padding-top-15px">
                    <input type="radio" name="cartao" id="input3" value="1">
                    <label for="input3" class="margin-left-5px">VISA ****6002, João Silva</label>
                </div>
                <span class="save-data-button padding-left-30px padding-top-30px" data-f4f-slide-show="#form-cadastrar-cartao">Cadastrar um cartão</span>
            </div>
            <div class="shopping-cart-address-column">
                <span class="shopping-cart-address-column-title margin-left-30px padding-top-60px margin-bottom-15px">Por segurança...</span>
                <div style="height: auto; position: relative;">
                    <form class="form-generic-content width-600px padding-left-30px" action="#" method="GET" name="frm">
                        <div class="form-row" style="width: 60%;">
                            <div style="width: 60%;">
                                <label for="card-mes" class="label-generic">Mês de Expiração:</label>
                                <select name="mesExpiracao" id="card-mes" class="input-generic" data-card-month>
                                    <?php for ($i = 0; $i < count($meses); $i++) { ?>
                                        <option value="<?= $i + 1 ?>" <?= $i == $mes - 1 ? "selected" : "" ?>><?= $meses[$i] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div style="width: 40%;" class="margin-left-15px">
                                <label for="card-ano" class="label-generic">Ano:</label>
                                <select name="anoExpiracao" id="card-ano" class="input-generic" data-card-year>
                                    <option value="" disabled>Ano</option>
                                    <?php for ($i = $ano; $i < $ano + 15; $i++) { ?>
                                        <option value="<?= $i ?>" <?= $i == $ano ? "selected" : "" ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <label for="card-code" class="label-generic">Código de Segurança</label>
                        <input type="text" name="card-code" id="card-code" placeholder="No verso do cartão..." class="input-generic" style="width: 60%;">
                    </form>
                </div>
            </div>
        </div>
        <div id="total-price" style="">
            <span>Total da compra:<br><b>R$ 000,00</b></span>
        </div>
        <div class="shopping-cart-row-next">
            <span class="padding-left-30px">Passo 2 de 2</span>
            <a href="#" class="margin-right-30px">Cancelar</a>
            <div class="btn-generic margin-right-30px margin-top-30px margin-bottom-30px" id="finalizar-carrinho">
                <span>Finalizar</span>
            </div>
        </div>
    </section>
</div>
