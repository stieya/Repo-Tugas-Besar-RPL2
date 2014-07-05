<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('company_m');
	}

	public function index()
	{
		$rules = $this->user_m->signup_rules;

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$this->user_m->signup();
			redirect('user/');
		}

		$this->load->model('user_m');
		$data['universitas'] = $this->user_m->get_univ();
		$data['kota'] = $this->user_m->get_kota();
		$data['jurusan'] = $this->user_m->get_jurusan();
		//var_dump($data);
		$this->load->view('user/sign up/view_signup',$data);
	}

}

/* End of file signup.php */
/* Location: ./application/controllers/user/signup.php */