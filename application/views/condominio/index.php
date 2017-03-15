<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
<div class="container" style="">

 <h1>Condomínios</h1>
 <br>
  <div class="input-group" style="float:left; width:30%;">
    <span class="input-group-addon" id="sizing-addon2">Pesquisar</span>
    <input type="text" class="form-control" id="pesquisa" placeholder="Digite para pesquisar">
  </div>
  <a style="float:right" class="btn btn-default" href="<?php echo site_url(); ?>/condominio/create">
    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
    Novo condomínio
  </a>
<br>
<br>
<br>
  <table id="tabela" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Imobiliária</th>
                <th>Cidade</th>
                <th>Endereco</th>
                <th>Bairro</th>
                <th>CEP</th>
                <th>Observação</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>CNPJ</th>
                <th>Anexos</th>
                <th>Último Serviço</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($lista as $linha){
            echo '
              <tr>
                <td>'.$linha->nome.'</td>
                <td>'.$linha->nome_imobiliaria.'</td>
                <td>'.$linha->nome_municipio.'/'.$linha->nome_uf.'</td>
                <td>'.$linha->endereco.'</td>
                <td>'.$linha->bairro.'</td>
                <td>'.$linha->cep.'</td>
                <td>'.$linha->obs.'</td>
                <td>'.$linha->telefone1.'</td>
                <td>'.$linha->telefone2.'</td>
                <td>'.$linha->cnpj.'</td>
                <td></td>
                <td>'.data_br($linha->dt_ult_servico).'</td>
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