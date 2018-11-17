<?php
    require_once('../../models/DAO/descontoDAO.php');
    require_once('../../models/descontoClass.php');

    if(isset($_POST['btn-salvar'])){

        $classDesconto = new Desconto();
        $descontoDAO = new descontoDAO();

        $classDesconto->titulo = $_POST['titulo'];
        $classDesconto->valor = $_POST['valor'];
        $classDesconto->codig_cupom = $_POST['codig_cupom'];
        $validade = date('Y/m/d', strtotime($_POST['validade']));
        $classDesconto->validade = $validade;
        $classDesconto->ativo = '1';

        $descontoDAO->insert($classDesconto);
    }
?>
<form name="frmdesconto" action="modal/modal-desconto.php" method="POST" class="form-generic width-100 margin-top-30px margin-bottom-30px">
    <div class="form-generic-content">
        <h2 class="form-title">Cadastrar um desconto</h2>

        <label for="titulo" class="label-generic">Título:</label>
        <input id="titulo" name="titulo" class="input-generic" required>

        <label for="titulo" class="label-generic">Valor novo:</label>
        <input id="valor" name="valor" class="input-generic" required placeholder="R$ 000,00">
        <script>$('#valor').mask('000.000.000.000.00', {reverse: true});</script>

        <label for="titulo" class="label-generic">Código do cupom:</label>
        <input id="codig_cupom" name="codig_cupom" class="input-generic" required placeholder="Digite um código para o desconto...">

        <label for="titulo" class="label-generic">Validade:</label>
        <input id="validade" name="validade" class="input-generic" required placeholder="Digite uma data de término para o desconto...">
        <script>$('#validade').mask('00/00/0000');</script>

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
