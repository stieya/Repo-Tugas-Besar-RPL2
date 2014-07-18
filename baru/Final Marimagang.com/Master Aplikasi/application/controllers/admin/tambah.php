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
		$rules = $this->admin_m->namaUniv;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$this->admin_m->tambah('universitas');
			redirect('admin/');			
		}
		else
		{
			$data['kota'] = $this->admin_m->get_kota();
			$data['hal'] = "universitas";
			$akt['aktif'] = '';
			$this->load->view('admin/view_head');
			$this->load->view('admin/view_nav',$akt);
			$this->load->view('admin/view_side');
			$this->load->view('admin/tambah/tambah',$data);
		}
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
		$rules = $this->admin_m->namaKota;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$this->admin_m->tambah('kota');
			redirect('admin/');			
		}
		else
		{
			$data['prov'] = $this->admin_m->get_provinsi();
			$data['hal'] = "kota";
			$akt['aktif'] = '';
			$this->load->view('admin/view_head');
			$this->load->view('admin/view_nav',$akt);
			$this->load->view('admin/view_side');
			$this->load->view('admin/tambah/tambah',$data);
		}
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
		$rules = $this->admin_m->namaJurusan;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$this->admin_m->tambah('jurusan');
			redirect('admin/');			
		}
		else
		{
			$data['hal'] = "jurusan";
			$akt['aktif'] = '';
			$this->load->view('admin/view_head');
			$this->load->view('admin/view_nav',$akt);
			$this->load->view('admin/view_side');
			$this->load->view('admin/tambah/tambah',$data);
		}
	}

	public function provinsi()
	{
		$this->load->model('admin_m');
		$data['hal'] = "provinsi";
		$akt['aktif'] = '';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/tambah/tambah',$data);
	}

	public function tambahProvinsi()
	{
		$this->load->model('admin_m');
		$rules = $this->admin_m->namaProvinsi;
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$this->admin_m->tambah('provinsi');
			redirect('admin/');			
		}
		else
		{
			$data['hal'] = "provinsi";
			$akt['aktif'] = '';
			$this->load->view('admin/view_head');
			$this->load->view('admin/view_nav',$akt);
			$this->load->view('admin/view_side');
			$this->load->view('admin/tambah/tambah',$data);
		}
	}
}

/* End of file tambah.php */
/* Location: ./application/controllers/admin/tambah.php */