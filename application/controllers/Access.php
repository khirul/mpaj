<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Access extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function register(){
		$this->load->library('form_validation');
		$mysql = $this->load->database('default', true);
		$data = [
			'content' => 'access/register',
			'roles' => $mysql->get('roles')
		];

		$this->load->view('layouts/master', $data, FALSE);
	}

	public function post_register(){

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
			$this->register();
		} else {
			$mysql->where('username', $this->input->post('username'));
			$query = $mysql->get('users');

			
			if ($query->num_rows() > 0) {
				$this->session->set_flashdata('unique', 'Id ini telah didaftarkan. Sila pilih Id yang lain');
				$this->register();
			}else{
				$mysql = $this->load->database('default', TRUE);

				
				$object = [
					'username' => $this->input->post('username'),
					'password' => hash('sha256', $this->input->post('password')),
					'name' => $this->input->post('name'),
					'alamat' => $this->input->post('alamat'),
					'position' => $this->input->post('position'),
					'role' => $this->input->post('role')

				];

				$mysql->insert('users', $object);
				redirect(base_url(),'refresh');
			}
				
		}
	}


	public function attempt_login(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required', [
			'required' => 'Id pengguna adalah mandatori'
			]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Kata laluan adalah mandatori'
			]);
	

	if ($this->form_validation->run() == FALSE) {
			$data = [
				'content' => 'main/index'
			];
			$this->load->view('layouts/master', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$mysql_db = $this->load->database('default', TRUE);
			$mysql_db->where('username', $username);
			$mysql_db->where('password', hash('sha256', $password));

			$query = $mysql_db->get('users');

			if ($query->num_rows()== 1){
				$user = $query->row();
				if ($user->active == false) {
					$this->session->set_flashdata('danger', 'Akaun anda tidak aktif. Sila hubungi super admin');
					$data = [
						'content' => 'main/index',
						'danger' => $this->session->flashdata('danger')
					];
					$this->load->view('layouts/master', $data);
				}else{
					$array = [
						'current_user' => $query->row()
					];
					$this->session->set_userdata($array);
					redirect('admin/index','refresh');
				}
				
			}
			else{
				$this->session->set_flashdata('danger', 'Username and password do not match!');
				$data = [
					'content' => 'main/index',
					'danger' => $this->session->flashdata('danger')
				];
				$this->load->view('layouts/master', $data);
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}

/* End of file Access.php */
/* Location: ./application/controllers/Access.php */