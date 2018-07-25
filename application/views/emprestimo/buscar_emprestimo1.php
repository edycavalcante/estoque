<?php
  if(!empty($emprestimo))  
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
                              <th>Patrimônio</th>
                              <th>Data início</th>
                              <th>Data fim</th>
                              <th>Setor</th>
                              <th>Situação</th>
                              
              			</tr>
           
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($emprestimo as $emprestimo_item)    
     {   
           $conteudo .= ' 
                
                    <tr> 
                        <td >'.$emprestimo_item->id_emprestimo.'</td>
                        <td >'.$emprestimo_item->nome_equipamento.'</td>
                        <td >'.$emprestimo_item->patrimonio.'</td>
                        <td >'.date("d/m/Y", strtotime($emprestimo_item->data_inicio)).'</td>
                        <td >'.date("d/m/Y", strtotime($emprestimo_item->data_fim)).'</td>
                        <td>'.$emprestimo_item->nome_setor.'</td>
                        <td>'.$emprestimo_item->situacao.'</td>
                        
                        
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

// <td><a href="/estoque/emprestimo/editar/'.$item_emprestimo->id_emprestimo.'"  class="btn btn-secondary">Editar</a></td>
// <td><a href="/estoque/emprestimo/excluir/'.$item_emprestimo->id_emprestimo.'"  class="btn btn-secondary">Excluir</a></td>
                        