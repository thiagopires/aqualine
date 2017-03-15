<?php
Class MunicipioModel extends CI_Model
{
 function listar()
 {
   $this->db->select('*');
   $this->db->from('municipio');
   $this->db->where('ativo', 1);
   $this->db->order_by('nome');
 
   $query = $this->db->get();
 
   return $query->num_rows() > 0 ? $query->result() : false;

 }

function listarPorUf($id_uf)
 {
   $this->db->select('*');
   $this->db->from('municipio');
   $this->db->where('ativo', 1);
   $this->db->where('id_uf', $id_uf);
   $this->db->order_by('nome');
 
   $query = $this->db->get();
 
   return $query->num_rows() > 0 ? $query->result() : false;

 }
}
?>