<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$this->load->model('admin_m');
		$data['info'] = $this->admin_m->getInfo();
		$akt['aktif'] = 'dashboard';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/dashboard/view_dashboard',$data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */