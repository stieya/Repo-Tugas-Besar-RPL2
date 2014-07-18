<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends User_Controller {

	public function index()
	{
		$this->session->sess_destroy();
		redirect('user');	
	}

}

/* End of file logout.php */
/* Location: ./application/controllers/user/logout.php */