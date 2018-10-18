<?php
    require_once("../../controller/FaleConoscoController.class.php");
    $faleConosco = FaleConoscoController::listar();
?>
<div class="contact-wrapper">
	<div class="contact-title-row">
		<input type="checkbox" name="check" id="check"><label for="check" class="mark margin-right-20px">Marcar Todas</label>
		<div class="margin-right-20px"><span>Marcar Como Lida</span></div>
		<div class="margin-right-20px"><span>Excluir</span></div>
	</div>
	<table>
		<tr id="contact-table-trow">
			<td colspan="2"><span>NOME</span></td>
			<td><span>E-MAIL</span></td>
			<td><span>ASSUNTO</span></td>
			<td><span>DATA ENVIO</span></td>
			<td colspan="2"><span>OPÇÕES</span></td>
		</tr>
		<?php foreach($faleConosco as $fc){ ?>
		<tr class="contact-table-rrow" data-id="<?php echo($fc->getId())?>">
			<td colspan="2">
				<input type="checkbox">
                <span style="display: inline-block;"><?php echo($fc->getNome()) ?></span>
			</td>
			<td><span><?php echo($fc->getEmail()) ?></span></td>
			<td><span><?php echo($fc->getAssunto()) ?></span></td>
			<td><span>01/01/2018</span></td>
			<td>
				<div class="coluna">
					<img src="../assets/images/cms/symbols/visualizar.svg" alt="" class="margin-right-10px fc-visualizar">
					<img src="../assets/images/cms/symbols/excluir.svg" alt="" class="fc-deletar">
				</div>
			</td>
		</tr>
		<?php } ?>
	</table>
</div>
