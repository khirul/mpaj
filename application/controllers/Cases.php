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
		if ($this->session->userdata('current_user')->role != 'undang-undang' && $this->session->userdata('current_user')->role != 'super_admin') {
			
			
			$mysql->where('user_id', $this->session->userdata('current_user')->user_id);
			$mysql->order_by('case_id', 'desc');
		
		}
		if ($this->session->userdata('current_user')->role == 'undang-undang') {
				$mysql->where('case_submit', true);
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
			$mysql = $this->load->database('default', true);
			$existed = $mysql->get('cases');
			$data = [
				'existed' => $existed,
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

	public function hantar(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('case_id', $this->input->get('id'));
		$object = [
			'case_status' => 'submited',
			'case_note' => 'Tindakan oleh Jabatan Undang-undang',
			'case_submit' => true
		];
		$mysql->update('cases', $object);
	}

	public function tindakan(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('case_id', $this->input->get('id'))->get('cases');
		$data = [
			'case'=>$case->row(),
			'content'=>'cases/tindakan',
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function tindakan_process(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('case_id', $this->input->get('id'));

		$object = [
			'case_status' => $this->input->post('tindakan'),
			'case_note' => $this->input->post('content'),
		];
		$mysql->update('cases', $object);
		
	}

}

/* End of file Cases.php */
/* Location: ./application/controllers/Cases.php */