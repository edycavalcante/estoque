
	<form  class="px-4 py-3" id="formestoque"  method="POST" <?php echo form_open('estoque/cadastrar'); ?>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Equipamento</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="equipamento">
            <option selected>Escolha...</option>
            <?php foreach ($equipamento as $equipamento_item): ?>
            <option value="<?php echo $equipamento_item['id_equipamento'] ?>"> <?php echo $equipamento_item['nome_equipamento']?> - <?php echo $equipamento_item['patrimonio']?></option>  
            <?php endforeach ?>
              
              
          </select>
        </div>


          <div class="input-group mb-3">
          <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Local</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="local">
            <option selected>Escolha...</option>
            <?php foreach ($local as $local_item): ?>
            <option value="<?php echo $local_item['id_local'] ?>"> <?php echo $local_item['nome_local']?></option>  
            <?php endforeach ?>
              
              
          </select>
          </div>
        
                <div class="form-group">
                <label for="nome">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
                </div>
        

				
					
            


              <button type="submit" class="btn btn-secondary">Cadastrar</button>


              	

    </form>

