<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet extends Company_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jobsheet_m');
	}

	public function index($id_job_sheet = NULL,$id_job_list = NULL)
	{
		
	}

	public function newjobsheet()
	{	
		$nav['halaman'] = 'JobSheet';
		$data['tanggal'] = date('Y:M:D');
		$data['error'] = FALSE;

		$rules = array(
			'nama' => array(
				'field' => 'nama',
				'label' => 'Job Sheet Name',
				'rules' => 'trim|required|min_length[10]|max_length[100]|xss_clean'
				),
			'deskripsi' => array(
				'field' => 'deskripsi',
				'label' => 'Job Sheet Description',
				'rules' => 'trim|required|min_length[10]|max_length[200]|xss_clean'
				),
			'durasi' => array(
				'field' => 'durasi',
				'label' => 'Duration',
				'rules' => 'trim|required|is_natural|xss_clean',
				),
			);
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE){
			$data['error'] = $this->jobsheet_m->saveJob();
			if($data['error'] == FALSE){
				redirect('company/');
			}
		}else{
		}

		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side');
		$this->load->view('company/job_sheet/view_newjobsheet',$data);
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