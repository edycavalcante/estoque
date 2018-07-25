<table class="table" id="listbase">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Equipamento</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Data</th>
      <th scope="col">Local</th>
      <th scope="col">Setor</th>
      <th scope="col">Descrição</th>
     
    </tr>
  </thead>
  <tbody>
  	<?php foreach ($detalhes as $detalhes_item): ?>
  		<tr>
  			<th scope="row"><?php echo $detalhes_item['id_baixa']; ?></th>
  			<td><?php echo $detalhes_item['nome_equipamento']; ?></td>
  			<td><?php echo $detalhes_item['quantidade']; ?></td>
  			<td><?php echo $detalhes_item['data_baixa']; ?></td>
        <td><?php echo $detalhes_item['nome_local']; ?></td>
        <td><?php echo $detalhes_item['nome_setor']; ?></td>
        <td><?php echo $detalhes_item['descricao']; ?></td>
        
  		</tr>
  			
  	<?php endforeach; ?>

  </tbody>
</table>