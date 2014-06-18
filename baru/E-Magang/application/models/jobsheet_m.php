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
			return FALSE;
		}
		else{
			return TRUE;			
		}

	}

	public function saveJobList(){


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
		$result2 = $this->db->get()->result();
					
		$data = new stdClass();
		$data->jobsheetdetail = $result;
		$data->jobsheetlist = $result2;

		return $data;
	}


}

/* End of file jobsheet_m.php */
/* Location: ./application/models/jobsheet_m.php */