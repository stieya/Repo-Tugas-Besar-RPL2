<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet extends User_Controller {

	public function index($id_jobsheet = NULL,$id_joblist = NULL)
	{
		var_dump('masuk jobsheet index');
		var_dump($id_jobsheet);
		var_dump($id_joblist);
	}

}

/* End of file jobsheet.php */
/* Location: ./application/controllers/user/jobsheet.php */