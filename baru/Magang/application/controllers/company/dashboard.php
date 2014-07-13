<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Company_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{	
		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		$nav['halaman'] = 'dashboard';
		$nav['sum_notifikasi'] = $this->notifikasi_m->getUnread();
		$nav['notifikasi'] = $this->notifikasi_m->getSample();
		$data['perusahaan'] = $this->company_m->getInfo();
		$format = 'DATE_COOKIE';
			timezones('UP7');
			$time = time();
			$data['tanggal'] = substr(standard_date($format,$time),0,19);
		//var_dump($data);
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side',$side);
		$this->load->view('company/dashboard/view_dashboard',$data);
	}


}

/* End of file dashboard.php */
/* Location: ./application/controllers/company/dashboard.php */