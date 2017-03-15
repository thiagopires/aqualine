<?php
Class UsuarioModel extends CI_Model
{
 function login($usuario, $senha)
 {
   $this->db->select('id, nome, usuario, senha');
   $this->db->from('usuario');
   $this->db->where('usuario', $usuario);
   $this->db->where('senha', MD5($senha));
   $this->db->where('ativo', 1);
   $this->db->limit(1);
 
   $query = $this->db->get();
 
   if($query->num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>