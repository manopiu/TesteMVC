<a href="<?php echo URL.'/Produto/';?>" class="botao">Home</a>
<a href="<?php echo URL.'/Produto/cadastrar/';?>" class="botao">Novo Produto</a>
<br><br>

<table class="ui-widget ui-widget-content ui-corner-all padding Tcentro">
  <tr>
    <th  style="width: 700px;" class="ui-widget-header padding" >NOME</th>
    <th  style="width: 700px;" class="ui-widget-header padding" >DESCRIÇÃO</th>
    <th class="ui-widget-header padding" >TAMANHO</th>
    <th class="ui-widget-header padding" >CUSTO</th>
    <th class="ui-widget-header padding" >AÇÃO</th>
  </tr>
  
  <tr>
      <td>Pizza de Calabresa</td>
      <td>Queijo e calabresa</td>
    <td style="width: 150px;">Pequena</td>
    <td>R$ 12,00</td>
    <td  style="width: 100px;">  
        <a href="<?php echo URL.'/Produto/alterar/';?>" class="editar">Editar</a>
        <a href="" class="excluir">Excluir</a>        
    </td>
  </tr>  
  
  <tr>
    <td>Pizza Portuguesa</td>
    <td>Queijo, ovo, calabresa e piment&atilde;o</td>
    <td style="width: 150px;">Grande</td>
    <td>R$ 23,00</td>
    <td  style="width: 100px;">  
        <a href="<?php echo URL.'/Produto/alterar/';?>" class="editar">Editar</a>
        <a href="" class="excluir">Excluir</a>        
    </td>
  </tr>  
  
  <tr>
      <td>Pizza de Mussarela</td>
      <td>Queijo e azeitona</td>
    <td style="width: 150px;">Grande</td>
    <td>R$ 18,00</td>
    <td  style="width: 100px;">  
        <a href="<?php echo URL.'/Entregadores/alterar/';?>" class="editar">Editar</a>
        <a href="" class="excluir">Excluir</a>        
    </td>
  </tr> 
  
</table>
