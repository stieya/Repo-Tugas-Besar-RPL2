<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Admin_Controller {


	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('admin_m');
	}
	public function index()
	{
		
		$data['info'] = $this->admin_m->getInfo();
		$data['users'] = $this->admin_m->getStudent();
		$akt['aktif'] = 'dashboard';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/user/view_user',$data);
	}

	public function block($id_user = NULL){
		if($id_user != NULL){

			if($this->admin_m->blockStudent($id_user)){
				redirect('admin/user');
			}else{
				redirect('admin/user');
			}

		}
		else{
			redirect('admin/404');
		}
		
	}

	public function unblock($id_user = NULL){

		if($id_user != NULL){

			if($this->admin_m->unblockStudent($id_user)){
				redirect('admin/user');
			}else{
				redirect('admin/user');
			}

		}
		else{
			redirect('admin/404');
		}

	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */