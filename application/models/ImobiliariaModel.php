<?php
Class ImobiliariaModel extends CI_Model
{
  function listar() {
   $this->db->select('i.*, m.nome nome_municipio, u.nome nome_uf');
   $this->db->from('imobiliaria i');
   $this->db->join('municipio m', 'i.id_municipio = m.id', 'left');
   $this->db->join('uf u', 'i.id_uf = u.id', 'left');
   $this->db->where('i.ativo', 1);
   $this->db->order_by('i.nome');

   $query = $this->db->get();

   return $query->num_rows() > 0 ? $query->result() : false;
  }

  function salvar($arr_data) {
    $this->db->insert('imobiliaria', $arr_data);
  }

  function atualizar($id, $arr_data) {
    $this->db->where('id', $id);
    $this->db->update('imobiliaria', $arr_data);
  }

  function excluir($id) {
    $this->db->where('id', $id);
    $this->db->delete('imobiliaria');
  }

  function listarPorId($id) {
   $this->db->select('i.*, m.nome nome_municipio, u.nome nome_uf');
   $this->db->from('imobiliaria i');
   $this->db->join('municipio m', 'i.id_municipio = m.id', 'left');
   $this->db->join('uf u', 'i.id_uf = u.id', 'left');
   $this->db->where('i.id', $id);

   $query = $this->db->get();

   return $query->num_rows() > 0 ? $query->row(0) : false;
  }

}
?>