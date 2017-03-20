<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
 <h1>Imobiliárias</h1>
 <h2>Editar</h2>
 <br>

<?php echo validation_errors('<p class="alert alert-danger" style="padding:15px;">','</p>'); ?>

<?php echo form_open('imobiliaria/create', 'class="form-horizontal"'); ?>
  
  <div class="form-group">
    <label for="id" class="col-sm-2 control-label">ID:</label>
    <div class="col-sm-1">
      <input type="text" class="form-control" value="<?php echo $row->id; ?>" disabled>
    </div>
  </div>

  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?php echo $row->nome; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="endereco" class="col-sm-2 control-label">Endereço:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" value="<?php echo $row->endereco; ?>">
    </div>
    <label for="bairro" class="col-sm-1 control-label">Bairro:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="<?php echo $row->bairro; ?>">
      <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
    </div>
  </div>

  <div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado:</label>
    <div class="col-sm-1">
      <select id="estado" name="estado" class="form-control">
      <?php
        foreach ($estados as $estado) {
          $selected = ($estado->id == $row->id_uf ? 'selected' : '');
          echo '<option value="'.$estado->id.'" '.$selected.'>'.$estado->nome.'</option>';
        }
      ?>
      </select>
    </div>
    <label for="cidade" class="col-sm-1 control-label">Cidade:</label>
    <div class="col-sm-2">
      <select id="cidade" name="cidade" class="form-control">
      <?php
        foreach ($cidades as $cidade) {
          $selected = ($cidade->id == $row->id_municipio ? 'selected' : '');
          echo '<option value="'.$cidade->id.'" '.$selected.'>'.$cidade->nome.'</option>';
        }
      ?>
      </select>
    </div>
    <label for="cep" class="col-sm-1 control-label">Cep:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep" value="<?php echo $row->cep; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="email1" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email1" name="email1" placeholder="Email 1" value="<?php echo $row->email1; ?>">
    </div>
    <label for="email2" class="col-sm-1 control-label">Email:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="email2" name="email2" placeholder="Email 2"  value="<?php echo $row->email2; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="contato" class="col-sm-2 control-label">Contato:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="contato" name="contato" placeholder="Contato" value="<?php echo $row->contato; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="telefone1" class="col-sm-2 control-label">Telefone:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="telefone1" name="telefone1" placeholder="Telefone 1" value="<?php echo $row->telefone1; ?>">
    </div>
    <label for="telefone2" class="col-sm-1 control-label">Telefone:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="telefone2" name="telefone2" placeholder="Telefone 2" value="<?php echo $row->telefone2; ?>">
    </div>
    <label for="fax" class="col-sm-1 control-label">Fax:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="fax" name="fax" placeholder="Fax" value="<?php echo $row->fax; ?>">
    </div>
  </div>

  <div class="form-group">
    <label for="obs" class="col-sm-2 control-label">Obs:</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="5" id="obs" name="obs" placeholder="Observação"  value="<?php echo $row->obs; ?>"></textarea>
    </div>
  </div>

  <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row->id; ?>">

  <br />
  <div class="text-center">
    <a href="<?php echo site_url('/imobiliaria/index'); ?>" class="btn btn-default">Voltar</a>
    <button type="submit" class="btn btn-success">Salvar</button>
  </div>
</form>

</div>

<?php
    echo html_footer(); 
?>
