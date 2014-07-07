<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends User_Controller {

	public function index($id_pemilik_pesan = NULL)
	{
		var_dump('masuk message index');
		var_dump($id_pemilik_pesan);
	}

	public function delete($id_pemilik_pesan = NULL,$id_pesan = NULL)
	{
		var_dump('masuk message delete');
		var_dump($id_pemilik_pesan);
		var_dump($id_pesan);
	}

}

/* End of file message.php */
/* Location: ./application/controllers/user/message.php */