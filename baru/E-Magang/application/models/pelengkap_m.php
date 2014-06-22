<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelengkap_m extends MY_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function getKota(){

		$this->db->select()->from('t_kota');

		return $this->db->get()->result();

	}
	

}

/* End of file pelengkap.php */
/* Location: ./application/models/pelengkap.php */