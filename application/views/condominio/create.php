<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
 <h1>Condomínios</h1>
 <h2>Cadastro</h2>
 <br>

<?php echo validation_errors('<p class="alert alert-danger" style="padding:15px;">','</p>'); ?>

<?php echo form_open('condominio/create', 'class="form-horizontal"'); ?>
  
  <div class="form-group">
    <label for="data-ult-servico" class="col-sm-2 control-label">Data do Último Serviço:</label>
    <div class='col-sm-2 input-group date datetimepicker'>
      <input type='text' class="form-control" id="data-ult-servico" name="data-ult-servico"/>
      <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
  </div>

  <div class="form-group">
    <label for="razao-social" class="col-sm-2 control-label">Razão Social:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="razao-social" name="razao-social" placeholder="Razão Social">
    </div>
  </div>

  <div class="form-group">
    <label for="nome-fantasia" class="col-sm-2 control-label">Nome Fantasia:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="nome-fantasia" name="nome-fantasia" placeholder="Nome Fantasia">
    </div>
  </div>

  <div class="form-group">
    <label for="cnpj" class="col-sm-2 control-label">CNPJ:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">
    </div>
  </div>

  <div class="form-group">
    <label for="endereco" class="col-sm-2 control-label">Endereço:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
    </div>
    <label for="bairro" class="col-sm-1 control-label">Bairro:</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro">
      <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
    </div>
  </div>

  <div class="form-group">
    <label for="estado" class="col-sm-2 control-label">Estado:</label>
    <div class="col-sm-1">
      <select id="estado" name="estado" class="form-control">
      <option></option>
      <?php
        foreach ($estados as $row) {
          echo '<option value="'.$row->id.'">'.$row->nome.'</option>';
        }
      ?>
      </select>
    </div>
    <label for="cidade" class="col-sm-1 control-label">Cidade:</label>
    <div class="col-sm-2">
      <select id="cidade" name="cidade" class="form-control" disabled>
        <option>Selecione o estado</option>
      </select>
    </div>
    <label for="cep" class="col-sm-1 control-label">Cep:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="cep" name="cep" placeholder="Cep">
    </div>
  </div>

  <div class="form-group">
    <label for="economia" class="col-sm-2 control-label">Economias:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="economia" name="economia" placeholder="Economias">
    </div>
  </div>

  <div class="form-group">
    <label for="imobiliaria" class="col-sm-2 control-label">Imobiliária:</label>
    <div class="col-sm-4">
      <select id="imobiliaria" name="imobiliaria" id="imobiliaria" class="form-control">
      <option></option>
      <?php
        foreach ($imobiliarias as $row) {
          echo '<option value="'.$row->id.'">'.$row->nome.'</option>';
        }
      ?>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="telefone1" class="col-sm-2 control-label">Telefone:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="telefone1" name="telefone1" placeholder="Telefone 1">
    </div>
    <label for="telefone2" class="col-sm-1 control-label">Telefone:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="telefone2" name="telefone2" placeholder="Telefone 2">
    </div>
  </div>

  <div class="form-group">
    <label for="obs" class="col-sm-2 control-label">Obs:</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="5" id="obs" name="obs" placeholder="Observação"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Informações das Caixas D'águas</label>
    <div class="col-sm-8" style="padding-top:7px;">
      <p>
        <button type="button" class="btn" data-toggle="modal" data-target="#ica-modal">Adicionar novo</button>
      </p>
      <span class="hide" id="ica-count" name="ica-count"></span>
      <ul class="list-group" id="ica-lista">

      </ul>
    </div>
  </div>

  <div id="ica-modal" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          Informações das Caixas D'águas
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="ica_descricao" class="col-sm-2 control-label">Descrição:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control ica" id="ica_descricao" name="ica_descricao" placeholder="Descrição">
            </div>
          </div>
          <div class="form-group">
            <label for="ica_localizacao" class="col-sm-2 control-label">Localização:</label>
            <div class="col-sm-3">
              <select id="ica_localizacao" name="ica_localizacao" class="form-control ica">
                <option></option>
                <option value="S">Superior</option>
                <option value="I">Inferior</option>
              </select>
            </div>
            <label for="ica_quantidade" class="col-sm-2 control-label">Quantidade:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control ica" id="ica_quantidade" name="ica_quantidade" placeholder="Quantidade">
            </div>
          </div>
          <div class="form-group">
            <label for="ica_capacidade" class="col-sm-2 control-label">Capacidade:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control ica" id="ica_capacidade" name="ica_capacidade" placeholder="Capacidade">
            </div>
            <label for="ica_metragem" class="col-sm-2 control-label">Metragem:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control ica" id="ica_metragem" name="ica_metragem" placeholder="Metragem">
            </div>
            <div class="col-sm-1">
              <a class="btn btn-default" id="ica-salvar">Salvar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Informações dos Contatos</label>
    <div class="col-sm-8" style="padding-top:7px;">
      <p>
        <button type="button" class="btn" data-toggle="modal" data-target="#ic-modal">Adicionar novo</button>
      </p>
      <span class="hide" id="ic-count" name="ic-count"></span>
      <ul class="list-group" id="ic-lista">

      </ul>
    </div>
  </div>

  <div id="ic-modal" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          Informações dos Contatos
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="ic-data-inicio" class="col-sm-1 control-label">Inicio:</label>
            <div class='col-sm-3 input-group date datetimepicker' style="float:left !important;">
              <input type='text' class="form-control ic" id="ic-data-inicio"/>
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
            <label for="ic-data-fim" class="col-sm-1 control-label">Fim:</label>
            <div class='col-sm-3 input-group date datetimepicker' style="float:left !important;">
              <input type='text' class="form-control ic" id="ic-data-fim" disabled />
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
            <label for="ic-complemento" class="col-sm-1 control-label">Compl.:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control ic" id="ic-complemento" placeholder="Compl.">
            </div>
          </div>
          <div class="form-group">
            <label for="ic-nome" class="col-sm-1 control-label">Nome:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control ic" id="ic-nome" placeholder="Nome">
            </div>
            <label for="ic-apto" class="col-sm-1 control-label">Apto:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control ic" id="ic-apto" placeholder="Apto">
            </div>
          </div>
          <div class="form-group">
            <label for="ic-telefone1" class="col-sm-2 control-label">Telefone:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control ic" id="ic-telefone1" placeholder="Telefone 1">
            </div>
            <label for="ic-telefone2" class="col-sm-2 control-label">Telefone:</label>
            <div class="col-sm-3">
              <input type="text" class="form-control ic" id="ic-telefone2" placeholder="Telefone 2">
            </div>
          </div>
          <div class="form-group">
            <label for="ic-email1" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control ic" id="ic-email1" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="ica_metragem" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control ic" id="ic-email2" placeholder="Email">
            </div>
            <div class="col-sm-1">
              <a class="btn btn-default" id="ic-salvar">Salvar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <br />
  <div class="text-center">
    <button type="reset" class="btn btn-danger">Limpar</button>
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </div>
</form>

</div>



  
<?php
    echo html_footer(); 
?>