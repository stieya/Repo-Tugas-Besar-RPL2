<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends Admin_Controller {

	public function index()
	{
		
		$data['info'] = $this->admin_m->getInfo();
		$data['users'] = $this->admin_m->getCompany();
		$akt['aktif'] = 'dashboard';
		$this->load->view('admin/view_head');
		$this->load->view('admin/view_nav',$akt);
		$this->load->view('admin/view_side');
		$this->load->view('admin/company/view_company',$data);
	}

	public function block($id_user = NULL){
		if($id_user != NULL){

			if($this->admin_m->blockStudent($id_user)){
				redirect('admin/company');
			}else{
				redirect('admin/company');
			}

		}
		else{
			redirect('admin/404');
		}
		
	}

	public function unblock($id_user = NULL){

		if($id_user != NULL){

			if($this->admin_m->unblockStudent($id_user)){
				redirect('admin/company');
			}else{
				redirect('admin/company');
			}

		}
		else{
			redirect('admin/404');
		}

	}

}

/* End of file company.php */
/* Location: ./application/controllers/admin/company.php */