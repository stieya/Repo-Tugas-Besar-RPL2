<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function index()
	{
		$this->load->model('admin_m');
		$data['info'] = $this->admin_m->getInfo();
		$data['kota'] = $this->admin_m->get_kota();
		$data['provinsi'] = $this->admin_m->get_provinsi();
		$data['jurusan'] = $this->admin_m->get_jurusan();
		$data['universitas'] = $this->admin_m->get_universitas();
		$akt['aktif'] = 'dashboard';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/dashboard/view_dashboard',$data);
	}

	public function delete($hal,$id)
	{
		$this->load->model('admin_m');
		$this->admin_m->hapus($hal,$id);

		redirect('admin/');
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */