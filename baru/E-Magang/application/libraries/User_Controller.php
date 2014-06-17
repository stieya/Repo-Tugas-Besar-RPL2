<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_Controller extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->data['zakky'] = 'zakky';
	}

}

/* End of file User_Controller.php */
/* Location: ./application/libraries/User_Controller.php */