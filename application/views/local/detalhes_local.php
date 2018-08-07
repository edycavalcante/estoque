

<table class="table" id="listbase">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Equipamento</th>
       <th scope="col">Patrimônio</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Local</th>
     
     
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($detalhes as $detalhes_item): ?>
  		<tr>
  			<th scope="row"><?php echo $detalhes_item->id_local; ?></th>
  			<td><?php echo $detalhes_item->nome_equipamento; ?></td>
        <td><?php echo $detalhes_item->patrimonio; ?></td>
  			<td><?php echo $detalhes_item->quantidade; ?></td>
        <td><?php echo $detalhes_item->nome_local; ?></td>
        
  		</tr>
  			
  	<?php endforeach; ?>

  </tbody>
</table>