<?php
    @session_start();

    if(isset($_POST['modo'])){

        $id = $_POST['id'];

        require_once('../../models/usuarioClass.php');
        require_once('../../models/DAO/usuarioDAO.php');

        $usuarioDAO = new usuarioDAO();
        $listUsuario = $usuarioDAO->selectId($id);

        if(@count($listUsuario)>0){
            $data_nascimento = $listUsuario->data_nascimento;
            $idade = date_diff(date_create($listUsuario->data_nascimento), date_create('now'))->y;
?>
<div style="width: 100%; height: auto;">
    <figure style="width: 100%; max-width: 200px; height: auto; max-height: 200px; padding: 0; margin: 30px auto;">
        <img src="../../<?php echo($listUsuario->avatar)?>" alt="" style="max-width: 100%; height: auto; display: block; border-radius: 50%;">
    </figure>
    <h2 style="color: black; font-size: 18px; font-family: 'Roboto Bold'; line-height: 23px; text-align: center;"><?php echo($listUsuario->nome)?> <?php echo($listUsuario->sobrenome)?>, <?php echo($idade)?> anos</h2>
    <h3 style="color: #7F7F7F; font-size: 16px; font-family: 'Roboto Medium'; line-height: 21px; text-align: center;" class="padding-bottom-30px"><?php echo($listUsuario->email)?></h3>
</div>
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
