<?php
    $id = null;
    $id_bandeira_cartao = null;
    $numero = null;
    $titular = null;
    $mes_validade = null;
    $ano_validade = null;

    if(isset($_POST['btn-salvar'])){
        require_once('cms/models/cartaoClass.php');
        require_once('cms/models/DAO/cartaoDAO.php');

        $classCartao = new Cartao();
        $classCartao->id_bandeira_cartao = $_POST['id_bandeira_cartao'];
        $classCartao->numero = preg_replace('/\s/', '', $_POST['numero']);
        $classCartao->titular = $_POST['titular'];
        $classCartao->mes_validade = $_POST['mes_validade'];
        $classCartao->ano_validade = $_POST['ano_validade'];
        $classCartao->id_usuario = $_POST['id_usuario'];

        $cartaoDAO = new cartaoDAO();
        if($_POST['btn-salvar'] == "Salvar"){
            $cartaoDAO->insert($classCartao);
        }else{
            $cartaoDAO->id = $_POST['id'];
            $cartaoDAO->update($classCartao);
        }
    }
?>
