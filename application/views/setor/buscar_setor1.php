<?php
  if(!empty($setor))  
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
                              <th>Responsável</th>
                              
                              
              			</tr>
           
                   </thead>
                   <tbody>
                   ';
                  
      foreach ($setor as $setor_item)    
     {   
           $conteudo .= ' 
                
                    <tr> 
                        <td >'.$setor_item->id_setor.'</td>
                        <td >'.$setor_item->nome_setor.'</td>
                        <td >'.$setor_item->responsavel.'</td>
                        
                        
                        
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
      echo '<b>Nenhum setor encontrado</b>';  
 } 

// <td><a href="/estoque/setor/editar/'.$setor_item->id_setor.'"  class="btn btn-secondary">Editar</a></td>
// <td><a href="/estoque/setor/excluir/'.$setor_item->id_setor.'"  class="btn btn-secondary">Editar</a></td>

                        