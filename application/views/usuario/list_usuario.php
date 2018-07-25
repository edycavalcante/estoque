<table class="table" id="listbase">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuário</th>
      <th scope="col" id="nome_header">Nome</th>
      <th scope="col">Senha</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($usuario as $usuarios_item): ?>
  		<tr>
  			<th scope="row" id="<?php echo $usuarios_item['id_usuario']; ?>"><?php echo $usuarios_item['id_usuario']; ?></th>
  			<td><?php echo $usuarios_item['usuario']; ?></td>
  			<td><?php echo $usuarios_item['nome_usuario']; ?></td>
  			<td><?php echo $usuarios_item['senha']; ?></td>
  			<td><a href="<?php echo $usuarios_item['url_editar']; ?>"  class="btn btn-secondary">Editar</a></td>
  			<td><a href="<?php echo $usuarios_item['url_excluir']; ?>"  class="btn btn-secondary deletar_usuario" data-toggle="modal" data-target="#exampleModalCenter">Excluir</a></td>
  		</tr>
  			
  	<?php endforeach; ?>

  </tbody>
</table>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a  id="btn_delete_modal" class="btn btn-danger" href="" >Excluir</a>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    $(document).on('click', '.deletar_usuario', function(){
      $('#exampleModalCenter').find('.modal_body').html('');
       var id_usuario = $(this).parents('th').attr('id');
       console.log(id_usuario);
    })

var table = $('.table');
    
    $('#nome_header')
        .wrapInner('<span title="sort this column"/>')
        .each(function(){
            
            var th = $(this),
                thIndex = th.index(),
                inverse = false;
            
            th.click(function(){
                
                table.find('td').filter(function(){
                    
                    return $(this).index() === thIndex;
                    
                }).sortElements(function(a, b){
                    
                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;
                    
                }, function(){
                    
                    // parentNode is the element we want to move
                    return this.parentNode; 
                    
                });
                
                inverse = !inverse;
                    
            });
                
        });


</script>