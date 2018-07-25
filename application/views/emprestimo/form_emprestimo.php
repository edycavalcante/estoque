<form  class="px-4 py-3" id="formemprestimo"  method="POST" <?php echo form_open('emprestimo/cadastrar');?> 
  


  <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Equipamento</label>
            </div>
          <select class="custom-select" id="inputGroupSelect01" name="equipamento">
            <option selected>Escolha...</option>
            <?php foreach ($equipamento as $equipamento_item): ?>
            <option value="<?php echo $equipamento_item['id_equipamento'] ?>"> <?php echo $equipamento_item['nome_equipamento']; echo ' - '; echo $equipamento_item['patrimonio']; ?></option>  
            <?php endforeach ?>
              
              
          </select>
    </div>

     <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Setor</label>
            </div>
          <select class="custom-select" id="inputGroupSelect01" name="setor">
            <option selected>Escolha...</option>
            <?php foreach ($setor as $setor_item): ?>
            <option value="<?php echo $setor_item['id_setor'] ?>"> <?php echo $setor_item['nome_setor']; echo ' - '; echo $setor_item['responsavel']; ?></option>  
            <?php endforeach ?>
              
              
          </select>
    </div>

  <div class="form-group">
        <label class="control-label" for="date">Data Inicial</label>
        <input class="form-control" id="date_inicio" name="date_inicio" placeholder="MM/DD/YYYY" type="date"/>
      </div>

   <div class="form-group"> 
        <label class="control-label" for="date">Data Fim</label>
        <input class="form-control" id="date_fim" name="date_fim" placeholder="MM/DD/YYYY" type="date"/>
      </div>
  

    <div class="form-group"> 
        <label class="control-label" for="date">Quantidade</label>
        <input class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" type="number"/>
    </div>
  

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Situação</span>
      </div>
      <textarea class="form-control" aria-label="Situação" id="situacao" name="situacao"></textarea>
    </div>

 




  
  <button type="submit" class="btn btn-secondary">Cadastrar</button>
</form>