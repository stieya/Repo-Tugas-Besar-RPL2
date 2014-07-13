<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_m extends CI_Model 
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

	public function get_kota()
	{
		$query = $this->db->get('t_kota');
		return $query->result_array();
	}

	public function get_provinsi()
	{
		$query = $this->db->get('t_provinsi');
		return $query->result_array();
	}

	public function get_jurusan()
	{
		$query = $this->db->get('t_jurusan');
		return $query->result_array();
	}

	public function get_universitas()
	{
		$query = $this->db->get('t_provinsi');
		return $query->result_array();
	}
//---------//AkhirDropdown


//---------//Tambah

	public function tambah($hal)
	{
		if($hal == "universitas")
		{
			$universitas = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'id_kota' => $this->input->post('id_kota'),
				'kode_pos' => $this->input->post('kode_pos'),
				'telepon' => $this->input->post('telepon'),
				'website' => $this->input->post('website')
			);

			if($this->db->insert('t_universitas',$universitas))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else if($hal == "kota")
		{
			$kota = array(
				'nama' => $this->input->post('nama'),
				'id_provinsi' => $this->input->post('id_provinsi')
			);

			if($this->db->insert('t_kota',$kota))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else if($hal == "jurusan")
		{
			$jurusan = array(
				'nama' => $this->input->post('nama')
			);

			if($this->db->insert('t_jurusan',$jurusan))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}

//---------//AkhirTambah


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
		$sql = "SELECT * FROM t_user WHERE t_user.email = ? AND t_user.password = ? AND status_user ='ADMIN' ";
		$value = array($data['email'],md5($data['password']));
		$query = $this->db->query($sql,$value);
		if($query->num_rows() > 0)
		{
			$data = $query->result();
			$this->session->set_userdata('id_user',$data[0]->id_user);
			$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('foto_user',$data[0]->foto_user);
			$this->session->set_userdata('status_user',$data[0]->status_user);
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

	public function getInfo(){

		$this->db->select()->from('t_user');
		$result1 = $this->db->get()->result();

		//$this->db->select()->from()
		$data  = new stdClass();
		$data->users = $result1;

		return $data;
	}

	public function getStudent(){
		$this->db->select('
				t_universitas.nama AS nama_universitas,
				tanggal_masuk,t_student.nama AS nama_user,
				block,status_user,t_student.id_user AS id_user
				')
						->from('t_student')
						->join('t_user','t_user.id_user = t_student.id_user')
						->join('t_universitas','t_student.id_universitas = t_universitas.id_universitas');

		return $this->db->get()->result();						
	}

	public function blockStudent($id_user){
		$data = array(
			'block' => '1'
			);
		$this->db->where('id_user',$id_user);
		if($this->db->update('t_user',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function unblockStudent($id_user){
		$data = array(
			'block' => '0'
			);
		$this->db->where('id_user',$id_user);
		if($this->db->update('t_user',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function getCompany(){
		$this->db->select('*')
						->from('t_perusahaan')
						->join('t_user','t_user.id_user = t_perusahaan.id_user');

		return $this->db->get()->result();						
	}

	public function blockCompany($id_user){
		$data = array(
			'block' => '1'
			);
		$this->db->where('id_user',$id_user);
		if($this->db->update('t_user',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function unblockCompany($id_user){
		$data = array(
			'block' => '0'
			);
		$this->db->where('id_user',$id_user);
		if($this->db->update('t_user',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

}

/* End of file company_m.php */
/* Location: ./application/models/company_m.php */