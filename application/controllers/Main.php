<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('current_user')) {
			redirect('admin','refresh');
		}

		
	}

	public function index()
	{	
		$this->load->library('form_validation');
		$data = [
			'content' => 'main/index'
		];
		$this->load->view('layouts/master', $data, FALSE);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */