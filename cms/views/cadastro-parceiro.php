<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Food 4fit - CMS</title>
        <link rel="icon" type="image/png" href="../assets/images/icons/favicon.png" />
        <link rel="stylesheet" href="../assets/css/cms/stylesheet-cms.css">
	    <link rel="stylesheet" href="../assets/public/css/jquery.toast.min.css">
        <link rel="stylesheet" href="../assets/public/css/sceditor.theme.min.css">
	    <link rel="stylesheet" href="../assets/css/font-style.css">
        <link rel="stylesheet" href="../assets/css/bases.css">
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

                    //$parceriosClass->id_usuario = $_POST['id_usuario']
                    $parceirosClass->titulo = $_POST['titulo'];
                    $parceirosClass->descricao = $_POST['descricao'];
                    //$parceirosClass->foto = $_POST['foto'];
                    $parceirosClass->link1 = $_POST['link'];

                    $parceirosDAO->insert($parceirosClass);

                }

            ?>
            <form name="frmParceiros" action="cadastro-parceiro.php" method="post">
                <div class="form-generic">
                    <div class="form-generic-content">
                        <h2 class="form-title">Cadastrar um parceiro</h2>

                        <div class="form-column">
                            <label for="titulo" class="label-generic">Nome do Usuário:</label>

                            <?php

                                //$sql = "select * from tbl_usuario where = 1";
                            //$resultado = mysql_query($sql);

                            //$id = ['id'];

                            //$cont=0

                            /*while($rsFoto = mysql_fetch_array($resultado))
                            {
                                $nome = $rsNome['nome'];

                                if($cont%2==0)
                                    $cor="aqua";
                                else
                                    $cor="aquamarine";*/


                            ?>
                            <span id="id_usuario" class="subtitle padding-left-20px padding-bottom-20px"><?php echo($id_usuario)?></span>

                        </div>
                        <div class="form-column">
                            <label for="titulo" class="label-generic">Link do site:</label>
                            <input id="link1" name="link" class="input-generic" required placeholder="Ex.:João da Silva">
                        </div>
                        <div class="form-column">
                            <label for="titulo" class="label-generic">Titulo do contato:</label>
                            <input id="titulo" name="titulo" class="input-generic" required placeholder="Ex.:João da Silva">
                        </div>
                        <div class="form-column">
                            <label for="titulo" class="label-generic">Descrição:</label>
                            <textarea id="descricao" name="descricao" class="textarea-generic" required></textarea>
                        </div>
                        <div class="form-row">
                            <span class="btn-cancelar">Cancelar</span>
                            <button type="submit" name="btnSalvar" value="Salvar" class="btn-generic margin-right-20px">
                                <span>Salvar</span>
                            </button>
                        </div>


                    </div>
                </div>
            </form>
        </section>
    </body>
</html>
