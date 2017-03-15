<?php
Class OrcamentoModel extends CI_Model
{
 function listar()
 {
   $this->db->select('oh.*, c.nome nome_condominio, i.nome nome_imobiliaria, ts.nome as nome_tipo_servico');
   $this->db->from('orcamento_head oh');
   $this->db->join('orcamento_body ob', 'ob.id_orcamento_head = oh.id', 'left');
   $this->db->join('tipo_servico ts', 'ts.id = ob.id_tipo_servico', 'left');
   $this->db->join('condominio c', 'oh.id_condominio = c.id', 'left');
   $this->db->join('imobiliaria i', 'c.id_imobiliaria = i.id', 'left');
   $this->db->where('oh.ativo', 1);
   $this->db->order_by('oh.id');
 
   $query = $this->db->get();
 
   if($query->num_rows() > 0)
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