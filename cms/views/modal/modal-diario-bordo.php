<?php
    @session_start();

    if(isset($_POST['modo'])){

        $id = $_POST['id'];

        require_once('../../models/diario-bordoClass.php');
        require_once('../../models/DAO/diario-bordoDAO.php');

        $diarioBordoDAO = new diarioBordoDAO();
        $listDiarioBordo = $diarioBordoDAO->selectInfo($id);

        if(@count($listDiarioBordo)>0){
            $data_nascimento = $listDiarioBordo->data_nascimento;
            $idade = date_diff(date_create($data_nascimento), date_create('now'))->y;
?>
<div id="modal-diario-header" class="margin-top-20px">
    <figure>
        <img src="../../<?php echo($listDiarioBordo->avatar)?>" alt="Avatar do Usuário">
    </figure>
    <h2 class="padding-left-20px">
        Nome: <?php echo($listDiarioBordo->nome)?>, <?php echo($idade)?> anos
        <span id="email-label-modal-diario" class="padding-top-5px"> <?php echo($listDiarioBordo->email)?></span>
    </h2>
</div>
<h2 id="modal-diario-assunto" class="padding-bottom-10px"><?php echo($listDiarioBordo->titulo)?></h2>
<p class="modal-diario-text padding-bottom-30px"><?php echo($listDiarioBordo->texto)?></p>
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
