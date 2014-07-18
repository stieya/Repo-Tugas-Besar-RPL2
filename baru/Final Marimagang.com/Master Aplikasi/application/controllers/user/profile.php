<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends User_Controller {

	public function index($id_perusahaan = null)
	{
		if ($id_perusahaan == null)
		{
			$this->load->model('user_m');
			$data['profil'] = $this->user_m->get_profil();
			$akt['aktif'] = '';
			$akt['notif'] = $this->user_m->get_notif();
			$akt['pesan'] = $this->user_m->listPesan();
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/profile/view_profile',$data);
		}
		else
		{
			$this->load->model('user_m');
			$data['profil'] = $this->user_m->get_profil($id_perusahaan);
			$akt['aktif'] = '';
			$akt['notif'] = $this->user_m->get_notif();
			$akt['pesan'] = $this->user_m->listPesan();
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/profile/view_profile',$data);
		}
	}

	public function edit()
	{
		$rules = $this->user_m->profil_rules;

		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			$this->user_m->profil_ubah();
			redirect('user/profile/');
		}

		$this->load->model('user_m');
		$data['universitas'] = $this->user_m->get_univ();
		$data['kota'] = $this->user_m->get_kota();
		$data['profil'] = $this->user_m->get_profil_ubah();
		$data['jurusan'] = $this->user_m->get_jurusan();

		$akt['aktif'] = '';
		$akt['notif'] = $this->user_m->get_notif();
		$akt['pesan'] = $this->user_m->listPesan();
		$this->load->view('user/view_head');
		$this->load->view('user/view_nav',$akt);
		$this->load->view('user/view_side');
		$this->load->view('user/profile/view_profile_ubah',$data);
	}

	public function foto()
	{
		if (!file_exists('./images/student/'.$this->session->userdata['id_student']))
		{
    		mkdir('./images/student/'.$this->session->userdata['id_student'], 0777, true);
		}

		$config['upload_path'] = 'images/student/'.$this->session->userdata['id_student'];
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']	= '256';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$file = $data['upload_data']['file_name'];
			$this->user_m->foto($file);

			redirect('user/profile');

		}
	}

}

/* End of file profile.php */
/* Location: ./application/controllers/user/profile.php */