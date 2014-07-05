<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends Company_Controller {

	public function index()
	{
		$this->session->sess_destroy();
		redirect('company');
	}

}

/* End of file logout.php */
/* Location: ./application/controllers/company/logout.php */