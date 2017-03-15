<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('UsuarioModel','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login');
   }
   else
   {
     //Go to private area
     redirect('home', 'refresh');
   }

 }

 function check_database($senha)
 {
   //Field validation succeeded.  Validate against database
   $usuario = $this->input->post('usuario');

   //query the database
   $result = $this->UsuarioModel->login($usuario, $senha);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'nome' => $row->nome,
         'usuario' => $row->usuario
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return true;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Usuario ou senha inválidos');
     return false;
   }
 }
}
?>