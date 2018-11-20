<?php
    if(isset($_POST['modo'])){

        $id = $_POST['id'];

        require_once('../../models/caso-sucessoClass.php');
        require_once('../../models/DAO/caso-sucessoDAO.php');

        $casoSucessoDAO = new casoSucessoDAO;
        $listCasoSucesso = $casoSucessoDAO->selectId($id);

        if(@count($listCasoSucesso)>0){
            $idade = date_diff(date_create($listCasoSucesso->data_nascimento), date_create('now'))->y;
?>
<div id="modal-diario-header" class="margin-top-20px">
    <figure style="">
        <img src="../../<?php echo($listCasoSucesso->avatar)?>" alt="Avatar do Usuário">
    </figure>
    <h2 class="padding-left-20px">
        Nome: <?php echo($listCasoSucesso->nome)?>, <?php echo($idade)?> anos
        <span id="email-label-modal-diario" class="padding-top-5px"> <?php echo($listCasoSucesso->email)?></span>
    </h2>
</div>
<h2 id="modal-diario-assunto" class="padding-bottom-10px"><?php echo($listCasoSucesso->titulo)?></h2>
<p class="modal-diario-text padding-bottom-30px"><?php echo($listCasoSucesso->texto)?></p>
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
