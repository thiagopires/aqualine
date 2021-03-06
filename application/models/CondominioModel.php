<?php
Class CondominioModel extends CI_Model
{
 function listar()
 {
   $this->db->select('c.*, i.nome nome_imobiliaria, m.nome nome_municipio, u.nome nome_uf');
   $this->db->from('condominio c');
   $this->db->join('imobiliaria i', 'c.id_imobiliaria = i.id', 'left');
   $this->db->join('municipio m', 'c.id_municipio = m.id', 'left');
   $this->db->join('uf u', 'c.id_uf = u.id', 'left');
   $this->db->where('c.ativo', 1);
   $this->db->order_by('c.nome');
 
   $query = $this->db->get();
 
   return $query->num_rows() > 0 ? $query->result() : false;
 }

  function salvar($arr_data)
  {
    $this->db->insert('condominio', $arr_data);
    return $this->db->insert_id();
  }

}
?>