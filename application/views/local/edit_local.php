<?php echo validation_errors(); ?>
<form  class="px-4 py-3" id="formusuario"  method="POST" <?php echo form_open('local/atualizar')?>
 
  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo !empty($id_local) ? $id_local : ''; ?>">


  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo !empty($nome_local) ? $nome_local : ''; ?>" placeholder="Nome">
  </div>
 
  
  <button type="submit" class="btn btn-secondary">Atualizar</button>
</form>