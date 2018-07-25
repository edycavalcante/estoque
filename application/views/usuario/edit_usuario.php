<?php echo validation_errors(); ?>
<form  class="px-4 py-3" id="formusuario"  method="POST" <?php echo form_open('usuario/atualizar/');?>
 
  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id_usuario; ?>">

 
  <div class="form-group" >
    <label for="usuario">Usuário</label>
    <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $usuario; ?>" placeholder="Usuário">
  </div>
  <div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome_usuario; ?>" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="senha">Senha</label>
    <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha; ?>" placeholder="Senha">
  </div>
  
  <button type="submit" class="btn btn-secondary">Atualizar</button>
</form>