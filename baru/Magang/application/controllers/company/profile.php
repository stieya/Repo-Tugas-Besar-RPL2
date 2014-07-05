<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Company_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('company_m');
		$this->load->model('pelengkap_m');
	}

	protected $profile_rules = array(
		'nama' => array(
			'field' => 'nama',
			'Label' => 'Your Company name',
			'rules' => 'trim|required|min_length[8]|max_length[30]|xss_clean|',
			),
		'telp' => array(
			'field' => 'telp',
			'Label' => ' Your Company Contact',
			'rules' => 'trim|is_natural|required|min_length[8]|max_length[30]|xss_clean|',
			),
		'website' => array(
			'field' => 'website',
			'Label' => 'Your|Company Website',
			'rules' => 'trim|min_length[8]|max_length[30]|xss_clean|',
			),
		'kode_pos' => array(
			'field' => 'kode_pos',
			'Label' => 'Your Company Pos Code',
			'rules' => 'trim|required|is_natural|required|min_length[5]|max_length[5]|xss_clean|',
			),
		'kota' => array(
			'field' => 'kota',
			'Label' => 'Your Company City',
			'rules' => 'trim|required|is_natural|required|xss_clean|',
			),
		'alamat' => array(
			'field' => 'alamat',
			'Label' => 'Your Company Addres',
			'rules' => 'trim|required|min_length[10]|max_length[50]|required|xss_clean|',
			),
		);  

	public function index($id_user = NULL)
	{

		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		


		if($id_user != NULL){
			$nav['halaman'] = 'user';
			$format = 'DATE_COOKIE';
			timezones('UP7');
			$time = time();
			$data['tanggal'] = substr(standard_date($format,$time),0,18);
			$this->db->select('t_user.email AS email,foto_user,tanggal_masuk,
				t_universitas.nama AS nama_universitas,
				t_kota.nama AS nama_kota,
				nim,
				t_student.nama AS nama_student,
				t_jurusan.nama AS nama_jurusan,
				t_student.telepon AS no_telp,
				id_student,
				t_user.id_user AS id_user,')
			->from('t_user')
			->join('t_student','t_user.id_user = t_student.id_user')
			->join('t_kota','t_student.id_kota = t_kota.id_kota')
			->join('t_universitas','t_student.id_universitas = t_universitas.id_universitas')
			->join('t_jurusan','t_jurusan.id_jurusan = t_student.id_jurusan')
			->where('t_student.id_user',$id_user);

			$data['user'] = $this->db->get()->row();
			if(count($data['user']) > 0){
				//var_dump($data['user']);
				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/profile/view_otherprofile',$data);	
			}
			else{
				redirect('company/404');
			}
			
		}
		elseif($id_user == NULL){
			var_dump('masuk profile');
		}
	}

	public function edit()
	{

		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		$nav['halaman'] = 'dashboard';
		$data['perusahaan'] = $this->company_m->getInfo();
		$format = 'DATE_COOKIE';
		timezones('UP7');
		$time = time();
		$data['tanggal'] = substr(standard_date($format,$time),0,18);
		$data['kota'] = $this->pelengkap_m->getKota();

		$this->form_validation->set_rules($this->profile_rules);
		if(isset($_FILES['file']) && $_FILES['file']['name'] != ''){


			if (!file_exists('./images/company/'.$this->session->userdata('id_user'))) {
    			mkdir('./images/company/'.$this->session->userdata('id_user'), 0777, TRUE);
			}

			$config['upload_path'] = './images/company/'.$this->session->userdata('id_user'); 
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = 5000;
			$config['overwrite'] = TRUE;
							
			$this->load->library('upload', $config);
			

			if($this->upload->do_upload('file') == TRUE){
				$foto_insert = array(
					'foto_user' => $this->upload->data()['file_name'],
					);
				if($this->form_validation->run()){
					$profile_insert = array(
						'nama' => $this->input->post('nama'),
						'website' => $this->input->post('website'),
						'telepon' => $this->input->post('telp'),
						'kode_pos' => $this->input->post('kode_pos'),
						'alamat' => $this->input->post('alamat'),
						'id_kota' => $this->input->post('kota'),
						);
					$this->company_m->table = 't_perusahaan';
					$this->company_m->primary = 'id_perusahaan';

					if($this->company_m->saveProfile($profile_insert,$this->session->userdata('id_perusahaan'))){
						$this->company_m->table = 't_user';
						$this->company_m->primary = 'id_user';
						if($this->company_m->saveProfile($foto_insert,$this->session->userdata('id_user'))){
							redirect('/company');
						}
					}
				}
			}


		}
		else{

			if($this->form_validation->run() == TRUE){

				$profile_insert = array(
					'nama' => $this->input->post('nama'),
					'website' => $this->input->post('website'),
					'telepon' => $this->input->post('telp'),
					'kode_pos' => $this->input->post('kode_pos'),
					'alamat' => $this->input->post('alamat'),
					'id_kota' => $this->input->post('kota'),
					);
				$this->company_m->table = 't_perusahaan';
				$this->company_m->primary = 'id_perusahaan';
				if($this->company_m->saveProfile($profile_insert,$this->session->userdata('id_perusahaan'))){
					redirect('/company');
				}				
			}
		
		}

		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side',$side);
		$this->load->view('company/profile/view_editprofile',$data);

	}

}

/* End of file profile.php */
/* Location: ./application/controllers/company/profile.php */