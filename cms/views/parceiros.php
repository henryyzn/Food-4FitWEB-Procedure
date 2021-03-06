<?php
    session_start();
    $id = null;
    $id_usuario = null;
    $titulo = null;
    $descricao = null;
    $foto = null;
    $link1 = null;
    $ativo = null;

    require_once('../models/parceirosClass.php');
    require_once('../models/DAO/parceirosDAO.php');

    $parceirosDAO = new parceirosDAO();

    if(isset($_GET['modo'])){
        $modo = $_GET['modo'];
        if($modo == 'excluir'){
            $id = $_GET['id'];
            $parceirosDAO->delete($id);
        }elseif($modo == 'ativar'){
            $id = $_GET['id'];
            $parceirosDAO->active($id);
        }elseif($modo == 'desativar'){
            $id = $_GET['id'];
            $parceriosDAO->desactive($id);
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros :: Food 4fit - CMS</title>
    <link rel="icon" type="image/png" href="../../assets/images/icons/favicon.png" />
    <link rel="stylesheet" id="CMSthemeStyle" href="../../assets/css/cms/stylesheet-cms.css">
    <link rel="stylesheet" id="CMSthemeBases" href="../../assets/css/bases.css">
    <link rel="stylesheet" href="../../assets/public/css/jquery.toast.min.css">
    <link rel="stylesheet" href="../../assets/public/css/sceditor.theme.min.css">
    <link rel="stylesheet" href="../../assets/css/font-style.css">
    <link rel="stylesheet" href="../../assets/css/sizes.css">
    <link rel="stylesheet" href="../../assets/css/align.css">
    <link rel="stylesheet" href="../../assets/css/keyframes.css">
    <script src="../../assets/public/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/scripts.js"></script>
    <script src="../../assets/js/js.cookie.js"></script>
</head>
<body>
    <section id="main">

        <?php require_once("../components/sidebar.php") ?>
        <div id="main-content">
            <?php require_once("../components/navbar.php")?>
            <div id="page-content">
                <div class="parceiros-wrapper">
                    <div>
                        <div class="btn-generic margin-top-20px margin-bottom-20px margin-right-10px">
                            <span>Pendentes</span>
                        </div>
                        <div class="btn-generic margin-top-20px margin-bottom-20px margin-left-10px">
                            <span>Aceitos</span>
                        </div>
                    </div>
                    <table class="cms-table">
                        <tr>
                            <td><span class="cms-table-title">NOME</span></td>
                            <td><span class="cms-table-title">TÍTULO</span></td>
                            <td><span class="cms-table-title">DESCRIÇÃO</span></td>
                            <td><span class="cms-table-title">LINK</span></td>
                            <td colspan="3"><span class="cms-table-title">OPÇÕES</span></td>
                        </tr>
                        <?php
                            require_once("../../cms/models/DAO/parceirosDAO.php");

                            $parceirosDAO = new parceirosDAO();

                            $lista = $parceirosDAO->selectAll();

                            for($i = 0; $i < count($lista); $i++){
                        ?>

                        <tr>
                            <td><span class="cms-table-result"><?php echo($lista[$i]->id)?></span></td>
                            <td><span class="cms-table-result"><?php echo($lista[$i]->titulo)?></span></td>
                            <td><span class="cms-table-result"><?php echo($lista[$i]->descricao)?></span></td>
                            <td><a href="#" class="cms-table-result"><?php echo($lista[$i]->link1)?></a></td>
                            <td colspan="3">
                                <div class="cms-table-opts">
                                    <img src="../../assets/images/cms/symbols/visualizar.svg" alt="" onclick="javascript:location.href='parceiros.php?modo=visualizar&id=<?php echo($lista[$i]->id)?>'">
                                    <hr/>
                                    <img src="../../assets/images/cms/symbols/excluir.svg" alt="" onclick="javascript:location.href='add-pub-parceiros.php?modo=excluir&id=<?php echo($lista[$i]->id)?>'">
                                    <hr/>
                                    <img src="../../assets/images/cms/symbols/direita.svg" alt="">
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                       ?>
                    </table>
                    <section class="aside-register-menu form-generic">
                        <form action="#" class="form-generic-content width-500px" method="post">
                            <h2 class="form-title">Cadastrar um Parceiro</h2>

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
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <script src="../../assets/js/theme.js"></script>
</body>
</html>
