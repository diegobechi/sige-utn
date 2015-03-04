<?php

class Get_password extends CI_Controller
{
public function index($rs=FALSE)
  {
    $this->load->database();
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
  
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[20]|matches[passconf]|md5');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
 
   if ($this->form_validation->run() == FALSE)
     {
                  echo form_open();
                  $this->load->view('gp_form');
    }
   else
    {
            $query=$this->db->get_where('usuario', array('contraseña' => $rs), 1);
 
       if ($query->num_rows() == 0)
       {
      show_error('Sorry!!! Invalid Request!');
       }  
      else
      {
      $data = array(
            'contraseña' => 'SqddibwSxG+2VHwmgFIaIA=='
      );
     
      $where=$this->db->where('contraseña', $rs);
     
      $where->update('usuario',$data);
     
      redirect('http://localhost:8080/sige-utn/index.php/c_login/passExito', 'refresh');
      }
   
  }

 }
     
}