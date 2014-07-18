<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notifikasi_m extends MY_Model {


public function getSample(){
	$this->db->select()->from('t_notification')
					->where('id_user',$this->session->userdata('id_user'))
					->where('status','0')
					->limit(5);

	return $this->db->get()->result();
}

public function getNotifikasi(){
	$this->db->select()->from('t_notification')
					->where('id_user',$this->session->userdata('id_user'))
					->where('status','0')
					->limit(5);

	return $this->db->get()->result();
}

public function getUnread(){

	$this->db->select()->from('t_notification')
					->where('id_user',$this->session->userdata('id_user'))
					->where('status','0');

	return $this->db->get()->result();

}


	

}

/* End of file notifikasi_m.php */
/* Location: ./application/models/notifikasi_m.php */