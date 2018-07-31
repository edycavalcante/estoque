<div  id="buscarbase">

 <!-- search box container starts  -->
 
 <div class="buscar" >





  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">Setor</span>
    </div>
    <input type="text" id="buscar" aria-label="Setor" class="form-control" placeholder="Busque setor">

  </div>

<table class="table" id="listbase">
  <thead id="head_table">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Responsável</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody id="conteudo_table">
  	<?php foreach ($setor as $setor_item): ?>
  		<tr>
  			<th scope="row"><?php echo $setor_item['id_setor']; ?></th>
  			<td><?php echo $setor_item['nome_setor']; ?></td>
        <td><?php echo $setor_item['responsavel']; ?></td>
  			<td><a href="<?php echo $setor_item['url_editar']; ?>"  class="btn btn-secondary">Editar</a></td>
  			<td><a href="" data-href="<?php echo $setor_item['url_excluir']; ?>"  class="btn btn-secondary deletar_setor" data-toggle="modal" data-target="#exampleModalCenter">Excluir</a></td>
  		</tr>
  			
  	<?php endforeach; ?>

  </tbody>
</table>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Setor</h5>
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
    $("#buscar").keyup(function(){
       var str =
       $("#buscar").val();
       console.log(str);

       $('tbody#conteudo_table').html('');

       // if(str == "") {
              //$( "#txtHint" ).find('div.container').attr('hidden', 'true');
               // $('tbody#conteudo_emprestimo').html('');
       // }else {
               $.get('<?php echo base_url('setor/buscar?buscar=') ?>'+str, function( data ){
                // $( "#txtHint" ).find('tbody#conteudo_emprestimo').html('');
                //$( "#txtHint" ).find('div.container').removeAttr('hidden');
                  var conteudo = ''; 
                  if (data.error) {
                    //$('table#table').find('thead.conteudo_emprestimo_header').attr('hidden', 'true');
                    $('#head_table').attr('hidden', 'true');
                    $('tbody#conteudo_table').html('<b>' + data.error + '</b>');
                    return false;
                  }
                $('#head_table').removeAttr('hidden'); 
                $.each(data, function(key, setor_item){
                
                    conteudo += '<tr>'; 
                        conteudo += '<td >'+setor_item.id_setor+'</td>';
                        conteudo += '<td >'+setor_item.nome_setor+'</td>';
                        conteudo += '<td >'+setor_item.responsavel+'</td>';
                        conteudo += ' <td><a href='+setor_item.url_editar+'  class="btn btn-secondary">Editar</a></td>';
                        conteudo += ' <td><a href="" data-href='+setor_item.url_excluir+' class="btn btn-secondary deletar_fabricante" data-toggle="modal" data-target="#exampleModalCenter">Excluir</a></td>';
                       
                    conteudo += '</tr>'; 
                

                });
                   
                   $('tbody#conteudo_table').append( conteudo );  
            });
       // }
   });  




    $(document).on('click', '.deletar_setor', function (){
      $('#exampleModalCenter').find('.modal_body').html('');
      $('#exampleModalCenter').find('#btn_delete_modal').attr('href', '');
      var link_delete = $(this).attr('data-href');
      console.log(link_delete);
      var id_usuario = $(this).parents('tr').attr('id');
      $('#exampleModalCenter').find('#btn_delete_modal').attr('href', link_delete);
      console.log(id_usuario);
    })




</script>