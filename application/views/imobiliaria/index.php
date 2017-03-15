<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
<div class="container" style="">

 <h1>Imobiliárias</h1>
 <br>


<?php if(isset($msg)) 
    echo '<p class="alert alert-success" style="padding:15px;">'.$msg.'</p>';
?>

  <div class="input-group" style="float:left; width:30%;">
    <span class="input-group-addon" id="sizing-addon2">Pesquisar</span>
    <input type="text" class="form-control" id="pesquisa" placeholder="Digite para pesquisar">
  </div>
  <a style="float:right" class="btn btn-default" href="<?php echo site_url(); ?>/imobiliaria/create">
    <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>
    Nova imobiliária
  </a>
<br>
<br>
<br>
  <table id="tabela" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Município</th>
                <th>Endereco</th>
                <th>Bairro</th>
                <th>CEP</th>
                <th>Observação</th>
                <th>Contato</th>
                <th>Telefone 1</th>
                <th>Telefone 2</th>
                <th>Fax</th>
                <th>Email 1</th>
                <th>Email 2</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($lista as $linha){
            echo '
              <tr>
                <td>'.$linha->nome.'</td>
                <td>'.$linha->nome_municipio.'/'.$linha->nome_uf.'</td>
                <td>'.$linha->endereco.'</td>
                <td>'.$linha->bairro.'</td>
                <td>'.$linha->cep.'</td>
                <td>'.$linha->obs.'</td>
                <td>'.$linha->contato.'</td>
                <td>'.$linha->telefone1.'</td>
                <td>'.$linha->telefone2.'</td>
                <td>'.$linha->fax.'</td>
                <td>'.$linha->email1.'</td>
                <td>'.$linha->email2.'</td>
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