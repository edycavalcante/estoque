<div  id="buscarbase">
    
 <!-- search box container starts  -->
 
    <div class="buscar" >
        
  <form action=""  method="get">
    
      

      <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text">Estoque</span>
  </div>
  <input type="text" id="buscar" aria-label="Estoque" class="form-control" placeholder="Busque no estoque">
  
</div>

  </form>
</div>  
  <!-- search box container ends  -->
  
    
     <div id="txtHint" style="padding-top:50px; padding-bottom:20px;  text-align:center;" ><b>Informações do estoque...</b></div>
     
</div>
<script>
// above script codes... 
</script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
$(document).ready(function(){
   $("#buscar").keyup(function(){
       var str=  $("#buscar").val();
       console.log(str);
       if(str == "") {
               $( "#txtHint" ).html("<b>Informações do estoque</b>"); 
       }else {
               $.get('<?php echo base_url() ?>estoque/buscar?buscar='+str, function( data ){
                   $( "#txtHint" ).html( data );  
            });
       }
   });  
});  
</script>

