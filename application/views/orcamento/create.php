<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo html_header("Aqualine");
?>

<body>

<?php

echo nav();

?>
 <h1>Orçamentos/Serviços</h1>
 <h2>Cadastro</h2>
 <br>

<?php echo form_open('orcamento/create/save', 'class="form-horizontal"'); ?>
  
  <div class="form-group">
    <label for="condominio" class="col-sm-2 control-label">Condomínio:</label>
    <div class="col-sm-4">
      <select id="condominio" name="condominio" class="form-control">
      <option></option>
      <?php
        foreach ($condominios as $row) {
          echo '<option value="'.$row->id.'">'.$row->nome.'</option>';
        }
      ?>
      </select>
    </div>
    <div class="col-sm-4">
      <button type="button" class="btn">Novo</button>
      <button type="button" class="btn">Exibir</button>
      <button type="button" class="btn">Contatos</button>
    </div>
  </div>

  <div class="form-group">
    <label for="data" class="col-sm-2 control-label">Data:</label>
    <div class='col-sm-2 input-group date datetimepicker' style="float:left !important;">
      <input type='text' class="form-control" id="data" value='<?php echo date('d/m/Y'); ?>' />
      <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <label for="aniversario" class="col-sm-1 control-label">Aniversário:</label>
    <div class='col-sm-2 input-group date datetimepicker' style="float:left !important;">
      <input type='text' class="form-control" id="aniversario" value='<?php echo date('d/m/Y', strtotime('+1 month')); ?>' />
      <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
      </span>
    </div>
    <label for="situacao" class="col-sm-1 control-label">Situação:</label>
    <div class="col-sm-2">
      <select id="situacao" name="situacao" class="form-control">
        <option></option>
        <option value="O">Orçamento</option>
        <option value="S">Serviço realizado</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="nota-fiscal" class="col-sm-2 control-label">Nota fiscal:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="nota-fiscal" placeholder="Nota fiscal">
    </div>
    <label for="garantia" class="col-sm-1 control-label">Garantia:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="garantia" placeholder="Garantia">
    </div>
    <label for="prazo" class="col-sm-1 control-label">Prazo:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="prazo" placeholder="Prazo de execução">
    </div>
  </div>

  <div class="form-group">
    <label for="obs" class="col-sm-2 control-label">Início do Serviço:</label>
    <div class="col-sm-8">
      <textarea class="form-control" rows="2" id="inicio-servico" placeholder="Início do Serviço"></textarea>
    </div>
  </div>



  <div class="form-group">
    <div class="col-sm-10">
      <div class="panel panel-default">
        <div class="panel-heading">Itens do Orçamento/Serviço</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="obs" class="col-sm-2 control-label">Tipo de Serviço:</label>
            <div class="col-sm-3">
              <select id="tipo-servico" name="tipo-servico" class="form-control">
                <option></option>
                <?php
                  foreach ($tiposervico as $row) {
                    echo '<option value="'.$row->id.'">'.$row->nome.'</option>';
                  }
                ?>
              </select>  
            </div>
            <div class="col-sm-2">
              <button type="button" class="btn" data-toggle="modal" data-target="#ts-modal">Novo tipo de serviço</button>
            </div>
          </div>

          <div class="form-group">
            <label for="descricao" class="col-sm-2 control-label">Descrição:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="descricao" placeholder="Descrição">
            </div>
          </div>  

          <div class="form-group">
            <label for="valor" class="col-sm-2 control-label">Valor:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="valor" placeholder="Valor">
            </div>
          </div>  

          <div class="panel panel-default">
            <div class="panel-heading">Caixas D'água</div>
            <div class="panel-body">

              <div class="form-group">
                <label for="cda-localizacao" class="col-sm-1 control-label" style="font-size: 12px;">Localização:</label>
                <div class="col-sm-2">
                  <select id="cda-localizacao" name="cda-localizacao" class="form-control">
                    <option></option>
                    <option value="S">Superior</option>
                    <option value="I">Inferior</option>
                  </select>
                </div>
                <label for="cda-quantidade" class="col-sm-1 control-label" style="font-size: 12px;">Quantidade:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="cda-quantidade" placeholder="Quantidade">
                </div>
                <label for="cda-quantidade" class="col-sm-1 control-label" style="font-size: 12px;">Capacidade:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="cda-quantidade" placeholder="Quantidade">
                </div>
                <label for="cda-quantidade" class="col-sm-1 control-label" style="font-size: 12px;">Metragem:</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="cda-quantidade" placeholder="Quantidade">
                </div>
              </div> 

              <div class="form-group">
                <div class="col-sm-2">
                  <button type="button" class="btn" data-toggle="modal" data-target="#cda-modal">Adicionar novo</button>
                </div>
              </div> 

            </div>
          </div>

        </div> 
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-10">
      <div class="panel panel-default">
        <div class="panel-heading">Valores e Condições</div>
        <div class="panel-body">

          <div class="form-group">
            <label for="valor-total" class="col-sm-1 control-label">Valor Total:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="valor-total" placeholder="Valor Total">
            </div>
            <label for="entrada" class="col-sm-2 control-label">Entrada %:</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" id="entrada" placeholder="Entrada">
            </div>
            <label for="valor" class="col-sm-2 control-label">Qtde. de Parcelas:</label>
            <div class="col-sm-2">
              <select id="qtde-parcelas" name="qtde-parcelas" class="form-control">
                <option></option>
                <option value='30 dd'>30 dd</option>
                <option value='30/60 dd'>30/60 dd</option>
                <option value='30/60/90 dd'>30/60/90 dd</option>
                <option value='30/60/90/120 dd'>30/60/90/120 dd</option>
                <option value='A combinar'>A combinar</option>
                <option value='À vista'>À vista</option>
              </select>
            </div>
          </div>          

        </div>
      </div>
    </div>
  </div>

  <div id="ts-modal" role="dialog" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          Novo tipo de serviço
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="ts-nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="ts-nome" placeholder="Nome">
            </div>
          </div>  

          <div class="form-group">
            <label for="ts-servico-unico" class="col-sm-3 control-label">Serviço Único:</label>
            <div class="col-sm-2">
              <select id="ts-servico-unico" name="ts-servico-unico" class="form-control">
                <option></option>
                <option value="S">Sim</option>
                <option value="N">Não</option>
              </select>
            </div>
            <div class="col-sm-1">
              <button class="btn">Salvar</button>
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
