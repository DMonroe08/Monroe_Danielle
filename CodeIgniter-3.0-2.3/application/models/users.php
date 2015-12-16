<?php
class New_users extends CI_Model{
	//function __construct(){
		//parent::__construct():
		//} //ends Construct function
	
	public function getFirstNames(){
		$query = $this->db->query('SELECT first_name from users');
		if($query->num_rows() > 0) {
			return $query->results();
		}else{
			return NULL;
		} //Ends else
	} //Ends GetFirstNames Function
	
	public function getUsers(){
		$query = $this->db->query('SELECT * FROM users');
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return NULL;
		} //Ends else
	} //Ends GetUsers Function
	
	
} //Ends New_users class
	
?>