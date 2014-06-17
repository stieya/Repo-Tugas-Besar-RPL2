<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet extends Company_Controller {

	public function index($id_job_sheet = NULL,$id_job_list = NULL)
	{
		var_dump($id_job_sheet);
		var_dump($id_job_list);	
		var_dump($this->uri->segment(3));
		var_dump('masuk josheet index dashboard');
	}

	public function newjobsheet()
	{
		var_dump("masuk jobsheet new");
	}

	public function edit($id_job_sheet = NULL)
	{

		var_dump("masuk jobsheet edit");
		var_dump($id_job_sheet);
	}

	public function hapus($id_job_sheet = NULL)
	{
		var_dump("masuk jobsheet hapus");
		var_dump($id_job_sheet);
	}



}

/* End of file jobsheet.php */
/* Location: ./application/controllers/company/jobsheet.php */