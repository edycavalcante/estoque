<form  class="px-4 py-3" id="formemprestimo"  method="POST" <?php echo form_open('emprestimo/atualizar');?> 
  
  <input type="hidden" name="id" id="id" >
  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo !empty($emprestimo->id_emprestimo) ? $emprestimo->id_emprestimo : ''; ?>">

  <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Equipamento</label>
            </div>
          <select class="custom-select" id="inputGroupSelect01" name="equipamento">
            <option selected value="<?php echo !empty($emprestimo->id_equipamento) ? $emprestimo->id_equipamento : '' ; ?>"> <?php echo !empty($emprestimo->nome_equipamento) ? $emprestimo->nome_equipamento : '' ;  ?></option>
            
              
              
          </select>
    </div>

     <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Setor</label>
            </div>
          <select class="custom-select" id="inputGroupSelect01" name="setor">
            <option selected value="<?php echo !empty($emprestimo->id_setor) ? $emprestimo->id_setor : ''; ?>"> <?php echo !empty($emprestimo->nome_setor) ? $emprestimo->nome_setor : '' ; ?></option>
            
              
              
          </select>
    </div>

  <div class="form-group">
        <label class="control-label" for="date">Data Inicial</label>
        <input class="form-control" id="date_inicio" name="date_inicio" placeholder="MM/DD/YYYY" type="date" value="<?php echo !empty($emprestimo->data_inicio) ? $emprestimo->data_inicio : '' ;?>" />
      </div>

   <div class="form-group"> 
        <label class="control-label" for="date">Data Fim</label>
        <input class="form-control" id="date_fim" name="date_fim" placeholder="MM/DD/YYYY" type="date" value="<?php echo !empty($emprestimo->data_fim) ? $emprestimo->data_fim : '' ; ?>"/>
      </div>
  

    <div class="form-group"> 
        <label class="control-label" for="date">Quantidade</label>
        <input class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" type="number" value="<?php echo !empty($emprestimo->quantidade) ? $emprestimo->quantidade : ''; ?>"/>
    </div>
  

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Situação</span>
      </div>
      <textarea class="form-control" aria-label="Situação" id="situacao" name="situacao"><?php echo !empty($emprestimo->situacao) ? $emprestimo->situacao : ''; ?></textarea>
    </div>

 




  
  <button type="submit" class="btn btn-secondary">Atualizar</button>
</form>