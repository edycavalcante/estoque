<?php echo validation_errors(); ?>
<form  class="px-4 py-3" id="formsetor"  method="POST" <?php echo form_open('setor/atualizar')?>
 
  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo !empty($id_setor) ? $id_setor : ''; ?>">


  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo !empty($nome_setor) ? $nome_setor : ''; ?>" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="nome">Responsável</label>
    <input type="text" class="form-control" id="responsavel" name="responsavel" value="<?php echo !empty($responsavel) ? $responsavel : ''; ?>" placeholder="Responsável">
  </div>
 
  
  <button type="submit" class="btn btn-secondary">Atualizar</button>
</form>