<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model 
{

	public $table_name = 't_user';
	protected $_primary_key = 'id';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamp = TRUE;
	protected $_where = "";

	public $signup_rules = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|is_unique[t_user.email]|xss_clean',
			),
		'nim' => array(
			'field' => 'nim',
			'label' => 'Your Name',
			'rules' => 'trim|required|is_natural|min_length[7]|max_length[12]|xss_clean',
			),
		'nama' => array(
			'field' => 'nama',
			'label' => 'Company Name',
			'rules' => 'trim|required|max_length[45]|xss_clean',
			),
		'alamat' => array(
			'field' => 'alamat',
			'label' => 'Company Address',
			'rules' => 'trim|required|max_length[90]|xss_clean',
			),
		'kode_pos' => array(
			'field' => 'kode_pos',
			'label' => 'Pos Code',
			'rules' => 'trim|required|is_natural|min_length[5]|max_length[5]|xss_clean',
			),
		'telepon' => array(
			'field' => 'telepon',
			'label' => 'Contact',
			'rules' => 'trim|required|min_length[6]|max_length[13]|xss_clean',
			),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required|matches[konfirmasi_password]|min_length[8]|max_length[15]|xss_clean',
			),
		'konfirmasi_password' => array(
			'field' => 'konfirmasi_password',
			'label' => 'Confirm Pasword',
			'rules' => 'trim|required|matched[password]|xss_clean',
			),
		);

	public function __construct()
	{
		parent::__construct();
	}

//---------//Dropdown

	public function get_jurusan()
	{
		$query = $this->db->get('t_jurusan');
		return $query->result_array();
	}

	public function get_univ()
	{
		$query = $this->db->get('t_universitas');
		return $query->result_array();
	}

	public function get_kota()
	{
		$query = $this->db->get('t_kota');
		return $query->result_array();
	}

//---------//AkhirDropdown

//---------//Dashboard
	public function get_dash()
	{
		$this->db->select();
		$this->db->from('t_student_job_sheet');
		$this->db->where('id_student',$this->session->userdata['id_student']);
		$result = $this->db->get()->result();

		$this->db->select();
		$this->db->from('t_student_job_list');
		$this->db->join('t_job_list','t_job_list.id_job_list = t_student_job_list.id_job_list');
		$this->db->where('t_student_job_list.id_student',$this->session->userdata['id_student']);
		$this->db->where('t_job_list.status','Finished');
		$result2 = $this->db->get()->result();

		$this->db->select();
		$this->db->from('t_student_job_list');
		$this->db->join('t_job_list','t_job_list.id_job_list = t_student_job_list.id_job_list');
		$this->db->where('t_student_job_list.id_student',$this->session->userdata['id_student']);
		$this->db->where('t_job_list.status','Unclaimed');
		$result3 = $this->db->get()->result();

		$this->db->select();
		$this->db->from('t_student_job_list');
		$this->db->join('t_job_list','t_job_list.id_job_list = t_student_job_list.id_job_list');
		$this->db->where('t_student_job_list.id_student',$this->session->userdata['id_student']);
		$result4 = $this->db->get()->result();

		$data = new stdClass();
		$data->lowongan = count($result);
		$data->list_finish = count($result2);
		$data->list_unfinish = count($result3);
		$data->list = count($result4);

		return $data;
	}

