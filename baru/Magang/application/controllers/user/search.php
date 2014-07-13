<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends User_Controller {

	public function index($id_kota = NULL,$id_jenis = 'perusahaan',$string = NULL)
	{

		$data['company'] = $this->user_m->get_company();
		$akt['aktif'] = 'company';
		$akt['notif'] = $this->user_m->get_notif();
		$akt['pesan'] = $this->user_m->listPesan();
		$jenis = 'pekerjaan';
		$kota = 0;
		$cari = '';

		$data['jenis'] = "perusahaan";
		
		$data['string']	= "";
		$data['listkota'] = $this->user_m->get_kota();
		

		if($id_kota != NULL){
			$data['kota'] = $id_kota;
			$kota = $id_kota;
		}

		if($id_jenis != NULL || $id_jenis != 'none'){

			$data['jenis'] = $id_jenis;
			$jenis = $id_jenis;

		}

		if($string != '' || $string != NULL){

			$data['string'] = str_replace('%20', ' ', $string);
			$cari = $string;

		}

		if($jenis != 'pekerjaan' && $jenis !='perusahaan'){
			$jenis = 'perusahaan';
			$data['jenis'] = 'perusahaan';
		}

		if($kota == NULL && $jenis == 'perusahaan' && $string == NULL){

			$data['search'] = $this->user_m->cari();	

		}
		elseif($kota != NULL && $jenis == 'perusahaan' && $string == NULL){

			$data['search'] = $this->user_m->cari($id_kota,$jenis);	

		}
		elseif($kota != NULL && $jenis == 'perusahaan' && $string != NULL){
		

			$data['search'] = $this->user_m->cari($id_kota,$jenis,$string);			

		}
		elseif($kota != NULL && $jenis == 'pekerjaan' && $string == NULL){
		

			$data['search'] = $this->user_m->cari($id_kota,$jenis);	
			//var_dump($data['search']);		

		}
		elseif($kota != NULL && $jenis == 'pekerjaan' && $string != NULL){
		

			$data['search'] = $this->user_m->cari($id_kota,$jenis,$string);			

		}

		//var_dump($kota);
		//var_dump($jenis);
		//var_dump($cari);
		$this->load->view('user/view_head');
		$this->load->view('user/view_nav',$akt);
		$this->load->view('user/view_side');
		if(count($data['search']) > 0 ){

			$this->load->view('user/search/view_search',$data);	
		}
		else{
			$this->load->view('user/search/view_searchnotfound',$data);	
		}
		
		
			//var_dump($data['search']);
			
		
		



		
	}

	/*public function by(){

		var_dump('asdasdsa');
		var_dump($this->uri->segment(3));
		var_dump($this->uri->segment(4));
		var_dump($this->uri->segment(5));

	}*/

}

/* End of file search.php */
/* Location: ./application/controllers/user/search.php */