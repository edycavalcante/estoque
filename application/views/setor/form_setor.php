<form class="px-4 py-3" method="POST" id="formsetor"  <?php echo form_open('setor/cadastrar'); ?>
    <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Usuário">
    </div>
     <div class="form-group">
      <label for="responsavel">Responsável</label>
      <input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Responsável">
    </div>
    
    <button type="submit" class="btn btn-secondary">Cadastrar</button>
 </form>
