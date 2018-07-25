<?php echo validation_errors(); ?>
<form  class="px-4 py-3" id="formusuario"  method="POST" <?php echo form_open('fabricante/atualizar')?>
 
  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo !empty($id_fabricante) ? $id_fabricante : ''; ?>">


  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo !empty($nome_fabricante) ? $nome_fabricante : ''; ?>" placeholder="Nome">
  </div>
 
  
  <button type="submit" class="btn btn-secondary">Atualizar</button>
</form>