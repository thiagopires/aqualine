<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
 <h1>Imobiliárias</h1>
 <h2>Visualizar</h2>
 <br>

 <style>
  .control-label{padding-top:0 !important;}
 </style>

<?php echo form_open('', 'class="form-horizontal"'); ?>
  
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome:</label>
    <div class="col-sm-8">
     <?php echo $row->nome; ?>
    </div>
  </div>

  <div class="form-group">
    <label for="endereco" class="col-sm-2 control-label">Endereço:</label>
    <div class="col-sm-4">
      <?php echo $row->endereco; ?>
    </div>
    <label for="bairro" class="col-sm-1 control-label">Bairro:</label>
    <div class="col-sm-3">
      <?php echo $row->bairro; ?>
    </div>
  </div>

  <div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado:</label>
    <div class="col-sm-1">
      <?php
        $nomeEstado = '';
        foreach ($estados as $estado) {
          if ($estado->id == $row->id_uf) 
            $nomeEstado = $estado->nome;
        }
        echo $nomeEstado;
      ?>
    </div>
    <label for="cidade" class="col-sm-1 control-label">Cidade:</label>
    <div class="col-sm-2">
      <?php
        $nomeCidade = '';
        foreach ($cidades as $cidade) {
          if ($cidade->id == $row->id_municipio) 
            $nomeCidade = $cidade->nome;
        }
        echo $nomeCidade;
      ?>
    </div>
    <label for="cep" class="col-sm-1 control-label">Cep:</label>
    <div class="col-sm-2">
      <?php echo $row->cep; ?>
    </div>
  </div>

  <div class="form-group">
    <label for="email1" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-4">
      <?php echo $row->email1; ?>
    </div>
    <label for="email2" class="col-sm-1 control-label">Email:</label>
    <div class="col-sm-3">
      <?php echo $row->email2; ?>
    </div>
  </div>

  <div class="form-group">
    <label for="contato" class="col-sm-2 control-label">Contato:</label>
    <div class="col-sm-4">
      <?php echo $row->contato; ?>
    </div>
  </div>

  <div class="form-group">
    <label for="telefone1" class="col-sm-2 control-label">Telefone:</label>
    <div class="col-sm-2">
      <?php echo $row->telefone1; ?>
    </div>
    <label for="telefone2" class="col-sm-1 control-label">Telefone:</label>
    <div class="col-sm-2">
      <?php echo $row->telefone2; ?>
    </div>
    <label for="fax" class="col-sm-1 control-label">Fax:</label>
    <div class="col-sm-2">
      <?php echo $row->fax; ?>
    </div>
  </div>

  <div class="form-group">
    <label for="obs" class="col-sm-2 control-label">Obs:</label>
    <div class="col-sm-8">
      <?php echo $row->obs; ?>
    </div>
  </div>

</form>

</div>


  
<?php
    echo html_footer(); 
?>
