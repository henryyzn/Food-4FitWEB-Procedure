<?php
    session_start();

    $id = null;
    $titulo = null;
    $texto = null;
    $imagem = null;
    $ativo = "Salvar";

    if(isset($_GET['btn-salvar'])){
        require_once('../models/propagandaClass.php');
        require_once('../models/DAO/propagandaDAO.php');

        $classPropaganda = new Propaganda();
        $classPropaganda->id = $_GET['id'];
        $classPropaganda->titulo = $_GET['titulo'];
        $classPropaganda->texto = $_GET['texto'];
        $classParceiros->imagem = $_GET['imagem'];
        $classPropaganda->ativo = '1';

        $propagandaDAO = new propagandaDAO();

        if($_GET['btn-salvar'] == "Salvar"){
           $propagandaDAO->insert($classPropaganda);
       }elseif($_GET['btn-salvar'] == "Editar"){
           $classPropaganda->id = $_GET['id'];
           $propagandaDAO->update($classPropaganda);

       }

    }
?>
<body>
        <section>
            <form name="frmpropaganda" action="cadastro-propaganda.php" method="GET">
                <div class="form-generic">
                    <div class="form-generic-content">
                        <h2 class="form-title">Cadastrar uma propaganda</h2>
                        <div>
                            <form action="upload/upload-propaganda.php" method="POST" name="frmfoto" enctype="multipart/form-data" class="form-generic-content" id="frmfoto">

                            <label class="label-generic">Imagem:</label>
                            <div id="view" class="register_product_image padding-bottom-30px" style="width: 100%; height: auto; border-radius: 3px; overflow: hidden;">
                                <img src='../../assets/images/simbols/upload.svg' alt="Imagem a ser cadastrada" class="image-view">
                            </div>
                            <label for="fotos" class="file-generic fileimage">Selecione um arquivo...</label>
                            <input type="file" name="fileimage" id="imagem" style="display: none;">
                        </form>

                        </div>
                        <span class="label-fix">Titulo:</span>
                        <input type="text" name="titulo" id="titulo" class="input-generic">

                        <label for="descricao" class="label-generic">Texto:</label>
                        <textarea name="texto" id="texto" class="textarea-generic"></textarea>

                        <div class="form-row">
                            <button type="submit" name="btn-salvar" value="Salvar" class="btn-generic margin-right-20px">
                                <span>Salvar</span>
                            </button>
                            <div class="form-row">
            <span class="btn-cancelar" onclick="fechar()">Cancelar</span>

        </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </body>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
