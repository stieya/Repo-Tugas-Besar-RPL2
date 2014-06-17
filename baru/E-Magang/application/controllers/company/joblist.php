<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Joblist extends Company_Controller {

	/*public function index($id_job_sheet = NULL)
	{
		var_dump('masuk joblist index')	;
		var_dump($id_job_sheet);
	}*/

	public function newjoblist($id_job_sheet = NULL)
	{
		var_dump('masuk joblistt newjoblist');
		var_dump($id_job_sheet); 
	}

	public function edit($id_job_sheet = NULL,$id_job_list = NULL)
	{
		var_dump('masuk joblist edit');
		var_dump($id_job_sheet);
		var_dump($id_job_list);
	}

	public function hapus($id_job_sheet = NULL,$id_job_list = NULL)
	{
		var_dump('masuk joblist hapus');
		var_dump($id_job_sheet);
		var_dump($id_job_list);
	}
	

}

/* End of file joblist.php */
/* Location: ./application/controllers/company/joblist.php */