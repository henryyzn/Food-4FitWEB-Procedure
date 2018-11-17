<?php
    require_once('../../models/DAO/descontoDAO.php');
    require_once('../../models/descontoClass.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $contatoDAO = new contatoDAO();

        $message = $contatoDAO->selectId($id);

        if(@count($message)>0){
?>
<div id="modal-diario-header" class="margin-top-20px">
    <figure style="">
        <img src="../../<?php echo($avatar)?>" alt="Avatar do Usuário">
    </figure>
    <h2 class="padding-left-20px">
        Nome: <?php echo($nome)?>, <?php echo($idade)?> anos
        <span id="email-label-modal-diario" class="padding-top-5px"> <?php echo($email)?></span>
    </h2>
</div>
<h2 id="modal-diario-assunto" class="padding-bottom-10px"><?php echo($assunto)?></h2>
<p class="modal-diario-text padding-bottom-30px"><?php echo($depoimento)?></p>
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
<?php
        }
    }
?>
