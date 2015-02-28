<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer extends CI_Controller {
	
	public function index()
	{
		$this->load->view('mail');
	}

	/*public function send_email(){	
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		
		$this->load->library('MY_Email');				
		$email_data = array(
			'from' => array('name' => 'Admin'),
			'to' => array('email' => $email, 'name' => $name),
			'subject' => $subject,
			'message' => $message
			);
		if($this->MY_Email->send_email($email_data))
			echo 'Done! <a href="'.base_url().'">Back</a>';
		else
			echo 'Error!';
	}*/

	public function send_email() {
        
    }
}