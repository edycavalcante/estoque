	<form  class="px-4 py-3" id="formequipamento"  method="POST" <?php echo form_open('equipamento/atualizar'); ?>
              
             <input type="hidden" class="form-control" id="id" name="id" value="<?php echo !empty($equipamento->id_equipamento) ? $equipamento->id_equipamento : ''; ?>">
             	<div class="form-group" >
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo !empty($equipamento->nome_equipamento) ? $equipamento->nome_equipamento : 'vazio'; ?>"   placeholder="Nome" >
              	</div>
              	<div class="form-group">

        <div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<label class="input-group-text" for="inputGroupSelect01">Tipo</label>
  					</div>
               <select class="custom-select" id="tipo" name="tipo" onchange="showDiv(this);">
                    <?php if ($equipamento->tipo == 'consumo'): ?>
                      <option  value="<?php echo !empty($equipamento->tipo) ? $equipamento->tipo : '';?>" selected> Consumo</option>
                      <option value="permanente">Permanente</option>
                    <?php else: ?>  
                      <option  value="<?php echo !empty($equipamento->tipo) ? $equipamento->tipo : '';?>" selected> Permanente</option>
                      <option value="consumo">Consumo</option>
                    <?php endif ?>
                      
                   
  					   </select>
        </div>
              	
<!-- <script type="text/javascript">
document.getElementById('tipo').addEventListener('change', function () {
    var style = this.value == 'permanente' ? 'block' : 'none';
    document.getElementById('hidden_div').style.display = style;
});
</script> -->

<script type="text/javascript">
function showDiv(select){
   if(select.value== 'permanente'){
    document.getElementById('patrimonio_div').removeAttribute('hidden');

   } else{
    document.getElementById('patrimonio_div').setAttribute('hidden','true');
   }
} 
</script>
              <div class="form-group" id="patrimonio_div" <?php echo $equipamento->tipo == 'permanente' ? '' : 'hidden' ?> >
                <label for="patrimonio">Patrimônio</label>
                <input type="number" class="form-control" id="patrimonio" name="patrimonio" value="<?php echo !empty($equipamento->patrimonio) ? $equipamento->patrimonio : ''; ?>" placeholder="Patrimonio">
            </div>

        
				<!-- <div class="form-group"  id="hidden_div" style="display: none;">
                <label for="nome">Patrimônio</label>
                <input type="number" class="form-control" id="nome" name="patrimonio" value="<?php echo !empty($equipamento->patrimonio) ? $equipamento->patrimonio : ''; ?>" placeholder="Patrimonio">
              	</div> -->
				
              	<div class="input-group mb-3">
  					<div class="input-group-prepend">
    					<label class="input-group-text" for="inputGroupSelect01">Fabricante</label>
  					</div>
					<select class="custom-select" id="inputGroupSelect01" name="fabricante">
						<option selected value="<?php echo $equipamento->id_fabricante; ?>"><?php echo !empty($equipamento->nome_fabricante) ? $equipamento->nome_fabricante : ''; ?></option>
						<?php foreach ($fabricante as $fabricante_item): ?>
						<option value="<?php echo $fabricante_item['id_fabricante'] ?>"> <?php echo $fabricante_item['nome_fabricante']?></option>	
						<?php endforeach ?>
					   	
					    
					</select>
				</div>

				
					
            


              <button type="submit" class="btn btn-secondary">Atualizar</button>


              	

    </form>

