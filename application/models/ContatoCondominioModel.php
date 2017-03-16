<?php
Class ContatoCondominioModel extends CI_Model
{

  function salvar($arr_data)
  {
    $this->db->insert('contato_condominio', $arr_data);
  }

}
?>