
	<form  class="px-4 py-3" id="formequipamento"  method="POST" <?php echo form_open('equipamento/cadastrar'); ?>
             	<div class="form-group" >
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" >
              	</div>
              

          <div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<label class="input-group-text" for="inputGroupSelect01">Tipo</label>
  					</div>
					<select class="custom-select" id="tipo" name="tipo" onchange="showDiv(this)">
						<option  value="consumo" selected>Consumo</option>
						<option value="permanente">Permanente</option>
					   	
					    
					</select>
				</div>
              	
<script type="text/javascript">
document.getElementById('tipo').addEventListener('change', function () {
    var style = this.value == 'permanente' ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
});
</script>
              


				<div class="form-group"  id="hidden_div" style="display: none;">
                <label for="nome">Patrimônio</label>
                <input type="number" class="form-control" id="nome" name="patrimonio" placeholder="Patrimonio">
              	</div>
				
              	<div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<label class="input-group-text" for="inputGroupSelect01">Fabricante</label>
  					</div>
					<select class="custom-select" id="inputGroupSelect01" name="fabricante">
						<option selected>Escolha...</option>
						<?php foreach ($fabricante as $fabricante_item): ?>
						<option value="<?php echo $fabricante_item['id_fabricante'] ?>"> <?php echo $fabricante_item['nome_fabricante']?></option>	
						<?php endforeach ?>
					   	
					    
					</select>
				</div>

				
					
            


              <button type="submit" class="btn btn-secondary">Cadastrar</button>


              	

    </form>

