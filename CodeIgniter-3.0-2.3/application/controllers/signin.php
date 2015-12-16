<?php 
class Signin extends CI_Controller{
	 public function load()
	{
		echo "Signin Controller";
		
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('signin_page');
		$this->load->view('footer');
		
	} //Ends Index Function
	
	public function validate_credentials(){
		echo "Validate Function";
		//$this->load->view('signin_page');
		//$this->load->library('form_validation');
		$this->load->model('new_users')
		$query = $this->new_users->validate();
		
		if($query) 
		{
			$data = array(
				'username' =>$this->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect('home/index');
		}else{
			$this->index();
		}
		
	} //Ends Validate Credentials Function
	
	public function check_if_username_exists($requested_username){ 
		$this->load->model('users');
		$username_available = $this->users->check_if_username_exists($requested_username);
		if ($username_available){
			return TRUE;
		}else{
			return FALSE;
		}
	} //Ends Check If Username Exists Function
	
	
	
} //Ends Signin Controller
?>