<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Admin_Controller {

	public function index()
	{
		$data['error'] = FALSE;
		$rules = array(
			'email' => array(
				'field' => 'email',
				'Label' => 'email',
				'rules' => 'trim|required|valid_email|xss_clean'
				),
			'password' => array(
				'field' => 'password',
				'Label' => 'Password',
				'rules' => 'trim|required|xss_clean'
				),
			);
		
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == TRUE)
		{
			if($this->admin_m->login($_POST))
			{
				redirect('admin/dashboard');
			}
			else
			{
				$data['error'] = TRUE;
			}
		}

		$this->load->view('admin/login/view_login',$data);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */