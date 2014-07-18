<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ubah extends Admin_Controller {

	public function index($hal,$id,$aksi = null)
	{
		if($aksi == null)
		{
			$this->load->model('admin_m');
			$data['hasil'] = $this->admin_m->get_ubah($hal,$id);
			$data['hal'] = $hal;
			$data['kota'] = $this->admin_m->get_kota();
			$data['provinsi'] = $this->admin_m->get_provinsi();
			$data['jurusan'] = $this->admin_m->get_jurusan();
			$akt['aktif'] = "";
			$this->load->view('admin/view_head');
			$this->load->view('admin/view_nav',$akt);
			$this->load->view('admin/view_side');
			$this->load->view('admin/ubah/view_ubah',$data);
		}
		else
		{
			$this->load->model('admin_m');
			$this->admin_m->ubah($hal,$id);

			redirect('admin/');
		}
	}
}

/* End of file ubah.php */
/* Location: ./application/controllers/admin/ubah.php */