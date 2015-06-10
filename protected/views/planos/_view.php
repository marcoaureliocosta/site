<tr <?php if($data->emDestaque==1)echo 'class="warning"'; ?>>
  <td> <input <?php if($data->emDestaque==1) echo "checked"; ?> data-valor="<?php echo number_format($data->preco*$data->quantidade,"2",".",""); ?>" data-quantidade="<?php echo $data->quantidade; ?>" value="<?php echo $data->IDPlano; ?>" type="checkbox" class="checkbox"> </td>
  <td><?php echo CHtml::encode($data->nome); ?> <?php if($data->emDestaque): ?><span class="badge badge-warning badge-roundless"> + vendido </span><?php endif; ?></td>
  <td><?php echo $data->quantidade; ?></td>
  <td><?php echo Moeda::Pontuar($data->preco); ?></td>
  <td><?php echo Moeda::Pontuar(number_format($data->preco*$data->quantidade,"2","",".")); ?></td>
  <td> <?php echo $data->IDPlano > 1 ? $data->getValorPorcentagemEconomia($data->preco)."%" :"---" ?> </td>
</tr>