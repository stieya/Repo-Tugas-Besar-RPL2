<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet_m extends CI_Model {

	public function saveJob(){

		
		$this->input->post('deskripsi');
		$this->input->post('duration');

		$data_jobsheet = array(
			'nama_job_sheet' => $this->input->post('nama'),
			'deskripsi_job_sheet' => $this->input->post('deskripsi'),
			'tanggal_posting' => date('Y:m:d H:i:s'),
			'id_perusahaan' => $this->session->userdata('id_perusahaan'),
			'status' => 0,
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
		
	}


}

/* End of file jobsheet_m.php */
/* Location: ./application/models/jobsheet_m.php */