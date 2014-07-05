<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tambah extends CI_Controller {

	public function index($hal)
	{
		redirect('admin');
	}

	public function universitas()
	{
		$this->load->model('admin_m');
		$data['kota'] = $this->admin_m->get_kota();
		$data['hal'] = "universitas";
		$akt['aktif'] = '';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/tambah/tambah',$data);
	}

	public function tambahUniversitas()
	{
		$this->load->model('admin_m');
		$this->admin_m->tambah('universitas');
		redirect('admin/');
	}

	public function kota()
	{
		$this->load->model('admin_m');
		$data['prov'] = $this->admin_m->get_provinsi();
		$data['hal'] = "kota";
		$akt['aktif'] = '';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/tambah/tambah',$data);
	}

	public function tambahKota()
	{
		$this->load->model('admin_m');
		$this->admin_m->tambah('kota');
		redirect('admin/');
	}

	public function jurusan()
	{
		$this->load->model('admin_m');
		$data['hal'] = "jurusan";
		$akt['aktif'] = '';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/tambah/tambah',$data);
	}

	public function tambahJurusan()
	{
		$this->load->model('admin_m');
		$this->admin_m->tambah('jurusan');
		redirect('admin/');
	}
}

/* End of file tambah.php */
/* Location: ./application/controllers/admin/tambah.php */