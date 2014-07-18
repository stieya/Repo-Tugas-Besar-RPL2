<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifikasi extends Company_Controller {

	public function index()
	{	
		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		$nav['halaman'] = 'dashboard';
		$nav['sum_notifikasi'] = $this->notifikasi_m->getUnread();
		$nav['notifikasi'] = $this->notifikasi_m->getSample();
		//var_dump($nav['notifikasi']);
		$data['perusahaan'] = $this->company_m->getInfo();
		$data['notifikasi'] = $this->notifikasi_m->getNotifikasi();
		$format = 'DATE_COOKIE';
			timezones('UP7');
			$time = time();
			$data['tanggal'] = substr(standard_date($format,$time),0,19);
		//var_dump($data);
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side',$side);
		$this->load->view('company/notifikasi/view_notifikasi',$data);	
	}

}

/* End of file notifikasi.php */
/* Location: ./application/controllers/company/notifikasi.php */