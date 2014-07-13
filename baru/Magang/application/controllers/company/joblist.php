<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Joblist extends Company_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jobsheet_m');
		$this->load->model('joblist_m');
	}

	public $rules = array(
					'nama' => array(
						'field' => 'nama',
						'label' => 'Job List Name',
						'rules' => 'trim|required|xss_clean|min_length[5]|max_length[30]',
						),
					'deskripsi' => array(
						'field' => 'deskripsi',
						'label' => 'Job List Description',
						'rules' => 'trim|required|xss_clean|min_length[5]|max_length[100]',
						)
					);
	/*public function index($id_job_sheet = NULL)
	{
		var_dump('masuk joblist index')	;
		var_dump($id_job_sheet);
	}*/

	public function newjoblist($id_job_sheet = NULL)
	{	
		//var_dump($_FILES);
		if($id_job_sheet != NULL){

			$side['info'] = $this->infocompany;
			$nav['info'] = $this->infocompany;
			$nav['sum_notifikasi'] = $this->notifikasi_m->getUnread();
			$nav['notifikasi'] = $this->notifikasi_m->getSample();
			$this->db->select()->from('t_job_sheet')
						->where('id_job_sheet',mysql_real_escape_string($id_job_sheet));

			$val = count($this->db->get()->row());
			
			if($val > 0){

				$nav['halaman'] = 'jobsheet';
				$data['jobsheets'] = $this->jobsheet_m->getJobSheetdetail($id_job_sheet);
				$format = 'DATE_COOKIE';
				$time = time();
				$data['tanggal'] = substr(standard_date($format,$time),0,18);
				$data['error'] = FALSE;

				$rules = $this->rules;

				
				$this->form_validation->set_rules($rules);

				if($this->form_validation->run() == TRUE ){

					if (!file_exists('./files/company/'.$id_job_sheet)) {
    					mkdir('./files/company/'.$id_job_sheet, 0777, true);
					}	
					$insert = array(
						'id_job_sheet' => $id_job_sheet,
						'head' => $this->input->post('nama'),
						'body' => $this->input->post('deskripsi'),
						'status' => 'Unclaimed'
						);

					if(  $_FILES['file']['name'] != '' ){

						$config['upload_path'] = './files/company/'.$id_job_sheet; 
						$config['allowed_types'] = 'zip|pdf|rar';
						$config['max_size'] = 10000;
						$config['overwrite'] = TRUE;
						$this->load->library('upload', $config);
						
						if($this->upload->do_upload('file') == TRUE ){
							$insert = array(
								'id_job_sheet' => $id_job_sheet,
								'head' => $this->input->post('nama'),
								'body' => $this->input->post('deskripsi'),
								'file_perusahaan' => $this->upload->data()['file_name'],
								'status' => 'Unclaimed'
								);
						}else{
							
						}	
					}
					else{
						//var_dump('tidak');
					}

					if(!$this->joblist_m->saveJoblist($insert)){
						redirect('/company/joblist/newjoblist/'.$id_job_sheet.'?succes_i=false');
					}
					else{
						redirect('/company/jobsheet/'.$id_job_sheet);
					}
				}
				else{

				}

				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/view_newjoblist', $data, FALSE);	

			}else{
				redirect('company/404');
			}
		}
		else{
			redirect('company/404');
		}
		
	}

	public function check($id_job_sheet = NULL,$id_job_list = NULL){
		$nav['sum_notifikasi'] = $this->notifikasi_m->getUnread();
		$nav['notifikasi'] = $this->notifikasi_m->getSample();
		if($id_job_sheet != NULL && $id_job_list != NULL){
			$this->db->select('')->from('t_job_list')
					->join('t_job_sheet', 't_job_list.id_job_sheet = t_job_sheet.id_job_sheet')
					->where('t_job_list.id_job_sheet',$id_job_sheet)
					->where('id_job_list',$id_job_list)
					->where('t_job_list.status','Unclaimed');
					$result = $this->db->get()->row(); 
			$val = count($result);
			
			if($val > 0){
				
				$status = array(
					'status' => 'Finished',
					);

				$this->db->where('id_job_list',$id_job_list)
						->update('t_job_list',$status);
				
				$data['data'] = $result;
				$data['id_job_sheet'] = $id_job_sheet;
				$this->load->view('company/job_sheet/view_joblistcheck',$data);		
			}
			else{
				redirect('company/404');
			}
			

		}
		else{
			redirect('company/404');
		}
		
	}

	public function uncheck($id_job_sheet = NULL,$id_job_list = NULL){

		if($id_job_sheet != NULL && $id_job_list != NULL){
			$this->db->select('')->from('t_job_list')
					->join('t_job_sheet', 't_job_list.id_job_sheet = t_job_sheet.id_job_sheet')
					->where('t_job_list.id_job_sheet',$id_job_sheet)
					->where('id_job_list',$id_job_list)
					->where('t_job_list.status','Finished');
					$result = $this->db->get()->row(); 
			$val = count($result);
			
			if($val > 0){
				
				$status = array(
					'status' => 'Unclaimed',
					);

				$this->db->where('id_job_list',$id_job_list)
						->update('t_job_list',$status);
				
				$data['data'] = $result;
				$data['id_job_sheet'] = $id_job_sheet;
				$this->load->view('company/job_sheet/view_joblistuncheck',$data);		
			}
			else{
				redirect('company/404');
			}
			

		}
		else{
			redirect('company/404');
		}
	}


	public function edit($id_job_sheet = NULL,$id_job_list = NULL)
	{	$nav['sum_notifikasi'] = $this->notifikasi_m->getUnread();
		$nav['notifikasi'] = $this->notifikasi_m->getSample();
		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		if($id_job_sheet != NULL && $id_job_list != NULL){

			$value = $this->joblist_m->getJoblist(mysql_real_escape_string($id_job_sheet),mysql_real_escape_string($id_job_list));
			
			if(count($value) > 0){

				$rules = $this->rules;
				$nav['halaman'] = 'jobsheet';
				$data['jobsheets'] = $this->jobsheet_m->getJobSheetdetail($id_job_sheet);
				$format = 'DATE_COOKIE';
				$time = time();
				$data['error'] = FALSE;
				$data['tanggal'] = substr(standard_date($format,$time),0,18);
				$data['joblist'] = $value;

				$this->form_validation->set_rules($rules);

				if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != "" ){
					$config['upload_path'] = './files/company/'.$id_job_sheet; 
					$config['allowed_types'] = 'zip|pdf|rar';
					$config['max_size'] = 10000;
					$config['overwrite'] = TRUE;
							
					$this->load->library('upload', $config);
					if (!file_exists('./files/company/'.$id_job_sheet)) {
    					mkdir('./files/company/'.$id_job_sheet, 0777, true);
					}	
					if($this->upload->do_upload('file') == TRUE ){
						
						
						if($this->form_validation->run() == TRUE){
							

							$insert = array(
								'head' => $this->input->post('nama'),
								'body' => $this->input->post('deskripsi'),
								'file_perusahaan' => $this->upload->data()['file_name'],
								);
							if($this->joblist_m->saveJoblist($insert,$id_job_list)){
								redirect('company/jobsheet/'.$id_job_sheet);
							}
						}


					}
				}
				else{

					if($this->form_validation->run() == TRUE){

						$insert = array(
							'head' => $this->input->post('nama'),
							'body' => $this->input->post('deskripsi'),
						);

						if($this->joblist_m->saveJoblist($insert,$id_job_list)){
							redirect('company/jobsheet/'.$id_job_sheet);
						}

					}
				}

				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/job_sheet/view_editjoblist', $data);

			}
		}

	}

	public function hapus($id_job_sheet = NULL,$id_job_list = NULL)
	{
		if($id_job_sheet != NULL && $id_job_list != NULL){

			$this->db->select()->from('t_job_list')
							->where('id_job_list',$id_job_list)
							->where('id_job_sheet',$id_job_sheet);
						

			$val = count($this->db->get()->row());

			if($val > 0){
				$this->db->where('id_job_list',$id_job_list)
							->where('id_job_sheet',$id_job_sheet);

				if($this->db->delete('t_job_list')){
					redirect('company/jobsheet/'.$id_job_sheet);
				}else{
					redirect('company/jobsheet/'.$id_job_sheet);
				}
			}
			else{
				redirect('/company/404');
			}

		}
		else{
			redirect('/company/404');
		}

	}


	

}

/* End of file joblist.php */
/* Location: ./application/controllers/company/joblist.php */