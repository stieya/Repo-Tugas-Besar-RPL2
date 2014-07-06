<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends Company_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('jobsheet_m');
		$this->load->model('message_m');
	}

	public $message_rules = array(
		'message' => array(
			'field' => 'message',
			'label' => 'Your Message',
			'rules' => 'required|trim|xss_clean|max_length[200]',
			)
		);

	public function index($id_pemilik_pesan=NULL)
	{
		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		$nav['halaman'] = 'message';
		$side['info'] = $this->infocompany;

		if($id_pemilik_pesan != NULL ){
			
			//var_dump($this->message_m->getMessageDetail($id_pemilik_pesan));
			$this->form_validation->set_rules($this->message_rules);

			if($this->form_validation->run() == TRUE){

				$message = array(
					'body' => $this->input->post('message'),
					'id_user_penerima' =>$id_pemilik_pesan,
					'id_user_pengirim' => $this->session->userdata('id_user'),
					'status' => '0',
					);
				$this->message_m->saveMessageDetail($message);

			}

			$this->db->select()->from('t_student')->where('id_user',$id_pemilik_pesan);
			$data['nama_user'] = $this->db->get()->row();

			$data['messages'] = $this->message_m->getMessageDetail($id_pemilik_pesan);
			$this->load->view('company/view_head');
			$this->load->view('company/view_nav',$nav);
			$this->load->view('company/view_side',$side);
			$this->load->view('company/message/view_messagedetail',$data);
		}else{

			$sql = "SELECT a.id ,a.conversation ,b.id_user_pengirim, b.id_user_penerima, b.body,t_student.`email`,t_student.`id_user`,foto_user,nama
				FROM(
				SELECT MAX(id_message) id,
					IF(id_user_pengirim > id_user_penerima,
					CONCAT(id_user_penerima,',',id_user_pengirim),
					CONCAT(id_user_pengirim,',',id_user_penerima)) conversation	
					FROM t_message
					GROUP BY conversation
				)a
				JOIN t_message b ON a.id = b.`id_message` 
				JOIN t_student ON(b.`id_user_penerima` = t_student.`id_user`) OR (b.`id_user_pengirim` = t_student.`id_user`)
				JOIN t_user ON(t_user.`id_user` = t_student.`id_user`) OR (t_user.`id_user` = t_student.`id_user`)
				WHERE id_user_pengirim = ? OR id_user_penerima = ?";

			$query = $this->db->query($sql,array($this->session->userdata('id_user'),$this->session->userdata('id_user')));
			
			$data['messages'] = $query->result();
			//$data['messages'] = $this->db->get()->result();
			//var_dump($data['messages']);
			

			$this->load->view('company/view_head');
			$this->load->view('company/view_nav',$nav);
			$this->load->view('company/view_side',$side);
			$this->load->view('company/message/view_message',$data);	
		}
		


	}

	public function hapus($id_pemilik_pesan = NULL,$id_pesan = NULL)
	{	
		var_dump('masuk message hapus');
		var_dump($id_pemilik_pesan);
		var_dump($id_pesan);
	}

}

/* End of file message.php */
/* Location: ./application/controllers/company/message.php */