//---------//Pesan

	public function listPesan()
	{
		$this->db->select('t_message.id_user_pengirim, t_student.nama, t_message.body');
		$this->db->from('t_message');
		$this->db->join('t_message as m1','m1.id_user_pengirim = t_message.id_user_pengirim AND m1.id_message > t_message.id_message','left outer');
		$this->db->join('t_user','t_user.id_user = t_message.id_user_pengirim');
		$this->db->join('t_student', 't_student.id_user = t_user.id_user');
		$this->db->where('t_message.id_user_penerima',$this->session->userdata['id_student']);
		$this->db->where('m1.id_message is NULL');
		$this->db->where('t_message.status','0');
		$this->db->where('t_user.status_user','STUDENT');
		$this->db->order_by('t_message.tanggal','desc');
		$result = $this->db->get()->result();

		$this->db->select('t_message.id_user_pengirim, t_perusahaan.nama, t_message.body');
		$this->db->from('t_message');
		$this->db->join('t_message as m1','m1.id_user_pengirim = t_message.id_user_pengirim AND m1.id_message > t_message.id_message','left outer');
		$this->db->join('t_user','t_user.id_user = t_message.id_user_pengirim');
		$this->db->join('t_perusahaan', 't_perusahaan.id_user = t_user.id_user');
		$this->db->where('t_message.id_user_penerima',$this->session->userdata['id_student']);
		$this->db->where('m1.id_message is NULL');
		$this->db->where('t_message.status','0');
		$this->db->where('t_user.status_user','COMPANY');
		$this->db->group_by('t_message.id_user_pengirim');
		$this->db->order_by('t_message.tanggal','desc');
		$result2 = $this->db->get()->result();

		$data = new stdClass();
		$data->count = count($result) + count($result2);
		$data->msgStu = $result;
		$data->msgCom = $result2;

		return $data;
	}

	public function pesan()
	{
		$this->db->select('t_message.id_user_pengirim, t_student.nama, t_message.body, t_message.tanggal');
		$this->db->from('t_message');
		$this->db->join('t_message as m1','m1.id_user_pengirim = t_message.id_user_pengirim AND m1.id_message > t_message.id_message','left outer');
		$this->db->join('t_user','t_user.id_user = t_message.id_user_pengirim');
		$this->db->join('t_student', 't_student.id_user = t_user.id_user');
		$this->db->where('t_message.id_user_penerima',$this->session->userdata['id_student']);
		$this->db->where('m1.id_message is NULL');
		$this->db->where('t_user.status_user','STUDENT');
		$this->db->order_by('t_message.tanggal','desc');
		$result = $this->db->get()->result();

		$this->db->select('t_message.id_user_pengirim, t_perusahaan.nama, t_message.body, t_message.tanggal');
		$this->db->from('t_message');
		$this->db->join('t_message as m1','m1.id_user_pengirim = t_message.id_user_pengirim AND m1.id_message > t_message.id_message','left outer');
		$this->db->join('t_user','t_user.id_user = t_message.id_user_pengirim');
		$this->db->join('t_perusahaan', 't_perusahaan.id_user = t_user.id_user');
		$this->db->where('t_message.id_user_penerima',$this->session->userdata['id_student']);
		$this->db->where('m1.id_message is NULL');
		$this->db->where('t_user.status_user','COMPANY');
		$this->db->order_by('t_message.tanggal','desc');
		$result2 = $this->db->get()->result();

		$data = new stdClass();
		$data->msgStu = $result;
		$data->msgCom = $result2;

		return $data;
	}

	public function tambahPesan($id_user_penerima)
	{
		$pesan = array(
			'id_user_pengirim' => $this->session->userdata['id_user'],
			'id_user_penerima' => $id_user_penerima,
			'body' => $this->input->post('body'),
			'status' => '0',
			'tanggal' => unix_to_human(now(),TRUE,'eu')
			);
		
		if($this->db->insert('t_message',$pesan))
		{
			return TRUE;			
		}
		else
		{
			return FALSE;			
		}
	}

	public function lihatPesan($id_user_pengirim,$msg)
	{
		if ($msg == "student")
		{
			$this->db->select();
			$this->db->from('t_message');
			$this->db->join('t_user','t_user.id_user = t_message.id_user_pengirim');
			$this->db->join('t_student', 't_student.id_user = t_user.id_user');
			$this->db->where('t_message.id_user_penerima',$this->session->userdata['id_student']);
			$this->db->where('t_message.id_user_pengirim',$id_user_pengirim);
			$this->db->or_where('t_message.id_user_pengirim',$this->session->userdata['id_student']);
			$this->db->where('t_message.id_user_penerima',$id_user_pengirim);
			$result = $this->db->get()->result();
		}
		else if ($msg == "company")
		{
			$this->db->select();
			$this->db->from('t_message');
			$this->db->join('t_user','t_user.id_user = t_message.id_user_pengirim');
			$this->db->join('t_perusahaan', 't_perusahaan.id_user = t_user.id_user');
			$this->db->where('t_message.id_user_penerima',$this->session->userdata['id_student']);
			$this->db->where('t_message.id_user_pengirim',$id_user_pengirim);
			$this->db->or_where('t_message.id_user_pengirim',$this->session->userdata['id_student']);
			$this->db->where('t_message.id_user_penerima',$id_user_pengirim);
			$result = $this->db->get()->result();
		}

		foreach ($result as $message)
		{
			$sql = "UPDATE t_message set status = ? where id_user_penerima = ? && id_user_pengirim = ? ";
			$value = array('1',$this->session->userdata['id_user'],$id_user_pengirim);
			$this->db->query($sql,$value);	
		}

		$data = new stdClass;
		$data->pesan = $result;
		$data->pengirim = $id_user_pengirim;
		$data->msg = $msg;

		return $data;		
	}
