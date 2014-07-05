<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet extends User_Controller {

	public function index()
	{
		$akt['aktif'] = 'jobsheet';
		$akt['pesan'] = $this->user_m->listPesan();
		$data['jobsheet'] = $this->user_m->jobsheet();
		$this->load->view('user/view_head');
		$this->load->view('user/view_nav',$akt);
		$this->load->view('user/view_side');
		$this->load->view('user/jobsheet/view_jobsheet',$data);
	}

	public function detail($id_jobsheet = NULL, $id_joblist = NULL)
	{
		if ($id_joblist == NULL) 
		{
			$akt['aktif'] = 'jobsheet';
			$akt['pesan'] = $this->user_m->listPesan();
			$data['js'] = $this->user_m->detail_jobsheet($id_jobsheet);
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/jobsheet/view_jobsheet_detail',$data);
		}
		else
		{
			$akt['aktif'] = 'jobsheet';
			$akt['pesan'] = $this->user_m->listPesan();
			$data['comment'] = $this->user_m->comment_joblist($id_jobsheet,$id_joblist);
			$this->load->view('user/view_head');
			$this->load->view('user/view_nav',$akt);
			$this->load->view('user/view_side');
			$this->load->view('user/jobsheet/view_comment',$data);
		}
	}

	public function komen($id_jobsheet,$id_joblist)
	{
		$this->user_m->komentar($id_joblist);
		redirect('user/jobsheet/detail/'.$id_jobsheet.'/'.$id_joblist);
	}

	public function upload($id_jobsheet,$id_joblist,$id_student_joblist,$hal)
	{
		if ($id_joblist == 0) 
		{
			$id_joblist = NULL;
		}

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
			if ($hal == "detail")
			{
				redirect('user/jobsheet/detail/'.$id_jobsheet);
			}
			else
			{
				redirect('user/jobsheet/detail/'.$id_jobsheet.'/'.$id_joblist);
			}
		}
		else
		{	
			$data = array('upload_data' => $this->upload->data());
			$file = $data['upload_data']['file_name'];
			$this->user_m->upload($file,$id_joblist,$id_student_joblist,$id_jobsheet,$hal);
			if ($hal == "detail")
			{
				redirect('user/jobsheet/detail/'.$id_jobsheet);
			}
			else
			{
				redirect('user/jobsheet/detail/'.$id_jobsheet.'/'.$id_joblist);
			}
		}
	}

}

/* End of file jobsheet.php */
/* Location: ./application/controllers/user/jobsheet.php */