
<?php
    if(isset($_POST['modo'])){

        $id = $_POST['id'];

        require_once('../../models/diario-bordoClass.php');
        require_once('../../models/DAO/diario-bordoDAO.php');

        $diarioBordoDAO = new diarioBordoDAO;
        $listDiarioBordo = $diarioBordoDAO->selectId($id);

        //Resgatando do Banco de dados
        //Guardando em variaveis locais para serem localizadas na caixa de texto após clicar no botão editar
        if(@count($listDiarioBordo)>0){
            $id = $listDiarioBordo->id;
            $id_usuario = $listDiarioBordo->id_usuario;
            $titulo = $listDiarioBordo->titulo;
            $texto = $listDiarioBordo->texto;
            $progresso = $listDiarioBordo->progresso;
            $data = $listDiarioBordo->data;
?>
<h2 class="margin-top-60px"><?php echo($titulo)?></h2>
<p><?php echo($texto)?></p>
<!--
<div class="generic-modal-row margin-top-30px margin-bottom-60px">
    <div class="btn-generic-modal cancel box-shadow margin-left-auto margin-right-15px">
        <span>Recusar</span>
    </div>
    <div class="btn-generic-modal confirm box-shadow margin-right-auto">
        <span>Aceitar</span>
    </div>
</div>
-->
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
