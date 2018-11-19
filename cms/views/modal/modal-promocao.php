
<?php
    require_once('../../models/DAO/promocaoDAO.php');
    require_once('../../models/promocaoClass.php');

    if(isset($_POST['btn-salvar'])){

        $promocaoClass = new Promocao();
        $promocaoClass->id_prato = $_POST['id_prato'];
        $promocaoClass->desconto = $_POST['desconto'];
        $promocaoClass->data_inicio = $_POST['data_inicio'];
        $promocaoClass->data_termino = $_POST['data_termino'];

        $promocaoDAO = new promocaoDAO();
        $promocaoDAO->insert($promocaoClass);
    }
?>
<form name="frmdesconto" action="modal/modal-promocao.php" method="POST" class="form-generic width-100 margin-top-30px margin-bottom-30px">
    <div class="form-generic-content">
        <h2 class="form-title">Cadastrar uma promoção</h2>

        <label for="id_prato" class="label-generic">Prato:</label>
        <select id="id_prato" name="id_prato" class="input-generic" required>
            <option selected>Selecione uma opção:</option>
            <?php
                require_once("../../models/DAO/pratosDAO.php");
                $pratosDAO = new pratosDAO();
                $lista = $pratosDAO->selectAll();
                for($i = 0; $i < count($lista); $i++){
            ?>
            <option value="<?php echo($lista[$i]->id)?>"><?php echo($lista[$i]->titulo)?></option>
            <?php
                }
            ?>
        </select>

        <label for="desconto" class="label-generic">Valor novo:</label>
        <input id="desconto" name="desconto" class="input-generic" required placeholder="R$ 000,00">
        <script>$('#desconto').mask('000.000.000.000.00', {reverse: true});</script>

        <label for="data_inicio" class="label-generic">Data de Início:</label>
        <input id="data_inicio" name="data_inicio" class="input-generic" required placeholder="Digite uma data de início para a promoção...">
        <script>$('#data_inicio').mask('00/00/0000');</script>

        <label for="data_termino" class="label-generic">Data de Término:</label>
        <input id="data_termino" name="data_termino" class="input-generic" required placeholder="Digite uma data de término para a promoção...">
        <script>$('#data_termino').mask('00/00/0000');</script>

        <div class="form-row">
            <span class="btn-cancelar" onclick="fechar()">Cancelar</span>
            <button type="submit" name="btn-salvar" value="Salvar" class="btn-generic margin-left-20px">
                <span>Salvar</span>
            </button>
        </div>
    </div>
</form>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
