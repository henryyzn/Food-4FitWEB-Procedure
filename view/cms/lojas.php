<?php
    require_once("../../controller/LojaController.class.php");
    $lojas = LojaController::listar();
    $ListaEstado = LojaController::listarEstado();

    //var_dump -> Debugar variavel
   // var_dump($ListaCidade);
?>



<div class="shops-wrapper">
    <section class="shop-form width-100 padding-bottom-30px form-generic">
        <form action="#" class="form-generic-content" id="form-loja">
            <h2 class="form-title">Cadastrar um Local Físico</h2>
            <label for="logradouro" class="label-generic">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro" class="input-generic" placeholder="Ex: R. Athena">

            <label for="numero" class="label-generic">Número:</label>
            <input type="text" name="numero" id="numero" class="input-generic" placeholder="Ex: 438">

            <label for="bairro" class="label-generic">Bairro:</label>
            <input type="text" name="bairro" id="bairro" class="input-generic" placeholder="Ex: JD. Gregório Antunes">

            <label for="estado" class="label-generic">Estado:</label>
            <select type="text" name="idEstado" id="estado" class="input-generic" placeholder="Ex: São Paulo">
            <option value="" disabled selected></option>
                <?php

                foreach($ListaEstado as $estado){
                ?>

                <option value="<?php echo($estado->getId()) ?>"><?php echo($estado->getEstado())?></option>


                    <?php
                        }
                    ?>
                </select>

            <label for="cidade" class="label-generic">Cidade:</label>
            <select type="text" name="idCidade" id="cidade" class="input-generic" placeholder="Ex: Olímpia">


            </select>

            <label for="cep" class="label-generic">CEP:</label>
            <input type="text" name="cep" id="cep" class="input-generic" placeholder="Ex: 17745-111" data-mask="00000-000"
            pattern= "\d{5}-\d{3}">

            <label for="latitude" class="label-generic">Latitude:</label>
            <input type="text" name="latitude" id="latitude" class="input-generic" placeholder="Ex:">

            <label for="Longitude" class="label-generic">Longitude:</label>
            <input type="text" name="longitude" id="longitude" class="input-generic" placeholder="Ex:">

            <label for="telefone" class="label-generic">Telefone Fixo:</label>
            <input type="tel" name="telefone" id="telefone" class="input-generic" placeholder="Ex: (11) 98888-7777" data-mask="(00) 0000-0000" pattern="\(\d{2}\)\s\d{4}-\d{4}">
            <span id="message" class="padding-bottom-20px">Este será o telefone em que clientes próximos desta instalação irão<br>ligar caso exijam alguma informação.</span>

            <label for="funcionamento" class="label-generic">Horário de Funcionamento:</label>
            <textarea name="funcionamento" id="funcionamento" class="textarea-generic"></textarea>
            <div class="form-row">
                <button type="submit" class="btn-generic margin-right-20px">
                    <span>Salvar</span>
                </button>
                <span class="btn-cancelar">Cancelar</span>
            </div>
        </form>
    </section>
    <?php
        require_once("lista-nossas-lojas.php");
    ?>
</div>
