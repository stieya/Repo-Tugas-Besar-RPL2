<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends User_Controller {

	public function index($msg = NULL,$id_user_pengirim = NULL)
	{
		if ($id_user_pengirim == NULL) 
		{
			$data['daftar_pesan'] = $this->user_m->pesan();
			$akt['pesan'] = $this->user_m->listPesan();
			$akt['aktif'] = 'pesan';
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/pesan/view_pesan',$data);
		}
		else
		{
			$data['detail_pesan'] = $this->user_m->lihatPesan($id_user_pengirim,$msg);
			$akt['pesan'] = $this->user_m->listPesan();
			$akt['aktif'] = 'pesan';
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/pesan/view_pesan_detail',$data);
		}
	}

	public function kirim($msg,$id_user_penerima)
	{
		$this->user_m->tambahPesan($id_user_penerima);
		redirect('user/message/'.$msg.'/'.$id_user_penerima);
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