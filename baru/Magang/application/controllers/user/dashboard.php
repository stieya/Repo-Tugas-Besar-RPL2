<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends User_Controller 
{
//---------//Dashboard
	public function index()
	{
		$this->load->model('user_m');
		$data['dash'] = $this->user_m->get_dash();
		$data['profil'] = $this->user_m->get_profil();
		$akt['pesan'] = $this->user_m->listPesan();
		$akt['aktif'] = 'dashboard';
		$this->load->view('user/view_head');
		$this->load->view('user/view_nav',$akt);
		$this->load->view('user/view_side');
		$this->load->view('user/dashboard/view_dashboard',$data);
	}
//---------//AkhirDashboard
}

/* End of file dashboard.php */
/* Location: ./application/controllers/user/dashboard.php */