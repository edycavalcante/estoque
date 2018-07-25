<?php
  if(!empty($local))  
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
                              <th>Nome</th>
                             
                              
                              
              			</tr>
           
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($local as $local_item)    
     {   
           $conteudo .= ' 
                
                    <tr> 
                        <td >'.$local_item->id_local.'</td>
                        <td >'.$local_item->nome_local.'</td>
                        
                        
                        
                        
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
      echo '<b>Nenhum local encontrado</b>';  
 } 

// <td><a href="/estoque/setor/editar/'.$setor_item->id_setor.'"  class="btn btn-secondary">Editar</a></td>
// <td><a href="/estoque/setor/excluir/'.$setor_item->id_setor.'"  class="btn btn-secondary">Editar</a></td>

                        