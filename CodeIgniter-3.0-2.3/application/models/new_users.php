<?php
class New_users extends CI_Model{
	
	function __construct(){
		parent::__construct();
	} //Ends Construct Function
	
	public function validate(){
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('users');
		
		if($query->num_rows == 1){
			return true;
		}
	} //Ends Validate Function
	
	public function create_user(){
		
		$username = $this->input->post('username');
		
		$new_user_insert_data = array(
			'username' => $this->input->post('username'),
			'first_name' =>$this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'phone' => $this->input->post('phone'),
			'street' => $this->input->post('street'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'zip' => $this->input->post('zip'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
		); //Edns New User Insert
		
		$insert = $this->db->insert('users', $new_user_insert_data);
		return $insert;
	
	} //Ends Create User Function
	
	public function check_if_username_exists($username){
		$this->db->where('username', $username);
		$result = $this->db->get('users');
		
		if ($result->num_rows() > 0){
			return FALSE;
		}else{
			return TRUE;
		}
	} //Ends Check if username exists function
	
	
} //Ends Users Class
?>