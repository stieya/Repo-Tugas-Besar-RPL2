<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends Company_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('company_m');
	}

	public function index()
	{	
		$rules = $this->company_m->signup_rules;

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE){
			//$data = $this->company_m->array_from_post(array('email','password','nama'));
			$this->company_m->signup();
			
		}
		else{
			//var_dump('salah');
		}

		$this->load->view('company/sign up/view_signup');
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/company/signup.php */