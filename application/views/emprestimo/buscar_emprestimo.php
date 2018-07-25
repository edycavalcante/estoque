<div  id="buscarbase">
    
 <!-- search box container starts  -->
 
    <div class="buscar" >
        
  <form action=""  method="get">
    
      

      <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Empréstimo</span>
  </div>
  <input type="text" id="buscar" aria-label="Empréstimo" class="form-control" placeholder="Busque empréstimo">
  
</div>

  </form>
</div>  
  <!-- search box container ends  -->
  
    
     <div id="txtHint" style="padding-top:50px; padding-bottom:20px;  text-align:center;" ><b>Informações de empréstimo...</b>
      <div class="container" hidden>
       <div class="table-responsive" >
         <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Equipamento</th>
              <th>Patrimônio</th>
              <th>Data início</th>
              <th>Data fim</th>
              <th>Setor</th>
              <th>Situação</th>
              <th>Editar</th>
              <th>Excluir</th>

            </tr>

          </thead>
          <tbody id="conteudo_emprestimo">

          </tbody>
        </table>
      </div>
    </div> 


     </div>
     
</div>
<script>
// above script codes... 
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>

   $("#buscar").keyup(function(){
       var str=  $("#buscar").val();
       console.log(str);
       if(str == "") {
              $( "#txtHint" ).find('div.container').attr('hidden', 'true');
               $( "#txtHint" ).find('tbody#conteudo_emprestimo').html('');
       }else {
               $.get('<?php echo base_url() ?>/emprestimo/buscar?buscar='+str, function( data ){
                // $( "#txtHint" ).find('tbody#conteudo_emprestimo').html('');
                $( "#txtHint" ).find('div.container').removeAttr('hidden');
                  var conteudo = ''; 
                $.each(data, function(key, emprestimo_item){
                
                    conteudo += '<tr>'; 
                        conteudo += '<td >'+emprestimo_item.id_emprestimo+'</td>';
                        conteudo += '<td >'+emprestimo_item.nome_equipamento+'</td>';
                        conteudo += '<td >'+emprestimo_item.patrimonio+'</td>';
                        conteudo += '<td >'+emprestimo_item.data_inicio+'</td>';
                        conteudo += '<td >'+emprestimo_item.data_fim+'</td>';
                        conteudo += ' <td>'+emprestimo_item.nome_setor+'</td>';
                        conteudo += ' <td>'+emprestimo_item.situacao+'</td>';
                        conteudo += ' <td><a href='+emprestimo_item.url_editar+'  class="btn btn-secondary">Editar</a></td>';
                        conteudo += ' <td><a href="" data-href='+emprestimo_item.url_excluir+' class="btn btn-secondary deletar_emprestimo" data-toggle="modal" data-target="#exampleModalCenter">Excluir</a></td>';
                       
                    conteudo += '</tr>'; 
                

                });
                   $( "#txtHint" ).find('tbody#conteudo_emprestimo').append( conteudo );  
            });
       }
   });  

$(document).on('click', '.deletar_emprestimo', function (){
      $('#exampleModalCenter').find('.modal_body').html('');
      $('#exampleModalCenter').find('#btn_delete_modal').attr('href', '');
      var link_delete = $(this).attr('data-href');
      console.log(link_delete);
      var id_usuario = $(this).parents('tr').attr('id');
      $('#exampleModalCenter').find('#btn_delete_modal').attr('href', link_delete);
      console.log(id_usuario);
    })


$(document).ready(function(){   

});  
</script>

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