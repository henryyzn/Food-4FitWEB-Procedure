<?php
    //require_once("../../controller/FuncionarioController.class.php");
    //$funcionario = FuncionarioController::getFuncionarioAtual();
?>

<div class="profile-wrapper">
	<aside class="profile-aside">
        <?php if ($funcionario->getAvatar()) { ?>
            <figure>
                <img src="../assets/images/<?= $funcionario->getAvatar() ?>" alt="">
            </figure>
        <?php } else { ?>
            <figure data-siglas="<?= $funcionario->getIniciaisNome(); ?>"></figure>
        <?php } ?>

		<h2><?= $funcionario->getNome() ?> <?= $funcionario->getSobrenome() ?></h2>
		<span><?= $funcionario->getEmail() ?></span>
	</aside>
	<div class="profile-content width-500px padding-top-30px">
		<label for="matricula" class="lbl-ext">Matrícula:</label>
		<span class="lbl-result" id="matricula"><?= $funcionario->getMatricula() ?></span>

		<label for="dtefetivacao" class="lbl-ext">Data Efetiv.:</label>
		<span class="lbl-result" id="dtefetivacao"><?= $funcionario->getDataEfetivacao() ?></span>

		<label for="genero" class="lbl-ext">Gênero:</label>
		<span class="lbl-result" id="genero"><?= $funcionario->getGenero() == "M" ? "Masculino" : "Feminino" ?></span>

		<label for="dtnascimento" class="lbl-ext">Data Nasc.:</label>
		<span class="lbl-result" id="dtnascimento"><?= $funcionario->getDataNascimento() ?></span>

		<label for="rg" class="lbl-ext">RG:</label>
		<span class="lbl-result" id="rg"><?= $funcionario->getRg() ?></span>

		<label for="cpf" class="lbl-ext">CPF:</label>
		<span class="lbl-result" id="cpf"><?= $funcionario->getCpf() ?></span>

		<label for="salario" class="lbl-ext">Salário:</label>
		<span class="lbl-result" id="salario"><?= "R$ " . number_format($funcionario->getSalario(), 2, ",", ".") ?></span>
	</div>
</div>
