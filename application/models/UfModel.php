<?php
Class UfModel extends CI_Model
{
 function listar()
 {
   $this->db->select('*');
   $this->db->from('uf');
   $this->db->where('ativo', 1);
   $this->db->order_by('nome');
 
   $query = $this->db->get();
 
   return $query->num_rows() > 0 ? $query->result() : false;

 }
}
?>