<?php
  if(!empty($fabricante))  
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
                  
      foreach ($fabricante as $fabricante_item)    
     {   
           $conteudo .= ' 
                
                    <tr> 
                        <td >'.$fabricante_item->id_fabricante.'</td>
                        <td >'.$fabricante_item->nome_fabricante.'</td>
                       
                        
                        
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
      echo '<b>Nenhum fabricante encontrado</b>';  
 } 

// <td><a href="/estoque/fabricante/editar/'.$fabricante_item->id_fabricante.'"  class="btn btn-secondary">Editar</a></td>
// <td><a href="/estoque/fabricante/excluir/'.$fabricante_item->id_fabricante.'"  class="btn btn-secondary">Excluir</a></td>

                        