//---------//AkhirPesan

//---------//COMPANY
	public function get_company()
	{
		$this->db->select();
		$this->db->from('t_perusahaan');
		$this->db->join('t_job_sheet','t_job_sheet.id_perusahaan = t_perusahaan.id_perusahaan');
		$this->db->join('t_student_job_sheet','t_student_job_sheet.id_job_sheet = t_job_sheet.id_job_sheet');
		$this->db->join('t_user','t_user.id_user = t_perusahaan.id_user');
		$this->db->where('t_student_job_sheet.id_student',$this->session->userdata['id_student']);
		$this->db->group_by('t_perusahaan.id_perusahaan');
		$data = $this->db->get()->result();

		return $data;
	}

	public function get_jobsheet($id_company,$id_jobsheet = NULL)
	{
		if ($id_jobsheet != NULL) 
		{
			$this->db->select();
			$this->db->from('t_job_sheet');
			$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan');
			$this->db->where('t_job_sheet.id_perusahaan',$id_company);
			$this->db->where('t_job_sheet.id_job_sheet',$id_jobsheet);
			$result = $this->db->get()->row();
		}
		else
		{
			$this->db->select();
			$this->db->from('t_job_sheet');
			$this->db->join('t_student_job_sheet','t_student_job_sheet.id_job_sheet = t_job_sheet.id_job_sheet');
			$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan');
			$this->db->where('t_job_sheet.id_perusahaan',$id_company);
			$this->db->where('t_student_job_sheet.id_student',$this->session->userdata['id_student']);
			$result = $this->db->get()->result();
		}

		$result2 = $this->db->get_where('t_perusahaan',array('id_perusahaan' => $id_company))->row();

		$data = new stdClass();
		$data->jobsheet = $result;
		$data->company = $result2;
		$data->app = $this->db->get_where('t_job_sheet_application',array('id_student' => $this->session->userdata['id_student'],'status' => '1'))->row();

		return $data;
	}

	public function upload_app($file,$id_jobsheet)
	{
			$files = array(
				'id_job_sheet' => $id_jobsheet,
				'id_student' => $this->session->userdata['id_student'],
				'application_file' => 'files/student/'.$this->session->userdata['id_student'].'/'.$file,
				'waktu_daftar' => unix_to_human(now(),TRUE,'eu'),
				'status' => '0',
				'comment' => $this->input->post('comment')
				);

			if ($this->db->insert('t_job_sheet_application', $files)) 
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
	}

//---------//AkhirCOMPANY


//---------//Profil
	public function get_profil($id_perusahaan = NULL)
	{
		if ($id_perusahaan == NULL) 
		{
			$this->db->select('t_student.nama as namaStudent, t_student.alamat as alamatStudent, t_kota.nama as kotaStudent, t_student.`kode_pos` AS kpStudent, t_student.`telepon` AS tlpStudent, t_student.`email` AS emailStudent, t_student.`nim` AS nim, t_jurusan.nama as jurusan, t_universitas.nama as namaUniv, t_universitas.alamat as alamatUniv, t_universitas.id_kota as id_kota_univ, t_universitas.kode_pos as kpUniv, t_universitas.telepon as tlpUniv, t_universitas.website as webUniv ');
			$this->db->from('t_student');
			$this->db->where('t_student.id_student',$this->session->userdata['id_student']);
			$this->db->join('t_kota','t_kota.id_kota = t_student.id_kota');
			$this->db->join('t_universitas','t_universitas.id_universitas = t_student.id_universitas');
			$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_student.id_jurusan');
			$result = $this->db->get()->row();

			$this->db->select('t_kota.nama as kotaUniv');
			$this->db->from('t_kota');
			$this->db->where('t_kota.id_kota',$result->id_kota_univ);
			$result2 = $this->db->get()->row();

			$data = new stdClass();
			$data->profile = $result;
			$data->kota = $result2;
			$data->hal = "student";
		}
		else
		{
			$this->db->select('t_perusahaan.id_perusahaan,t_perusahaan.nama as nama_perusahaan,t_perusahaan.alamat,t_kota.nama as nama_kota,t_perusahaan.kode_pos,t_perusahaan.telepon,t_perusahaan.website');
			$this->db->from('t_perusahaan');
			$this->db->where('t_perusahaan.id_perusahaan',$id_perusahaan);
			$this->db->join('t_kota','t_kota.id_kota = t_perusahaan.id_kota');
			$result = $this->db->get()->row();

			$data = new stdClass();
			$data->profile = $result;
			$data->hal = "company";
		}

		return $data;
	}
	
