<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends User_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index($id_company = NULL,$id_jobsheet = 0,$hal = NULL)
	{
		if($id_company == NULL && $id_jobsheet == 0)
		{
			$data['company'] = $this->user_m->get_company();
			$akt['aktif'] = 'company';
			$akt['notif'] = $this->user_m->get_notif();
			$akt['pesan'] = $this->user_m->listPesan();
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/company/view_company',$data);
		
		}
		else if($id_company != NULL && $id_jobsheet == 0)
		{
			$data['ph'] = $this->user_m->get_jobsheet($id_company,$id_jobsheet,$hal);
			$akt['aktif'] = 'company';
			$akt['notif'] = $this->user_m->get_notif();
			$akt['pesan'] = $this->user_m->listPesan();
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/company/view_jobsheet',$data);
			
		}
		else if($id_company != NULL && $id_jobsheet != 0)
		{
			$data['ph'] = $this->user_m->get_jobsheet($id_company,$id_jobsheet);
			$akt['aktif'] = 'company';
			$akt['notif'] = $this->user_m->get_notif();
			$akt['pesan'] = $this->user_m->listPesan();
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/company/view_desjobsheet',$data);
		}
		
	}

	
	public function upload($id_company,$id_jobsheet)
	{
		if (!file_exists('./files/student/'.$this->session->userdata['id_student']))
		{
    		mkdir('./files/student/'.$this->session->userdata['id_student'], 0777, true);
		}	

		$config['upload_path'] = 'files/student/'.$this->session->userdata['id_student'];
		$config['allowed_types'] = 'pdf|zip|rar';
		$config['max_size']	= '2048';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			redirect('user/company/'.$id_company.'/'.$id_jobsheet);	
		}
		else
		{	
			$data = array('upload_data' => $this->upload->data());
			$file = $data['upload_data']['file_name'];
			$this->user_m->upload_app($file,$id_jobsheet);
			
			redirect('user/company/'.$id_company.'/'.$id_jobsheet);	
		}
	}


}

/* End of file company.php */
/* Location: ./application/controllers/user/company.php */