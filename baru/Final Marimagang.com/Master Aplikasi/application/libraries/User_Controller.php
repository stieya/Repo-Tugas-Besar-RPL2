<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('user_m');
		$this->load->library('session');
		$this->load->helper('date');

		date_default_timezone_set('Asia/Jakarta');

		$exception_uris = array('user/login','user/logout','user/signup');
		
		if(in_array(uri_string(),$exception_uris) == FALSE){
			//var_dump(uri_string());
			if($this->user_m->loggedin() == FALSE){
				//var_dump(uri_string());
				redirect('user/login');
			}
		}

		$restricted_uris = array('user/signup','user/login');

		if($this->user_m->loggedin() == TRUE){

			if($this->session->userdata('status_user') == 'COMPANY')
			{
				redirect('company/');
			}
			if($this->session->userdata('status_user') == 'ADMIN')
			{
				redirect('admin/');
			}
			//var_dump($this->session->userdata);
			if(in_array(uri_string(), $restricted_uris) == TRUE){
				//var_dump(uri_string());
				redirect('user/');
			}
		}
	}

}

/* End of file User_Controller.php */
/* Location: ./application/libraries/User_Controller.php */