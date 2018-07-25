<?php
  if(!empty($equipamento))  
 { 
     // echo '<pre>';
     // echo var_dump($emprestimo);
     // echo '</pre>';
     // echo $emprestimo['url_editar'];
     // exit;
      $table = '';
      $conteudo = '';  
      $tablefim ='';

      $table .= '<div class="container">
                   <div class="table-responsive">
                   <table class="table table-bordered">
                  <thead>
                        <tr>
            				          <th>#</th>
                              <th>Equipamento</th>
                              <th>Tipo</th>
                              <th>Patrimônio</th>
                              <th>Fabricante</th>
                              
                              
              			</tr>
           
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($equipamento as $equipamento_item)    
     {   
           $conteudo .= ' 
                
                    <tr> 
                        <td >'.$equipamento_item->id_equipamento.'</td>
                        <td >'.$equipamento_item->nome_equipamento.'</td>
                          <td >'.$equipamento_item->tipo.'</td>
                        <td >'.$equipamento_item->patrimonio.'</td>
                        <td>'.$equipamento_item->nome_fabricante.'</td>
                        
                        
                        
                    </tr> 
                
           ';
        //  echo $outputdata; 
                
          }  

         $tablefim .= ' 
                         </tbody>
                         </table>
                         </div>
                         </div> 


                         ';
         
         echo $table; 
         echo $conteudo; 
         echo $tablefim; 
 }  
 
 else  
 {  
      echo '<b>Nenhum empréstimo encontrado</b>';  
 } 
// <td><a href="/estoque/equipamento/detalhes/'.$equipamento_item->id_equipamento.'"  class="btn btn-secondary">Detalhes</a></td>
// <td><a href="/estoque/equipamento/editar/'.$equipamento_item->id_equipamento.'"  class="btn btn-secondary">Editar</a></td>
// <td><a href="/estoque/emprestimo/excluir/'.$equipamento_item->id_equipamento.'"  class="btn btn-secondary">Excluir</a></td>
                        