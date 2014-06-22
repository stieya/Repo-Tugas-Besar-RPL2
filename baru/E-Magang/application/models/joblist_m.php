<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Joblist_m extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		
	}	

	public function saveJoblist($data,$id = NULL){
		
		if($id == NULL){

			if($this->db->insert('t_job_list',$data)){
				return TRUE;
			}
			else{
				return FALSE;
			}

		}else{

			$id = mysql_real_escape_string($id);
			
			$this->db->set($data);
			$this->db->where('id_job_list',$id);
			
			if($this->db->update('t_job_list')){

				return TRUE;

			}	
			else{

				return FALSE;

			}

		}
		

	}

	public function deleteJoblist($id_job_sheet){

	}

	public function getJoblist($id_job_sheet,$id_job_list){

		$this->db->select()->from('t_job_list')
				->where('id_job_sheet',$id_job_sheet)
				->where('id_job_list',$id_job_list);
		return $this->db->get()->row();	

	}







}

/* End of file joblist_m.php */
/* Location: ./application/models/joblist_m.php */