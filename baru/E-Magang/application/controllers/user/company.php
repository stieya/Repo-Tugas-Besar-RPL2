<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends User_Controller {

	public function index($id_company = NULL,$id_jobsheet = NULL)
	{
		var_dump('masuk company index')	;
		var_dump($id_company);
		var_dump($id_jobsheet);
	}

}

/* End of file company.php */
/* Location: ./application/controllers/user/company.php */