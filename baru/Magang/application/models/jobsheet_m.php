<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet_m extends MY_Model {

	protected $_table_name = 't_job_sheet';
	protected $_primary_key = 'id_job_sheet';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamp = FALSE;
	protected $_where = "";


	public function saveJob(){

		
		$this->input->post('deskripsi');
		$this->input->post('duration');

		$data_jobsheet = array(
			'nama_job_sheet' => $this->input->post('nama'),
			'deskripsi_job_sheet' => $this->input->post('deskripsi'),
			'id_jurusan' => $this->input->post('bidang'),
			'tanggal_posting' => date('Y:m:d H:i:s'),
			'id_perusahaan' => $this->session->userdata('id_perusahaan'),
			'status' => 'Unclaimed',
			'durasi' => $this->input->post('durasi')
			);
		if($this->db->insert('t_job_sheet',$data_jobsheet)){
			//var_dump($this->db->insert_id());
			return $this->db->insert_id();

		}
		else{
			return TRUE;			
		}

	}



	public function getJobList(){
	}

	public function getJobSheet(){
			
		$this->db->select()
					->from('t_job_sheet')
					->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan','left')
					->where('id_perusahaan',$this->session->userdata('id_perusahaan'))
					->where('status <>','Hidden');

		$result = $this->db->get()->result();
		return $result;
	}

	public function getJobSheetdetail($id){
			
		$this->db->select()
					->from('t_job_sheet')
					->join('t_jurusan','t_jurusan.id_jurusan = t_job_sheet.id_jurusan','left')
					->where('id_perusahaan',$this->session->userdata('id_perusahaan'))
					->where('id_job_sheet',$id);

		$result = $this->db->get()->row();

		$this->db->select()->from('t_job_list')
								->where('id_job_sheet',$result->id_job_sheet);
		$this->db->order_by('id_job_list',"ASC");					

		$result2 = $this->db->get()->result();
		$data = new stdClass();
		$data->jobsheetdetail = $result;
		$data->jobsheetlist = $result2;
		
		return $data;
	}


	public function getJoblistDetail($id_job_sheet,$id_job_list){

		$this->db->select('foto_user,
							t_student.id_user AS id_user,
							t_universitas.nama AS nama_kampus,
							nim,
							t_student.nama AS nama_student,
							t_student_job_sheet.status AS status_student_job,
							t_student.id_student AS id_pekerja,
							waktu_start,
							waktu_akhir,')
						->from('t_job_sheet')
						->join('t_student_job_sheet','t_job_sheet.id_job_sheet = t_student_job_sheet.id_job_sheet')
						->join('t_student','t_student.id_student = t_student_job_sheet.id_student')
						->join('t_universitas','t_student.id_universitas = t_universitas.id_universitas')
						->join('t_user','t_student.id_user = t_user.id_user')
						->where('t_job_sheet.id_job_sheet',mysql_real_escape_string($id_job_sheet))
						->where('t_student_job_sheet.status',1);

		$result = $this->db->get()->row();

		$this->db->select()
			->from('t_job_list')
			->join('t_student_job_list','t_student_job_list.id_job_list = t_job_list.id_job_list','left')
			->where('t_job_list.id_job_list',mysql_real_escape_string($id_job_list));

		$result2 = $this->db->get()->row();

		$data = new stdClass();
		$data->studentjobsheet = $result;
		$data->studentjoblist = $result2;

		return $data;

	}

	public function employe($id_job_sheet){

		$this->db->select()->from('t_student_job_sheet')
					->where('id_job_sheet',$id_job_sheet);

		$result = $this->db->get()->row();

		return $result;
	}

	public function getJobSheetapp($id_job_sheet){
		$this->db->select()->from('t_job_sheet_application')
					->join('t_student','t_job_sheet_application.id_student = t_student.id_student')
					->join('t_user','t_student.id_user = t_user.id_user')
					->where('id_job_sheet',mysql_real_escape_string($id_job_sheet));
			
		$data = $this->db->get()->result();
		return $data;
	}

	public function finishJobSheet($data,$id_job_sheet){

		if($this->db->insert('t_penilaian',$data)){
			$data = array(
				'status' => 'Finished',
				);
			$this->db->set($data);
			$this->db->where('id_job_sheet',$id_job_sheet);
			if($this->db->update('t_job_sheet')){

				$data = array(
					'status' => 'Finished'
					);
				$this->db->set($data);
				$this->db->where('id_job_sheet',$id_job_sheet);
				$this->db->update('t_job_list');

				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		else{
			return FALSE;
		}

	}

}

/* End of file jobsheet_m.php */
/* Location: ./application/models/jobsheet_m.php */