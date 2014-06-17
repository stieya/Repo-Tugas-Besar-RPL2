<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_m extends CI_Model {

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
		'nama' => array(
			'field' => 'nama',
			'label' => 'Company Name',
			'rules' => 'trim|required|max_length[15]|xss_clean',
			),
		'alamat' => array(
			'field' => 'alamat',
			'label' => 'Company Address',
			'rules' => 'trim|required|max_length[20]|xss_clean',
			),
		'kode_pos' => array(
			'field' => 'kode_pos',
			'label' => 'Pos Code',
			'rules' => 'trim|required|is_natural|min_length[6]|max_length[6]|xss_clean',
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
		//Do your magic here
	}

	public function signup(){

		$this->input->post('email');
		$this->input->post('nama');
		$this->input->post('alamat');
		$this->input->post('kode_pos');
		$this->input->post('telepon');
		$this->input->post('password');

		$now = date('Y-m-d H:i:s');
		$data_user = array(
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'status_user' => 'COMPANY',
			'tanggal_masuk' => $now
			);	

		var_dump($data_user);
		
		if($this->db->insert('t_user',$data_user)){
			$id = $this->db->insert_id();

			$data_perusahaan = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'kode_pos' => $this->input->post('kode_pos'),
				'telepon' => $this->input->post('telepon'),
				'id_user' => $id
				);
				
			if($this->db->insert('t_perusahaan',$data_perusahaan)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{

			return FALSE;
		}
		

		//var_dump($data_user);
	}

	public function login($data){		

		$sql = "SELECT * FROM t_user JOIN t_perusahaan USING(id_user) WHERE email = ? AND password = ? AND status_user ='COMPANY' ";
		$value = array($data['email'],md5($data['password']));
		$query = $this->db->query($sql,$value);
		if($query->num_rows() > 0){
			$data = $query->result();

			//var_dump($data);
			//$_SESSION['id_user'] = $data[0]->id_user;
	
			$this->session->set_userdata('id_user',$data[0]->id_user);
			$this->session->set_userdata('email',$data[0]->email);
			$this->session->set_userdata('nama',$data[0]->nama);
			$this->session->set_userdata('foto_user',$data[0]->foto_user);
			$this->session->set_userdata('status_user',$data[0]->status_user);
			$this->session->set_userdata('id_perusahaan',$data[0]->id_perusahaan);
			$this->session->set_userdata('loggedin',TRUE);
			return TRUE;

		}else{
			return FALSE;
		}


	}

	public function getInfo(){
			
			$data = $this->db->select()->from('t_user');
			$this->db->join('t_perusahaan','t_user.id_user = t_perusahaan.id_user');
			$this->db->where('t_perusahaan.id_user',$this->session->userdata('id_user'));
			$result = $this->db->get()->row();
			

			$query =  $this->db->select()->from('t_job_sheet');
			$this->db->where('id_perusahaan',$result->id_perusahaan);
			$result2 = $this->db->get()->result();

			$query =  $this->db->select()->from('t_job_sheet');
			$this->db->where('id_perusahaan',$result->id_perusahaan);
			$this->db->where('status','1');
			$result3 = $this->db->get()->result();

			$query =  $this->db->select()->from('t_job_sheet');
			$this->db->where('id_perusahaan',$result->id_perusahaan);
			$this->db->where('status','0');
			$result4 = $this->db->get()->result();

			//var_dump($result4);

			$data = new stdClass();
			$data->jumlah_job_sheet_belum_dikerjakan = count($result4);
			$data->jumlah_job_sheet_dikerjakan = count($result3);
			$data->jumlah_job_sheet = count($result2);
			$data->perusahaan = $result;
			
			return $data;
	}

	public function data(){

	}

	public function loggedin(){
		return (bool) $this->session->userdata('loggedin');
	}

	public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}

		return $data;
	}


}

/* End of file company_m.php */
/* Location: ./application/models/company_m.php */