//---------//AkhirDasboard

	public function get_profil_ubah()
	{
		$this->db->select();
		$this->db->from('t_student');
		$this->db->where('t_student.id_student',$this->session->userdata['id_student']);
		$this->db->join('t_user','t_user.id_user = t_student.id_user');

		return $this->db->get()->row();
	}

	public function foto($foto)
	{
		$files = array(
			'foto_user' => 'images/student/'.$this->session->userdata['id_student'].'/'.$foto
			);
		
		if($this->db->where('id_user',$this->session->userdata['id_user'])->update('t_user',$files))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function profil_ubah()
	{
		$data_user = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'status_user' => 'STUDENT',
			'tanggal_masuk' => unix_to_human(now(),TRUE,'eu')
			);
		
		if($this->db->where('id_user',$this->session->userdata['id_user'])->update('t_user',$data_user))
		{
			$data_student = array(
				'id_universitas' => $this->input->post('id_universitas'),
				'id_kota' => $this->input->post('id_kota'),
				'nim' => $this->input->post('nim'),
				'id_jurusan' => $this->input->post('id_jurusan'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'kode_pos' => $this->input->post('kode_pos'),
				'telepon' => $this->input->post('telepon'),
				);

			if($this->db->where('id_student',$this->session->userdata['id_student'])->update('t_student',$data_student))
			{
				$this->session->set_userdata('email',$this->input->post('email'));
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{

			return FALSE;
		}

	}

//---------//akhirProfil

//---------//Jobsheet

	public function jobsheet()
	{
		$this->db->select('t_job_sheet.status, t_job_sheet.nama_job_sheet,t_jurusan.nama as nama_jurusan,t_job_sheet.id_job_sheet,t_job_sheet.durasi,t_job_sheet.deskripsi_job_sheet, t_perusahaan.nama as nama_perusahaan, t_perusahaan.id_perusahaan');
		$this->db->from('t_student_job_sheet');
		$this->db->where('t_student_job_sheet.id_student',$this->session->userdata['id_student']);
		$this->db->where('t_student_job_sheet.status',1);
		$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_student_job_sheet.id_job_sheet');
		$this->db->join('t_perusahaan','t_perusahaan.id_perusahaan = t_job_sheet.id_perusahaan');
		$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan');
		$result = $this->db->get()->result_array();

		return $result;
	}

	public function detail_jobsheet($id_job_sheet,$hal = NULL)
	{
		if ($hal == NULL) 
		{
		$this->db->select();
		$this->db->from('t_student_job_sheet');
		$this->db->where('t_student_job_sheet.id_student',$this->session->userdata['id_student']);
		$this->db->where('t_student_job_sheet.status',1);
		$this->db->where('t_student_job_sheet.id_job_sheet',$id_job_sheet);
		$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_student_job_sheet.id_job_sheet');
		$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan');
		$result = $this->db->get()->row();

		$this->db->select('t_job_sheet.nama_job_sheet,t_job_sheet.deskripsi_job_sheet,t_job_list.status,t_job_sheet.id_job_sheet,t_job_list.body,t_job_list.head,t_job_list.file_perusahaan,t_student_job_list.file_user,t_job_sheet.id_job_sheet,t_job_list.id_job_list,t_student_job_list.id_student_job_list');
		$this->db->from('t_student_job_list');
		$this->db->where('t_student_job_list.id_student',$this->session->userdata['id_student']);
		$this->db->join('t_job_list','t_job_list.id_job_list = t_student_job_list.id_job_list');
		$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_job_list.id_job_sheet');
		$this->db->where('t_job_sheet.id_job_sheet',$id_job_sheet);
		$result2 = $this->db->get()->result();
		}
		else
		{
		$this->db->select();
		$this->db->from('t_job_sheet');
		$this->db->where('t_job_sheet.id_job_sheet',$id_job_sheet);
		$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan');
		$result = $this->db->get()->row();

		$this->db->select('t_job_sheet.nama_job_sheet,t_job_sheet.deskripsi_job_sheet,t_job_list.status,t_job_sheet.id_job_sheet,t_job_list.body,t_job_list.head,t_job_list.file_perusahaan,t_job_sheet.id_job_sheet,t_job_list.id_job_list');
		$this->db->from('t_job_list');
		$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_job_list.id_job_sheet');
		$this->db->where('t_job_sheet.id_job_sheet',$id_job_sheet);
		$result2 = $this->db->get()->result();
		}

		$this->db->select();
		$this->db->from('t_job_sheet_application');
		$this->db->where('id_student',$this->session->userdata['id_student']);
		$this->db->where('status','1');
		$result3 = $this->db->get()->row();

		$data = new stdClass();
		$data->jobsheet = $result;
		$data->joblist = $result2;
		$data->app = $result3;

		return $data;
	}

	public function comment_joblist($id_job_sheet,$id_job_list)
	{
		$this->db->select();
		$this->db->from('t_student_job_sheet');
		$this->db->where('t_student_job_sheet.id_student',$this->session->userdata['id_student']);
		$this->db->where('t_student_job_sheet.status',1);
		$this->db->where('t_student_job_sheet.id_job_sheet',$id_job_sheet);
		$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_student_job_sheet.id_job_sheet');
		$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan');
		$result = $this->db->get()->row();

		$this->db->select('t_job_sheet.nama_job_sheet,t_job_sheet.deskripsi_job_sheet,t_job_list.status,t_job_sheet.id_job_sheet,t_job_list.body,t_job_list.head,t_job_list.file_perusahaan,t_student_job_list.file_user,t_job_sheet.id_job_sheet,t_job_list.id_job_list,t_student_job_list.id_student_job_list');
		$this->db->from('t_student_job_list');
		$this->db->where('t_student_job_list.id_student',$this->session->userdata['id_student']);
		$this->db->join('t_job_list','t_job_list.id_job_list = t_student_job_list.id_job_list');
		$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_job_list.id_job_sheet');
		$this->db->where('t_job_sheet.id_job_sheet',$id_job_sheet);
		$this->db->where('t_job_list.id_job_list',$id_job_list);
		$result2 = $this->db->get()->row();

		$this->db->select();
		$this->db->from('t_comment_list');
		$this->db->where('t_comment_list.id_job_list',$id_job_list);
		$this->db->join('t_user','t_user.id_user = t_comment_list.id_user');
		$this->db->join('t_student','t_student.id_user = t_user.id_user');
		$this->db->order_by('t_comment_list.id_comment_list','desc');
		$result3 = $this->db->get()->result();

		$data = new stdClass();
		$data->jobsheet = $result;
		$data->joblist = $result2;
		$data->komentar = $result3;

		return $data;
	}

	public function komentar($id_job_list)
	{
		$this->input->post('isi_comment');

		$komen = array(
			'id_job_list' => $id_job_list,
			'id_user' => $this->session->userdata['id_user'],
			'isi_comment' => $this->input->post('isi_comment'),
			'waktu_comment' => unix_to_human(now(),TRUE,'eu')
			);
		
		if($this->db->insert('t_comment_list',$komen))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function upload($file,$id_job_list,$id_student_job_list,$id_jobsheet = NULL,$hal = NULL)
	{
		if ($hal == 'detail')
		{
			$files = array(
				'id_job_sheet' => $id_jobsheet,
				'id_student' => $this->session->userdata['id_student'],
				'application_file' => 'files/student/'.$this->session->userdata['id_student'].'/'.$file,
				'waktu_daftar' => unix_to_human(now(),TRUE,'eu'),
				'status' => '0',
				'comment' => $this->input->post('comment')
				);

			if ($this->db->insert('t_job_sheet_application', $files)) 
			{
				$this->db->select('t_job_sheet.nama_job_sheet,t_job_sheet.deskripsi_job_sheet,t_job_list.status,t_job_sheet.id_job_sheet,t_job_list.body,t_job_list.head,t_job_list.file_perusahaan,t_job_sheet.id_job_sheet,t_job_list.id_job_list');
				$this->db->from('t_job_list');
				$this->db->join('t_job_sheet','t_job_sheet.id_job_sheet = t_job_list.id_job_sheet');
				$this->db->where('t_job_sheet.id_job_sheet',$id_jobsheet);
				$result2 = $this->db->get()->result();

				foreach ($result2 as $res2)
				{
					$fill = array(
					'id_job_list' => $res2->id_job_list,
					'id_student' => $this->session->userdata['id_student']
					);
					$this->db->insert('t_student_job_list',$fill);
				}

				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			$files = array(
				'file_user' => 'files/student/'.$this->session->userdata['id_student'].'/'.$file,
				'waktu_upload_file' => unix_to_human(now(),TRUE,'eu')
				);
			
			if($this->db->where('id_student_job_list',$id_student_job_list)->update('t_student_job_list',$files))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}

		}
	}
//---------//akhirJobsheet

//---------//Register
	public function signup()
	{
		$data_user = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'status_user' => 'STUDENT',
			'tanggal_masuk' => unix_to_human(now(),TRUE,'eu')
			);
		
		if($this->db->insert('t_user',$data_user))
		{
			$id = $this->db->insert_id();

			$data_student = array(
				'id_universitas' => $this->input->post('id_universitas'),
				'id_kota' => $this->input->post('id_kota'),
				'nim' => $this->input->post('nim'),
				'id_jurusan' => $this->input->post('id_jurusan'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'email' => $this->input->post('email'),
				'kode_pos' => $this->input->post('kode_pos'),
				'telepon' => $this->input->post('telepon'),
				'id_user' => $id
				);

			if($this->db->insert('t_student',$data_student))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}

//---------//AkhirRegister


//---------//Login
	public function login($data)
	{
		$sql = "SELECT * FROM t_user JOIN t_student USING(id_user) WHERE t_user.email = ? AND t_user.password = ? AND status_user ='STUDENT' ";
		$value = array($data['email'],md5($data['password']));
		$query = $this->db->query($sql,$value);
		if($query->num_rows() > 0)
		{
			$data = $query->result();
			$univ = $this->db->get_where('t_universitas',array('id_universitas' => $data[0]->id_universitas))->result();
			$kota = $this->db->get_where('t_kota',array('id_kota' => $data[0]->id_kota))->result();
			$jurusan = $this->db->get_where('t_jurusan',array('id_jurusan' => $data[0]->id_jurusan))->result();
			$this->session->set_userdata('id_user',$data[0]->id_user);
			$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('foto_user',$data[0]->foto_user);
			$this->session->set_userdata('status_user',$data[0]->status_user);
			$this->session->set_userdata('id_student',$data[0]->id_student);
			$this->session->set_userdata('loggedin',TRUE);
			$sql = "UPDATE t_user set last_login = ? where id_user = ? ";
			$value = array(unix_to_human(now(),TRUE,'eu'),$data[0]->id_user);
			$this->db->query($sql,$value);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

//---------//AkhirLogin

	public function array_from_post($fields)
	{
		$data = array();
		foreach ($fields as $field) 
		{
			$data[$field] = $this->input->post($field);
		}

		return $data;
	}


	public function cari($id_kota = NULL, $id_jenis = NULL,$string = NULL ){

		if($id_kota != NULL && $id_jenis == NULL && $string == NULL){

			if($id_kota == '0'){
				$this->db->select('')->from('t_perusahaan')
								->join('t_user','t_perusahaan.id_user = t_user.id_user')
								->where('status','unclaimed');	
			}
			else{
				$this->db->select('')->from('t_perusahaan')
								->join('t_user','t_perusahaan.id_user = t_user.id_user')
								->where('id_kota',$id_kota)
								->where('status','unclaimed');		
			}
			

		}
		elseif($id_kota != NULL && $id_jenis != NULL && $string == NULL){
			
			if($id_jenis == 'perusahaan' || $id_jenis == 'none'){
			
				if($id_kota == 0){
					
					$this->db->select('*');
					$this->db->from('t_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					
					
									
				}else{
					
					$this->db->select('*');
					$this->db->from('t_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					$this->db->where('id_kota',$id_kota);
					
					
				}

			}
			elseif($id_jenis == 'pekerjaan'){
				if($id_kota == 0){
					
					$this->db->select('
						nama_job_sheet,
						t_jurusan.nama AS nama_jurusan,
						id_job_sheet,
						t_perusahaan.id_perusahaan AS id_perusahaan,
						deskripsi_job_sheet,
						tanggal_masuk,
						status,
						email,
						t_user.id_user AS id_user
						');
					$this->db->from('t_job_sheet');
					$this->db->join('t_perusahaan','t_job_sheet.id_perusahaan = t_perusahaan.id_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan','left');
					$this->db->where('status','Unclaimed');
									
				}else{
					
					$this->db->select('
						nama_job_sheet,
						t_jurusan.nama AS nama_jurusan,
						id_job_sheet,
						t_perusahaan.id_perusahaan AS id_perusahaan,
						deskripsi_job_sheet,
						tanggal_masuk,
						status,
						email,
						t_user.id_user AS id_user
						');
					$this->db->from('t_job_sheet');
					$this->db->join('t_perusahaan','t_job_sheet.id_perusahaan = t_perusahaan.id_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan','left');
					$this->db->where('id_kota',$id_kota);
					$this->db->where('status','Unclaimed');
					
					
				}

			}
		}
		elseif($id_kota != NULL && $id_jenis != NULL && $string != NULL){

			$kata = explode('%20', $string);

			if($id_jenis == 'perusahaan' || $id_jenis == 'none'){
			
			
				if($id_kota == 0){
					
					$this->db->select('*');
					$this->db->from('t_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					if(count($kata) > 1){

						$this->db->like("nama",$kata[0]);
						
						for($i = 1;$i < count($kata); $i++){
							$this->db->like("nama",$kata[$i]);
						}
						
					}else{
						$this->db->like("nama",$kata[0]);
						
					}
									
				}else{
					
					$this->db->select('*');
					$this->db->from('t_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					
					
					if(count($kata) > 1){

						$this->db->like("nama",$kata[0]);
						
						for($i = 1;$i < count($kata); $i++){
							$this->db->like("nama",$kata[$i]);
						}
						
					}else{
						$this->db->like("nama",$kata[0]);
						
					}
					$this->db->where('id_kota',$id_kota);
					
				}

			}
			elseif($id_jenis == 'pekerjaan'){

				if($id_kota == 0){
					
					$this->db->select('
						nama_job_sheet,
						t_jurusan.nama AS nama_jurusan,
						id_job_sheet,
						t_perusahaan.id_perusahaan AS id_perusahaan,
						deskripsi_job_sheet,
						tanggal_masuk,
						status,
						email,
						t_user.id_user AS id_user
						');
					$this->db->from('t_job_sheet');
					$this->db->join('t_perusahaan','t_job_sheet.id_perusahaan = t_perusahaan.id_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan','left');
					$this->db->where('status','Unclaimed');
					if(count($kata) > 1){

						$this->db->like("nama_job_sheet",$kata[0]);
						
						for($i = 1;$i < count($kata); $i++){
							$this->db->like("nama_job_sheet",$kata[$i]);
						}
						
					}else{
						$this->db->like("nama_job_sheet",$kata[0]);
						
					}
									
				}else{
					
					$this->db->select('
						nama_job_sheet,
						t_jurusan.nama AS nama_jurusan,
						id_job_sheet,
						t_perusahaan.id_perusahaan AS id_perusahaan,
						deskripsi_job_sheet,
						tanggal_masuk,
						status,
						email,
						t_user.id_user AS id_user
						');
					$this->db->from('t_job_sheet');
					$this->db->join('t_perusahaan','t_job_sheet.id_perusahaan = t_perusahaan.id_perusahaan');
					$this->db->join('t_user','t_perusahaan.id_user = t_user.id_user');
					$this->db->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan','left');
					if(count($kata) > 1){

						$this->db->like("nama_job_sheet",$kata[0]);
						
						for($i = 1;$i < count($kata); $i++){
							$this->db->like("nama_job_sheet",$kata[$i]);
						}
						
					}else{
						$this->db->like("nama_job_sheet",$kata[0]);
						
					}
					$this->db->where('id_kota',$id_kota);
					$this->db->where('status','Unclaimed');
					
					
				}

			}
			
			
		}
		elseif($id_kota == NULL && $id_jenis == NULL && $string == NULL){

			$this->db->select('')->from('t_perusahaan')
								->join('t_user','t_perusahaan.id_user = t_user.id_user');
			

		}

		$data = $this->db->get()->result();

		return $data;

	}


}

/* End of file company_m.php */
/* Location: ./application/models/company_m.php */