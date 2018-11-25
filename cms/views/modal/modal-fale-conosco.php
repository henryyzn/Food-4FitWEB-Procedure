<?php
    @session_start();

    require_once($_SESSION['path'].'cms/models/DAO/contatoDAO.php');
    require_once($_SESSION['path'].'cms/models/contatoClass.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $contatoDAO = new contatoDAO();

        $message = $contatoDAO->selectId($id);

        if(@count($message)>0){
?>
<div id="modal-diario-header" class="margin-top-20px">
    <figure style="">
        <img src="../../assets/archives/avatares/padrao.png" alt="Avatar do Usuário">
    </figure>
    <h2 class="padding-left-20px">
        Nome: <?php echo($message->nome)?> <?php echo($message->sobrenome)?> 
    </h2>
</div>
<h2 id="modal-diario-assunto" class="padding-bottom-10px"><?php echo($message->assunto)?></h2>
<p class="modal-diario-text padding-bottom-30px"><?php echo($message->observacao)?></p>
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>