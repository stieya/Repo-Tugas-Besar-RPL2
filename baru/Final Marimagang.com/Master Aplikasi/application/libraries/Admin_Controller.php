<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_m');
		$this->load->library('session');
		$this->load->helper('date');

		date_default_timezone_set('Asia/Jakarta');

		$exception_uris = array('admin/login','admin/logout', 'admin/signup');
		
		if(in_array(uri_string(),$exception_uris) == FALSE){
			//var_dump(uri_string());
			if($this->admin_m->loggedin() == FALSE){
				//var_dump(uri_string());
				redirect('admin/login');
			}
		}

		$restricted_uris = array('admin/login');

		if($this->admin_m->loggedin() == TRUE){

			if($this->session->userdata('status_user') == 'COMPANY')
			{
				redirect('company/');
			}
			if($this->session->userdata('status_user') == 'STUDENT')
			{
				redirect('user/');
			}
			//var_dump($this->session->userdata);
			if(in_array(uri_string(), $restricted_uris) == TRUE){
				//var_dump(uri_string());
				redirect('admin/');
			}
		}
	}

}

/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */