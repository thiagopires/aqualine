<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
<div class="container" style="">

 <h1>Tipos de Serviço</h1>
 <br>
  <div class="input-group" style="float:left; width:30%;">
    <span class="input-group-addon" id="sizing-addon2">Pesquisar</span>
    <input type="text" class="form-control" id="pesquisa" placeholder="Digite para pesquisar">
  </div>
  <a style="float:right" class="btn btn-default" href="<?php echo site_url(); ?>/condominio/create">
    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
    Novo tipo de serviço
  </a>
<br>
<br>
<br>
  <table id="tabela" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Serviço Único</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($lista as $linha){
            echo '
              <tr>
                <td>'.$linha->id.'</td>
                <td>'.$linha->nome.'</td>
                <td>'.($linha->indcaixa == 'S' ? 'Sim' : 'Não').'</td>
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