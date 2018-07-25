<?php echo validation_errors(); ?>
<form class="px-4 py-3" method="POST" id="formlocal"  <?php echo form_open('local/cadastrar'); ?>
	<div class="form-group">
		<label for="nome">Nome</label>
		<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
	</div>

	<button type="submit" class="btn btn-secondary">Cadastrar</button>
</form>
