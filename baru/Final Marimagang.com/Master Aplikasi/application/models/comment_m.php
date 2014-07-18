<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_m extends MY_Model {


	public function getJoblistComment($id_job_list,$id_job_sheet = NULL){
	
		$this->db->select('t_user.id_user,isi_comment,t_student.nama AS nama_student, t_perusahaan.nama AS nama_perusahaan,foto_user,status_user')
						->from('t_comment_list')
						->join('t_user','t_comment_list.id_user = t_user.id_user')
						->join ('t_perusahaan','t_perusahaan.id_user = t_comment_list.id_user','left')
						->join('t_student','t_student.id_user = t_comment_list.id_user','left')
						->where('id_job_list',$id_job_list)
						->order_by('id_comment_list',"ASC");

		return $this->db->get()->result();			
		
	}

	public  function saveJoblistComment($id_job_list,$comment){

		$data = array(
			'id_job_list' => $id_job_list,
			'id_user' => $this->session->userdata('id_user'),
			'isi_comment' => $comment,
			);

		if($this->db->insert('t_comment_list',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

}

/* End of file comment_m.php */
/* Location: ./application/models/comment_m.php */