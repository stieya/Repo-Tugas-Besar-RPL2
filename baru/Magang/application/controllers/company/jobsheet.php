<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobsheet extends Company_Controller {

		public $rules = array(
			'nama' => array(
				'field' => 'nama',
				'label' => 'Job Sheet Name',
				'rules' => 'trim|required|min_length[10]|max_length[100]|xss_clean'
				),
			'deskripsi' => array(
				'field' => 'deskripsi',
				'label' => 'Job Sheet Description',
				'rules' => 'trim|required|min_length[10]|max_length[200]|xss_clean'
				),
			'bidang' => array(
				'field' => 'bidang',
				'label' => 'Department',
				'rules' => 'trim|required|xss_clean'
				),
			'durasi' => array(
				'field' => 'durasi',
				'label' => 'Duration',
				'rules' => 'trim|required|xss_clean',
				),
			);

		public $comment_rules = array(
			'comment' => array(
				'field' => 'comment',
				'label' => 'Comment',
				'rules' => 'trim|required|min_length[5]|max_length[100]|xss_clean'
				),
			);

		public $eval_rules = array(
			'disiplin' => array(
				'field' => 'disiplin',
				'label' => 'Discipline Meter',
				'rules' => 'trim|required|xss_clean'
				),
			'rajin' => array(
				'field' => 'rajin',
				'label' => 'Diligent Meter',
				'rules' => 'trim|required|xss_clean'
				),
			'komunikasi' => array(
				'field' => 'komunikasi',
				'label' => 'Communication Skill',
				'rules' => 'trim|required|xss_clean'
				),
			'tanggap' => array(
				'field' => 'tanggap',
				'label' => 'Perceptive',
				'rules' => 'trim|required|xss_clean'
				),
			'cermat' => array(
				'field' => 'cermat',
				'label' => 'Carefully Skill',
				'rules' => 'trim|required|xss_clean'
				),
			);

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jobsheet_m');
		$this->load->helper('file');
		//$this->load->helper('date');
	}

	public function index($id_job_sheet = NULL,$id_job_list = NULL)
	{	

		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		if($id_job_sheet == NULL && $id_job_list == NULL){

			$nav['halaman'] = 'jobsheetlist';
			$data['jobsheets'] = $this->jobsheet_m->getJobSheet();
			$format = 'DATE_COOKIE';
			$time = time();
			$data['tanggal'] = substr(standard_date($format,$time),0,18);
			$this->load->view('company/view_head');
			$this->load->view('company/view_nav',$nav);
			$this->load->view('company/view_side',$side);
			$this->load->view('company/job_sheet/view_jobsheetlist',$data);


		}
		elseif($id_job_sheet != NULL && $id_job_list == NULL){
			
			$this->db->select()->from('t_job_sheet')
								->where('id_job_sheet',$id_job_sheet);
			$val = count($this->db->get()->row());
			if($val > 0){
				$data['application'] = $this->jobsheet_m->getJobSheetapp($id_job_sheet);
				$nav['halaman'] = 'jobsheet';
				$data['jobsheets'] = $this->jobsheet_m->getJobSheetdetail($id_job_sheet);
				$format = 'DATE_COOKIE';
				$time = time();
				$data['tanggal'] = substr(standard_date($format,$time),0,18);
				//$data['applicator'] = $this>jobsheet_m->getJobSheetapp($id_job_sheet);
				$data['pekerja'] = $this->jobsheet_m->employe($id_job_sheet);
				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/job_sheet/view_jobsheetdetail', $data, FALSE);	
			}else{
				redirect('company/404');
			}
		}
		elseif ($id_job_sheet != NULL && $id_job_list != NULL) {
			$this->db->select()->from('t_job_list')
							->where('id_job_list',$id_job_list)
							->where('id_job_sheet',$id_job_sheet);
			$job_list = $this->db->get()->row(); 

			$val = count($job_list);
			if($val > 0){
				$this->load->model('comment_m');
				$nav['halaman'] = 'jobsheet';
				$data['jobsheets'] = $this->jobsheet_m->getJobSheetdetail($id_job_sheet);		
				$data['applicator'] = $this->jobsheet_m->getJobSheetapp($id_job_list);
				//var_dump($data['jobsheets']);
				$data['job_list'] = $job_list;
				$data['chat'] = $nav['info'];
				$data['pekerja'] = $this->jobsheet_m->getJoblistDetail($id_job_sheet,$id_job_list);
				//var_dump($data['pekerja']->studentjoblist);
				//var_dump($data['jobsheets']);
				
				$this->form_validation->set_rules($this->comment_rules);
				
				if( $this->form_validation->run() == TRUE){
					if($this->comment_m->saveJoblistComment($id_job_list,$this->input->post('comment'))){

					}
				}
				else{

					
					
				}
				$data['comments'] = $this->comment_m->getJoblistComment($id_job_list);
				//var_dump($data['comments']);
				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/job_sheet/view_joblistdetail', $data, FALSE);
			}
			else{
				redirect('company/404');
			}
			
		}
		
	}

	public function newjobsheet()
	{	
		$nav['halaman'] = 'JobSheet';
		$data['tanggal'] = date('Y:M:D');
		$data['error'] = FALSE;
		$side['info'] = $this->infocompany;
		$nav['info'] = $this->infocompany;
		
		$this->form_validation->set_rules($this->rules);
		//var_dump($this->input->post());

		if($this->form_validation->run() == TRUE){
			$insert_id = $this->jobsheet_m->saveJob();

			if(!is_nan($insert_id)){
				redirect('company/jobsheet/'.$insert_id);
			}else{
				$data['error'] = TRUE;
			}
		}else{
		}

		$this->db->select()->from('t_jurusan');
		$result = $this->db->get()->result();

		$data['jurusan'] = $result;
		$this->load->view('company/view_head');
		$this->load->view('company/view_nav',$nav);
		$this->load->view('company/view_side',$side);
		$this->load->view('company/job_sheet/view_newjobsheet',$data);
	}

	public function edit($id_job_sheet = NULL)
	{
		if($id_job_sheet != NULL){
			$side['info'] = $this->infocompany;
			$nav['info'] = $this->infocompany;
			$query = $this->db->query('SELECT * FROM t_job_sheet WHERE id_job_sheet = ?',$id_job_sheet);
			$val = $query->num_rows();

			if($val > 0){
				$this->db->select()->from('t_jurusan');
				$result = $this->db->get()->result();
				$nav['halaman']='jobsheet';
				$data['error'] = FALSE;
				$data['jobsheets'] = $this->jobsheet_m->getJobSheet();
				$format = 'DATE_COOKIE';
				$time = time();
				$jobsheet = $this->jobsheet_m->getJobSheetdetail($id_job_sheet);

				$data['jobsheet'] = $jobsheet->jobsheetdetail;
				$data['tanggal'] = substr(standard_date($format,$time),0,18);
				$data['jurusan'] = $result;

				$this->form_validation->set_rules($this->rules);

				if($this->form_validation->run() == TRUE){

					$data = array(
						'nama_job_sheet' => $this->input->post('nama'),
						'deskripsi_job_sheet' => $this->input->post('deskripsi'),
						'durasi' => $this->input->post('durasi'),
						);
					$this->jobsheet_m->save($data,$id_job_sheet);

					redirect('company/jobsheet');

				}

				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/job_sheet/view_editjobsheet',$data);		
			}
			else{
				redirect('company/404');
			}
			
		}
		else{
			redirect('company/404');
		}
		
	}


	public function accept($id_job_sheet = NULL ,$id_student = NULL){
		
		if($id_student != NULL && $id_student != NULL){

			$this->db->select()->from('t_job_sheet_application')
				->where('id_job_sheet',$id_job_sheet)
				->where('id_student',$id_student)
				->where('status',0);
			if(count($this->db->get()->result()) > 0){

				$this->db->select()->from('t_job_sheet_application')
				->where('id_job_sheet',$id_job_sheet)
				->where('id_student',$id_student)
				->where('status',1);

				if(count($this->db->get()->result()) > 0){
					var_dump('sudah dikerjakan oleh orang lain');
				}
				else{

					$data = array(
						'status' => 1,
						);

					$this->db->set($data);
					$this->db->where('id_job_sheet',$id_job_sheet)
								->where('id_student',$id_student);
					if($this->db->update('t_job_sheet_application')){
						$data = array(
							'id_student' => $id_student,
							'id_job_sheet' => $id_job_sheet,
							'waktu_start' => unix_to_human(now(),TRUE,'eu'),
							'status' => 1,
							);	
						if($this->db->insert('t_student_job_sheet',$data)){
							$data = array(
								'status' => 'Ongoing',
								);

							$this->db->where('id_job_sheet',$id_job_sheet);
							$this->db->set($data);
							if($this->db->update('t_job_sheet')){
								$data['id_job_sheet'] = $id_job_sheet;
								$this->load->view('company/job_sheet/view_acceptemploye',$data);
							}
						}
					}

				}
				

			}
			else{
				redirect('company/404');
			}
		}
		else{
			redirect('company/404');
		}

	}

	public function hapus($id_job_sheet = NULL)
	{
		if($id_job_sheet!=NULL){

			if ($this->jobsheet_m->delete($id_job_sheet)) {
				$this->db->where('id_job_sheet',$id_job_sheet);
				$this->db->delete('t_job_list');

				$this->db->select()->from('t_job_sheet')
					->join('t_job_sheet_application','t_job_sheet_application.id_job_sheet = t_job_sheet.id_job_sheet');

				$val = count($this->db->get()->result());

				if($val > 0){
					$this->db->where('id_job_sheet',$id_job_sheet);
					$this->db->delete('t_job_sheet_application');
				}

				if(file_exists('./files/company/'.$id_job_sheet)){
					delete_files('./files/company/'.$id_job_sheet,TRUE);	
				}
				
				redirect('company/jobsheet?succes_h=TRUE');
			}
			else{
				redirect('company/jobsheet?succes_h=FALSE');
			}
		}else{
			redirect('company/404');
		}
	}


	public function finish($id_job_sheet = NULL){
		$this->db->select()->from('t_student_job_sheet')
						->join('t_student','t_student_job_sheet.id_student = t_student.id_student')
						->join('t_user','t_user.id_user = t_student.id_user')
						->where('id_job_sheet',$id_job_sheet);
		$result = $this->db->get()->row();
		if(count($result) > 0){
			$data['employe'] = $result;
			$nav['halaman'] = 'jobsheet';
			$side['info'] = $this->infocompany;
			$nav['info'] = $this->infocompany;
			$query = $this->db->query('SELECT * FROM t_job_sheet WHERE id_job_sheet = ?',$id_job_sheet);
			$val = $query->num_rows();
			
			$this->form_validation->set_rules($this->eval_rules);
			if($this->form_validation->run() == TRUE ){
				$data = array(
					'id_user' => $result->id_user,
					'disiplin' => $this->input->post('disiplin'),
					'tanggap' => $this->input->post('tanggap'),
					'cermat' => $this->input->post('cermat'),
					'rajin' => $this->input->post('rajin'),
					'komunikasi' => $this->input->post('komunikasi'),
					);
				

				if($this->jobsheet_m->finishJobSheet($data,$id_job_sheet)){
					$this->db->select()->from('t_job_sheet')->where('id_job_sheet',$id_job_sheet);
					$data['data'] = $this->db->get()->row();
					//$this->load->view('company/view_head');
					//$this->load->view('company/view_nav',$nav);
					//$this->load->view('company/view_side',$side);
					$this->load->view('company/job_sheet/view_finishjobsheet',$data);
				}

			}
			else{

				$this->load->view('company/view_head');
				$this->load->view('company/view_nav',$nav);
				$this->load->view('company/view_side',$side);
				$this->load->view('company/job_sheet/view_jobsheetevaluation',$data);		
				
			}
		}
		else{
			redirect('company/404');
		}
		

		
	}


}

/* End of file jobsheet.php */
/* Location: ./application/controllers/company/jobsheet.php */