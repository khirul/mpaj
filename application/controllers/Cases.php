<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('current_user')) {
			redirect(base_url(),'refresh');
		}
	}

	public function index()
	{
		$mysql = $this->load->database('default', true);
		if ($this->session->userdata('current_user')->role == 'undang-undang' || $this->session->userdata('current_user')->role == 'super_admin') {
			$mysql->where('user_id', $this->session->userdata('current_user')->user_id);
			$mysql->order_by('case_id', 'desc');
		}
		$cases = $mysql->get('cases');
		$data = [
			'cases' => $cases,
			'content' => 'cases/index'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function new_case(){
		if ($this->input->get('search') != null) {
			$oracle = $this->load->database('oracle', true);
			$oracle->like('IND_AKAUN', strtoupper($this->input->get('search')), 'BOTH');
			$results = $oracle->get('data-kmkhmh');
			$data = [
				'results' => $results,
				'content'=>'cases/new_case',
			];
		}else{
			$data = [
				'results' => [],
				'content'=>'cases/new_case',
			];
		}

		// var_dump($data['results']);
		// die();
		$this->load->view('layouts/admin', $data, FALSE);
	}

}

/* End of file Cases.php */
/* Location: ./application/controllers/Cases.php */