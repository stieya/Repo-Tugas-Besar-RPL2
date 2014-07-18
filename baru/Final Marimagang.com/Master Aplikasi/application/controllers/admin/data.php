<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data extends CI_Controller {

	public function index($hal)
	{
		$this->load->model('admin_m');
		$data['kota'] = $this->admin_m->get_kota();
	}
}

/* End of file data.php */
/* Location: ./application/controllers/admin/data.php */