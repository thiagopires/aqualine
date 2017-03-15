<?php
Class CaixaModel extends CI_Model
{

  function salvar($arr_data){
    $this->db->insert('caixas', $arr_data);
  }

}
?>