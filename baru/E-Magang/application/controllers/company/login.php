<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Company_Controller {

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

		if($this->form_validation->run() == TRUE){

			//var_dump(array('email','password'));
			//var_dump($_POST);
			//$user_data = $this->company_m->array_from_post($_POST);
			//var_dump($user_data);
			if($this->company_m->login($_POST)){
				redirect('company/dashboard');
			}else{
				$data['error'] = TRUE;
			}


		}else{

		}

		$this->load->view('company/login/view_login',$data);
	}

}

/* End of file login.php */
/* Location: ./application/controllers/company/login.php */