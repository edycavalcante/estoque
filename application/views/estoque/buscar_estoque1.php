<?php
  if(!empty($estoque))  
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
                              <th>Local</th>
                              <th>Quantidade</th>
                              
                              
              			</tr>
           
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($estoque as $estoque_item)    
     {   
           $conteudo .= ' 
                
                    <tr> 
                        <td >'.$estoque_item->id_estoque.'</td>
                        <td >'.$estoque_item->nome_equipamento.'</td>
                        <td >'.$estoque_item->patrimonio.'</td>
                        <td>'.$estoque_item->nome_local.'</td>
                        <td>'.$estoque_item->quantidade.'</td>
                        
                        
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

// <td><a href="/estoque/estoque/editar/'.$estoque_item->id_estoque.'"  class="btn btn-secondary">Editar</a></td>
// <td><a href="/estoque/emprestimo/excluir/'.$item_emprestimo->id_emprestimo.'"  class="btn btn-secondary">Excluir</a></td>
                        