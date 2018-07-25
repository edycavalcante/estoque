
	<form  class="px-4 py-3" id="formestoque"  method="POST" <?php echo form_open('estoque/atualizar'); ?>

          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $estoque->id_estoque; ?>">



          <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Equipamento</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="equipamento">
            <option selected value="<?php echo $estoque->id_equipamento; ?>"><?php echo $estoque->nome_equipamento; ?></option>
            
              
              
          </select>
        </div>


          <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Local</label>
          </div>
          <select class="custom-select" id="local" name="local">
            <option value="<?php echo $estoque->id_local; ?>"  selected><?php echo $estoque->nome_local ?></option>
            <?php foreach ($local as $local_item): ?>
            <option value="<?php echo $local_item['id_local']; ?>"> <?php echo $local_item['nome_local']; ?></option>  
            <?php endforeach ?>
              
              
          </select>
          </div>
        
                <div class="form-group">
                <label for="nome">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade"  value="<?php echo $estoque->quantidade; ?>" placeholder="Quantidade">
                </div>
        

				
					
            


              <button type="submit" class="btn btn-secondary">Atualizar</button>


              	

    </form>

