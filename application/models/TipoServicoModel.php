<?php
Class TipoServicoModel extends CI_Model
{
 function listar()
 {
   $this->db->select('*');
   $this->db->from('tipo_servico');
   $this->db->where('ativo', 1);
   $this->db->order_by('nome');
 
   $query = $this->db->get();
 
   return $query->num_rows() > 0 ? $query->result() : false;

 }
}
?>