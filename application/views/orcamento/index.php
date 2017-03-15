<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
<div class="container" style="">

 <h1>Orçamentos/Serviços</h1>
 <br>
  <div class="input-group" style="float:left; width:30%;">
    <span class="input-group-addon" id="sizing-addon2">Pesquisar</span>
    <input type="text" class="form-control" id="pesquisa" placeholder="Digite para pesquisar">
  </div>
  <a style="float:right" class="btn btn-default" href="<?php echo site_url(); ?>/orcamento/create">
    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
    Novo orçamento/serviço
  </a>
<br>
<br>
<br>
  <table id="tabela" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Status</th>
                <th>Código</th>
                <th>Situação</th>
                <th>Imobiliaria</th>
                <th>Condomínio</th>
                <th>Tipo de Serviço</th>
                <th>Data</th>
                <th>Aniversário</th>
                <th>Nota Fiscal</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($lista as $linha){
            echo '
              <tr>
                <td>
                  <img src="'.asset_url().'/img/'.
                  ($linha->situacao === 'O' ? 
                    (strtotime(date('Y-m-d')) > strtotime($linha->data_aniversario) ? 'bolo-vermelho' : 'bolo-preto') : 
                    (strtotime(date('Y-m-d')) > strtotime($linha->data_aniversario) ? 'bolo-ouro' : 'bolo-azul')
                  ).'.jpg" /></td>
                <td>'.str_pad($linha->codigo, 4, '0', STR_PAD_LEFT).'/'.$linha->ano.'</td>
                <td>'.($linha->situacao === 'O' ? 'Orçamento' : 'Serviço Prestado').'</td>
                <td>'.$linha->nome_imobiliaria.'</td>
                <td>'.$linha->nome_condominio.'</td>
                <td>'.$linha->nome_tipo_servico.'</td>
                <td>'.data_br($linha->data).'</td>
                <td>'.data_br($linha->data_aniversario).'</td>
                <td>'.$linha->nota_fiscal.'</td>
                <td>'.money_br($linha->total_servico).'</td>
                <td><a href="#/'.$linha->id.'">Editar</a><br><a href="#/'.$linha->id.'">Excluir</a></td>
            </tr>
            ';
          } ?>
        </tboby>
      </table> 

</div>

<?php
    echo html_footer(); 
?>