<?php
  require_once("../../controller/LojaController.class.php");
    $lojas = LojaController::listar();
?>


        <div class="shops-view">
        <!-- Listando o conteudo do banco-->
        <!-- data - guardar dados dentro de algum lugar, criando quanats eu quiser, usando somente nas TAG'S -->
        <?php foreach ($lojas as $loja) { ?>
            <section class="shop-card" data-id="<?php echo($loja->getId())?>">
                <h2><?= $loja->getEstado() ?> - <?php echo $loja->getAtivo() ? "Ativo" : "Desativado" ?></h2>
                <h3><?= $loja->getLogradouro() ?>, <?= $loja->getNumero() ?>, <?= $loja->getBairro() ?>, <?= $loja->getCidade() ?> - <?= $loja->getUf() ?>, <?= $loja->getCep() ?></h3>
                <div>
                    <span class="loja-editar">Editar</span>
                    <span class="deletar-loja">Excluir</span>

                    <span class="loja-ativa">Ativar/Desativar</span>
                </div>
            </section>
        <?php } ?>

    </div>
