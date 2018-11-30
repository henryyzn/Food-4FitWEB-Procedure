<?php
    require_once('../../models/DAO/propagandaDAO.php');
    require_once('../../models/propagandaClass.php');

    if(isset($_POST['btn-salvar'])){

        $classPropaganda = new Propaganda();
        $propagandaDAO = new propagandaDAO();

        $classPropaganda->titulo = $_POST['titulo'];
        $classPropaganda->texto = $_POST['texto'];
        $classPropaganda->imagem = $_POST['imagem'];
        $classPropaganda->ativo = '1';

        $propagandaDAO->insert(classPropaganda);
    }
?>
<form action="upload/upload-propaganda.php" name="frmpropaganda" action="propaganda.php" method="POST" class="form-generic width-100 margin-top-30px margin-bottom-30px">
    <div class="form-generic-content">
        <h2 class="form-title">Cadastrar uma propaganda</h2>

        <label for="titulo" class="label-generic">Título:</label>
        <input id="titulo" name="titulo" class="input-generic" required placeholder="Digite o Titulo...">

        <label for="titulo" class="label-generic">Texto:</label>
        <textarea id="texto" name="texto" class="textarea-generic" required placeholder="Digte o Texto..."></textarea>

        <img>
        <label for="titulo" class="label-generic">Imagem:</label>
                <div id="imagem" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                    <img src='../../assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                </div>
                <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                <input type="file" name="fileimage" id="fotos" style="display: none;">

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
