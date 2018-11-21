<?php
    if(isset($_POST['modo'])){

        $id = $_POST['id'];

        require_once('C:/xampp/htdocs/arisCodeProcedural/cms/models/categorias-ingredientesClass.php');
        require_once('../../models/DAO/categorias-ingredientesDAO.php');

        $catIngredienteDAO  = new catIngredienteDAO();
        $listIngrediente = $catIngredienteDAO->selectId($id);

        if(@count($listIngrediente)>0){
            $id = $listIngrediente->id;
            $titulo = $listIngrediente->titulo;
            $foto = $listIngrediente->foto;
            $ativo = $listIngrediente->ativo;

?>
<div id="modal-diario-header" class="margin-top-20px">

    <h2 class="padding-left-20px">
        Titulo: <?php echo($listIngrediente->titulo)?>
        <span id="email-label-modal-diario" class="padding-top-5px"></span>
    </h2>
</div>
<h2 id="modal-diario-assunto" class="padding-bottom-10px">
    <img src="../../<?php echo($listIngrediente->foto)?>">
<p class="modal-diario-text padding-bottom-30px"></p>
<?php
        }
    }
?>
<figure class="close-modal" onclick="fechar()">
    <img src="../../assets/images/icons/delete.svg" alt="Fechar Modal">
</figure>
