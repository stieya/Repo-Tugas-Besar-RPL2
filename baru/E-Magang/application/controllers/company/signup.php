<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends Company_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{	
		$rules = $this->company_m->signup_rules;

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE){
			
			if($this->company_m->signup()){
				redirect('company/login');
			}
			
		}
		else{

		}
		$this->load->view('company/sign up/view_signup');
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/company/signup.php */