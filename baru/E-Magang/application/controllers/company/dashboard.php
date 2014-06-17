<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Company_Controller {

	public function index()
	{	
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

/* End of file dashboard.php */
/* Location: ./application/controllers/company/dashboard.php */