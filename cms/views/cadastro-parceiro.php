<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Parceiros :: Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
        <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
        <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases-light.css">
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/sizes.css">
        <link rel="stylesheet" href="../assets/css/align.css">
        <link rel="stylesheet" href="../assets/css/keyframes.css">
    </head>
    <body>
        <section>
            <?php



                if(isset($_POST['btnSalvar'])){

                    require_once('../models/DAO/parceirosDAO.php');
                    require_once('../models/parceirosClass.php');
                    require_once('../models/DAO/cadastro-usuarioDAO.php');
                    require_once('../models/cadastro-usuarioClass.php');

                    $parceirosClass = new Parceiros();
                    $parceirosDAO = new parceirosDAO();




                    $parceirosClass->nome = $_POST['nome'];
                    //$parceirosClass->titulo = $_POST['titulo'];
                    $parceirosClass->descricao = $_POST['descricao'];
                    $parceirosClass->foto = $_POST['foto'];
                    //$parceirosClass->link1 = $_POST['link'];
                    //$parceirosClass->ativo = $_POST['ativo'];

                    $parceirosDAO->insert($parceirosClass);

                }

            ?>
            <form name="frmParceiros" action="cadastro-parceiro.php" method="post">
                <div class="form-generic">
                    <div class="form-generic-content">
                        <h2 class="form-title">Cadastrar um parceiro</h2>
                        <div>
                            <img>
                            <label for="foto" class="file-label">Escolher Imagem</label>
                            <input id="foto" name="uploadData" type="file" accept="image/*">
                        </div>
                        <span class="label-fix">Nome do Usuário:</span>
                            <p class="label-fix-result">João sei lá das quantas</p>

                            <span class="label-fix">Link para o site:</span>
                            <a href="" class="label-fix-link">www.linkdoparceiro.com</a>

                            <span class="label-fix">Título do Contato:</span>
                            <p class="label-fix-result">Algum Título</p>

                            <span class="label-fix">Descrição:</span>
                            <p class="label-fix-result">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <label for="nome" class="label-generic">Nome do Parceiro:</label>
                        <input type="text" name="nome" id="nome" class="input-generic">

                        <label for="descricao" class="label-generic">Descrição do Parceiro:</label>
                        <textarea name="descricao" id="descricao" class="textarea-generic"></textarea>

                        <div class="form-row">
                            <button type="submit" name="btnSalvar" value="Salvar" class="btn-generic margin-right-20px">
                                <span>Salvar</span>
                            </button>
                            <span class="btn-cancelar">Cancelar</span>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </body>
</html>
