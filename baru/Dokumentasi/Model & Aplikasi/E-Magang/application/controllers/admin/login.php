<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Admin_Controller {

	public function index()
	{
		$this->load->view('company/login/view_login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */