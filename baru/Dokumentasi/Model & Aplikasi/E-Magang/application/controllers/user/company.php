<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends User_Controller {

	public function index($id_company = NULL,$id_jobsheet = NULL)
	{
		if($id_company !=NULL && $id_jobsheet == NULL){
			$nav['halaman'] = 'dashboard';
		$data['perusahaan'] = $this->company_m->getInfo();
		$data['tanggal'] = date('Y:M:D');
		//var_dump($data);
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side');
		$this->load->view('company/dashboard/view_dashboard',$data);
		}
		elseif($id_jobsheet != NULL){
			$nav['halaman'] = 'dashboard';
		$data['perusahaan'] = $this->company_m->getInfo();
		$data['tanggal'] = date('Y:M:D');
		//var_dump($data);
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side');
		$this->load->view('company/dashboard/view_dashboard',$data);
		}
		elseif($id_company == NULL && $id_jobsheet == NULL){
			$nav['halaman'] = 'dashboard';
		$data['perusahaan'] = $this->company_m->getInfo();
		$data['tanggal'] = date('Y:M:D');
		//var_dump($data);
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side');
		$this->load->view('company/dashboard/view_dashboard',$data);
		}
	}

}

/* End of file company.php */
/* Location: ./application/controllers/user/company.php */