<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
		$mysql->where('active', false);
		$inactive = $mysql->get('users');
		$data = [
			'content' => 'admin/index',
			'inactive' => $inactive
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function users(){
		if ($this->session->userdata('current_user')->role != 'super_admin') {
			redirect('admin','refresh');
		}

		$mysql = $this->load->database('default', true);		
		$mysql->where('active', false);
		$inactive = $mysql->join('roles', 'roles.role_name = users.role')->get('users');

		$mysql->where('active', true);
		$active = $mysql->join('roles', 'roles.role_name = users.role')->get('users');


		$data = [

			'content' => 'admin/users',
			'inactive' => $inactive,
			'active' => $active
		];

		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function update_user(){


		$mysql = $this->load->database('default', true);
		$mysql->where('user_id', $this->uri->segment(3));
		$q = $mysql->get('users')->row();
		if ($q->active == true) {
			$active = false;
		}else{
			$active = true;
		}

		$mysql->where('user_id', $this->uri->segment(3));
		$object = [
			'active' => $active
		];
		$mysql->update('users', $object);
		redirect(base_url('admin/users'),'refresh');
	}

	public function new_admin(){

		$this->load->library('form_validation');
		$mysql = $this->load->database('default', true);
		$data = [
			'content' => 'admin/new_admin',
			'roles' => $mysql->get('roles')
		];

		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function post_new(){
		
		$mysql = $this->load->database('default', TRUE);
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required', [			
			'required' => 'Id Pengguna wajib diisi'			
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [			
			'required' => 'Kata Laluan wajib diisi'			
		]);
		$this->form_validation->set_rules('username', 'Username', 'trim|required', [			
			'required' => 'Sila isi nama penuh anda'			
		]);
		$this->form_validation->set_rules('role', 'Role', 'trim|required', [			
			'required' => 'Sila isi jabatan anda bertugas'			
		]);
		$this->form_validation->set_rules('position', 'Position', 'trim|required', [			
			'required' => 'Sila isi jawatan anda'			
		]);


		

		if ($this->form_validation->run() == FALSE) {
			$this->new_admin();
		} else {
			
			$mysql->where('username', $this->input->post('username'));
			$query = $mysql->get('users');
			
			if ($query->num_rows()>0) {

				$this->session->set_flashdata('unique', 'Id ini telah didaftarkan. Sila pilih Id yang lain');
				$this->new_admin();
			}else{
				$mysql = $this->load->database('default', TRUE);

				if ($this->session->userdata('current_user')->role == 'super_admin') {
					$active = true;
				}else{
					$active = false;
				}
				
				$object = [
					'username' => $this->input->post('username'),
					'password' => hash('sha256', $this->input->post('password')),
					'name' => $this->input->post('name'),
					'alamat' => $this->input->post('alamat'),
					'position' => $this->input->post('position'),
					'role' => $this->input->post('role'),
					'active' => $active

				];

				$mysql->insert('users', $object);
				redirect(base_url('admin'),'refresh');
			}
				
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */