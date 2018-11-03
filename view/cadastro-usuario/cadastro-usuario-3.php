<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>
<div>
    <label for="senha" class="label-generic margin-top-30px">Senha:</label>
    <input type="password" name="senha" id="senha" class="input-generic">

    <label for="confsenha" class="label-generic margin-top-30px">Confirme a Senha:</label>
    <input type="password" name="confsenha" id="confsenha" class="input-generic">

    <label for="perguntasecreta" class="label-generic margin-top-30px">Pergunta Secreta:</label>
    <select name="perguntasecreta" id="perguntasecreta" class="input-generic margin-top-30px">
        <option>Selecione uma opção:</option>

        <?php
            require_once("./cms/models/DAO/pergunta-secretaDAO.php");

            $perguntaDAO = new perguntaDAO();
            $lista = $perguntaDAO->selectAll();
            for($i = 0; $i < count($lista); $i++){


        ?>
        <option value="<?php echo ($lista[$i]->id)?>"><?php echo($lista[$i]->pergunta)?></option>
        <?php
            }
        ?>

    </select>

    <label for="respostasecreta" class="label-generic margin-top-30px">Resposta:</label>
    <input type="text" name="respostasecreta" id="respostasecreta" class="input-generic margin-bottom-60px" required>

    <div class="captcha-container margin-top-30px g-recaptcha"></div>

    <div class="margin-top-30px margin-bottom-30px form-row">
        <span class="margin-right-15px">Cancelar</span>
        <button type="submit" value="Finalizar" class="btn-generic">
            <span>Finalizar</span>
        </button>
    </div>
</div>
