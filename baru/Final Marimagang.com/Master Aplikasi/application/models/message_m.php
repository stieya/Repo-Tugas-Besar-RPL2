<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message_m extends MY_Model {

	public function getMessageDetail($id_pengirim){

		$sql = 'SELECT t_student.nama AS nama_student, t_perusahaan.nama AS nama_perusahaan,body,id_user_penerima,foto_user,id_user_pengirim FROM t_message  LEFT JOIN t_student ON t_student.`id_user` = t_message.`id_user_pengirim` LEFT JOIN t_user ON t_message.`id_user_pengirim` = t_user.`id_user` LEFT JOIN t_perusahaan ON t_perusahaan.`id_user` = t_message.`id_user_pengirim` WHERE (id_user_pengirim = ? AND id_user_penerima = ?) OR (id_user_pengirim = ? AND id_user_penerima = ?) ORDER BY id_message DESC';
		$query= $this->db->query($sql,array($id_pengirim,$this->session->userdata('id_user'),$this->session->userdata('id_user'),$id_pengirim));
		
		return $query->result();		

	}

	public function saveMessageDetail($data){

		if($this->db->insert('t_message',$data)){
			return TRUE;
		}
		else{
			return FALSE;
		}

	}

}

/* End of file message_m.php */
/* Location: ./application/models/message_m.php */