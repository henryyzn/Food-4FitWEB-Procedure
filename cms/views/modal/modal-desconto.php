
<?php
    require_once('../../models/DAO/descontoDAO.php');
    require_once('../../models/descontoClass.php');

    if(isset($_POST['btn-salvar'])){

        $descontoClass = new Desconto();
        $descontoDAO = new descontoDAO();

        $descontoClass->titulo = $_POST['titulo'];
        $descontoClass->valor = $_POST['valor'];
        $descontoClass->codig_cupom = $_POST['codig_cupom'];
        $descontoClass->validade = $_POST['validade'];
        $descontoClass->ativo = $_POST['ativo'];

        $descontoDAO->insert($descontoClass);
    }
?>
<form name="frmdesconto" action="desconto.php" method="POST" class="form-generic width-100 margin-top-30px margin-bottom-30px">
    <div class="form-generic-content">
        <h2 class="form-title">Cadastrar um desconto</h2>

        <label for="titulo" class="label-generic">Título:</label>
        <input id="titulo" name="titulo" class="input-generic" required>

        <label for="titulo" class="label-generic">Valor novo:</label>
        <input id="valor" name="valor" class="input-generic" required placeholder="R$ 000,00">

        <label for="titulo" class="label-generic">Código do cupom:</label>
        <input id="codig_cupom" name="codig_cupom" class="input-generic" required placeholder="Digite um desconto para o desconto...">

        <label for="titulo" class="label-generic">Validade:</label>
        <input id="validade" name="validade" class="input-generic" required placeholder="Digite uma data de término para o desconto...">

        <input type="hidden" id="ativo" name="ativo" value="1">
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
