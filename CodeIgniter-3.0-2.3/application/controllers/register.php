<?php
class Register extends CI_Controller{
	public function load(){
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('nav');
		$this->load->view('register_page');
		$this->load->view('footer');
	} //Ends here function
	
	
	public function create_user()
	{
		echo "Create User Function in Register.php";
		
		$this->load->view('register_page');
		$this->load->library('form_validation');
		
		//validation rules
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]|callback_check_if_username_exists');
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('street', 'Street ', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('zip', 'Zip', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');
		
		if($this->form_validation->run() == FALSE){
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->view('header');
			$this->load->view('nav');
			$this->load->view('register_page');
			echo "Something went wrong. Please try again";
			$this->load->view('footer');
			
			
		} //Ends if
		else
		{
			$this->load->model('new_users');
			
			if ($query = $this->new_users->create_user())
			{
				$data['account_created'] = 'Your account has been created.<br/><br/> You may now sign-in';
				
				$this->load->view('header');
				$this->load->view('signin_page', $data);
				$this->load->view('footer');
			} //Ends if
			else
			{
				$this->load->view('header');
				$this->load->view('register_page');
				$this->load->view('footer');
			} //Ends Else
		} //Ends Else
	} //Ends Create User Function
	
	public function check_if_username_exists($requested_username){
		$this->load->model('new_users');
		$username_available = $this->users->check_if_username_exists($requested_username);
		if ($username_available){
			return TRUE;
		}else{
			return FALSE;
		}
	} //Ends Check if user exists Function 
	
	
	
} //ENds Register Class
?>