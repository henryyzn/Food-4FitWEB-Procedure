<?php @session_start(); ?>
<div class="form-generic width-500px margin-right-auto margin-left-auto margin-top-30px" id="form-cadastrar-endereco">
    <h3 class="form-title">Cadastre um Endereço:</h3>
    <form action="meus-enderecos.php" method="GET" name="frmendereco" class="form-generic-content">
        <label for="logradouro" class="label-generic">Logradouro:</label>
        <input type="text" name="logradouro" id="logradouro" placeholder="Ex: R. Flores/Av. 13 de Maio" class="input-generic">

        <label for="numero" class="label-generic">Número:</label>
        <input type="text" name="numero" id="numero" placeholder="Ex: 845" class="input-generic">

        <label for="bairro" class="label-generic">Bairro:</label>
        <input type="text" name="bairro" id="bairro" placeholder="Ex: Vila Almeida" class="input-generic">

        <label for="complemento" class="label-generic">Complemento:</label>
        <input type="text" name="complemento" id="complemento" placeholder="Ex: Ao lado do shopping" class="input-generic">

        <label for="cep" class="label-generic">CEP:</label>
        <input type="text" name="cep" id="cep" placeholder="Ex: 01234-567" class="input-generic" pattern="\d{5}-\d{3}">

        <label for="estado" class="label-generic">Estado:</label>
        <select name="estado" id="estado" class="input-generic" required>
            <option selected>Selecione uma opção:</option>
            <?php
                $id = $_SESSION['id_usuario'];

                require_once("../cms/models/DAO/estadoDAO.php");

                $estadoDAO = new estadoDAO();
                $lista = $estadoDAO->selectAll();

                for($i = 0; $i < count($lista); $i++){
                    echo($lista[$i]->id);
            ?>
            <option value="<?php ?>"><?php echo($lista[$i]->sigla)?></option>
            <?php
                }
            ?>
        </select>

        <label for="cidade" class="label-generic">Cidade:</label>
        <select name="cidade" id="cidade" class="input-generic">
            <option>Selecione uma opção</option>
        </select>

        <div class="margin-top-30px margin-bottom-30px form-row">
            <span class="margin-right-15px" onclick="fechar()">Cancelar</span>
            <div class="btn-generic">
                <span>Salvar</span>
            </div>
        </div>
    </form>
</div>
<figure class="close-modal" onclick="fechar()">
    <img src="assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>