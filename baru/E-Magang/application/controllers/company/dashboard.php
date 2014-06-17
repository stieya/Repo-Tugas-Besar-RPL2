<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Company_Controller {

	public function index()
	{
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav');
		$this->load->view('company/view_side');
		$this->load->view('company/dashboard/view_dashboard');
	}


}

/* End of file dashboard.php */
/* Location: ./application/controllers/company/dashboard.php */