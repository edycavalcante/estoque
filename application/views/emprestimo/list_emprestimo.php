

 <table class="table" id="listbase">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Equipamento</th>
      <th scope="col">Patrimonio</th>
      <th scope="col">Data Início</th>
      <th scope="col">Data Fim</th>
      <th scope="col">Setor</th>
      <th scope="col">Situação</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($emprestimo as $emprestimo_item): ?>
  		<tr>
        <tr id="<?php echo $emprestimo_item['id_emprestimo']; ?>">
  			<th scope="row"><?php echo $emprestimo_item['id_emprestimo']; ?></th>
  			<td><?php echo $emprestimo_item['nome_equipamento']; ?></td>
  			<td><?php echo $emprestimo_item['patrimonio']; ?></td>
  			<td><?php echo $emprestimo_item['data_inicio']; ?></td>
  			<td><?php echo $emprestimo_item['data_fim']; ?></td>
       		<td><?php echo $emprestimo_item['nome_setor']; ?></td>
       		<td><?php echo $emprestimo_item['situacao']; ?></td>
  			<td><a href="<?php echo $emprestimo_item['url_editar']; ?>"  class="btn btn-secondary">Editar</a></td>
        <td><a href="<?php echo $emprestimo_item['url_excluir']; ?>"  class="btn btn-secondary deletar_emprestimo" data-toggle="modal" data-target="#exampleModalCenter">Excluir</a></td>
  		</tr>
  			
  	<?php endforeach; ?>

  </tbody>
</table>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Emprestimo</h5>
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.deletar_emprestimo', function (){
      $('#exampleModalCenter').find('.modal_body').html('');
      $('#exampleModalCenter').find('#btn_delete_modal').attr('href', '');
      var link_delete = $(this).attr('href');
      console.log(link_delete);
      var id_usuario = $(this).parents('tr').attr('id');
      $('#exampleModalCenter').find('#btn_delete_modal').attr('href', link_delete);
      console.log(id_usuario);
    })




</script>