<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Case_details extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('current_user')) {
			redirect(base_url(),'refresh');
		}
	}

	public function index()
	{
		$oracle = $this->load->database('oracle', true);
		$oracle->where('IND_AKAUN',$this->input->get('account'));
		$res = $oracle->get('data-kmkhmh')->row();
		

		$mysql = $this->load->database('default', true);
		$mysql->where('ind_akaun', $this->input->get('account') );
		$case = $mysql->get('cases');
		$kp = $mysql->get('kp');
 		
		$mysql->where('case_id', $case->row()->case_id);
		$saman = $mysql->get('saman');

		$mysql->where('case_id', $case->row()->case_id);
		$kr = $mysql->get('kr');

		if ($case->num_rows() < 1) {
			
			$value = [
			'user_id' => $this->session->userdata('current_user')->user_id,
			'ind_modin' => $res->IND_MODIN,
			'ind_akaun' => $res->IND_AKAUN,
			'ind_bkaun' => $res->IND_BKAUN,
			'ind_oldac' => $res->IND_OLDAC,
			'ind_plgid' => $res->IND_PLGID,
			'ind_pnama' => $res->IND_PNAMA,
			'ind_almt1' => $res->IND_ALMT1,
			'ind_almt2' => $res->IND_ALMT2,
			'ind_almt3' => $res->IND_ALMT3,
			'ind_almt4' => $res->IND_ALMT4,
			'ind_almt5' => $res->IND_ALMT5,
			'ind_itkod' => $res->IND_ITKOD,
			'ind_kslah' => $res->IND_KSLAH,
			'ind_trikh' => $res->IND_TRIKH,
			'ind_amaun' => $res->IND_AMAUN,
			'ind_ckjln' => $res->IND_CKJLN,
			'ind_nocar' => $res->IND_NOCAR,
			'ind_bayar' => $res->IND_BAYAR,
			'ind_nores' => $res->IND_NORES,
			'ind_tkbay' => $res->IND_TKBAY,
			'ind_statf' => $res->IND_STATF,
			'case_status' => 'pending',

		];
			$mysql->insert('cases', $value);
			$this->index();
		}

		
		
		$data = [
			
			'content' => 'case_details/index',
			'case' => $case->row(),
			'summon' => $saman->row(),
			'kp' => $kp->row(),
			'kr' =>$kr->row()
		];

		$this->load->view('layouts/admin', $data);

	}

	public function summon_form(){
		$this->load->library('form_validation');

		$mysql = $this->load->database('default', true);		
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$check = $mysql->where('case_id', $case->row()->case_id)->get('saman');
		if ($check->num_rows() > 0) {
			$res = $check->row();
		}else{
			$res = null;
		}

		$data = [
			'case' => $case->row(),
			'saman' => $res,
 			'content' => 'case_details/summon_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function form_process(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('mahkamah', 'Mahkamah', 'trim|required', [
			'required' => 'Ruang mahkamah wajib diisi'
		]);
		// $this->form_validation->set_rules('tarikh_hadir', 'Tarikh hadir', 'trim|required', [
		// 	'required' => 'Tarikh hadir wajib diisi'
		// ]);
		// $this->form_validation->set_rules('tarikh_saman', 'Tarikh saman', 'trim|required', [
		// 	'required' => 'Tarikh saman dikeluarkan wajib diisi'
		// ]);
	
		if ($this->form_validation->run()==FALSE) {
			$this->summon_form();
		}else{

			$mysql = $this->load->database('default', true);	
			$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

			if ($this->input->post('submit')) {
				$status = 'lengkap';
			}else{
				$status = 'draf';
			}

			$object = [
				'case_id' => $case->row()->case_id,
				'user_id' => $this->session->userdata('current_user')->user_id,
				'mahkamah' => $this->input->post('mahkamah'),
				// 'tarikh_hadir' => $this->input->post('tarikh_hadir'),
				// 'tarikh_saman' => $this->input->post('tarikh_saman'),
				'saman_status' => $status
 			];

 			$check = $mysql->where('case_id', $case->row()->case_id)->get('saman');
 			if ($check->num_rows() > 0) {
 				$mysql->update('saman', $object);
 			}else{
 				$mysql->insert('saman', $object);
 			}
 			$this->index();
		}
	}

	public function summon_view(){
		$mysql = $this->load->database('default', true);	
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$saman = $mysql->where('case_id', $case->row()->case_id)->get('saman');

		$data = [
			'saman' => $saman->row(),
			'case' => $case->row(),
			'content' => 'case_details/summon_view'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function summon_print(){
		$mysql = $this->load->database('default', true);	
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$saman = $mysql->where('case_id', $case->row()->case_id)->get('saman');

		$data = [
			'saman' => $saman->row(),
			'case' => $case->row(),
			'content' => 'case_details/summon_print'
		];
		$this->load->view('case_details/summon_print', $data, FALSE);
	}

	public function kp_form(){
		$this->load->library('form_validation');

		$mysql = $this->load->database('default', true);	
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$saman = $mysql->where('case_id', $case->row()->case_id)->get('saman');
		$check = $mysql->where('case_id', $case->row()->case_id)->get('kp');
 			if ($check->num_rows() > 0) {
 				$exist = $check;
 				$kp = $check->row();
 			}else{
 				$kp = null;
 				$exist =  ["num_rows"];
 			}

		$data = [
			'saman' => $saman->row(),
			'case' => $case->row(),
			'kp' => $kp,
			'check' => $check,
			'content' => 'case_details/kp_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function kp_process(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('kp_ind_kslah', 'kesalahan', 'trim|required', [
			'required' => 'Ruang kesalahan wajib diisi'
		]);
		$this->form_validation->set_rules('kp_pegawai', 'pegawai', 'trim|required', [
			'required' => 'Ruang nama pegawai wajib diisi'
		]);
		// $this->form_validation->set_rules('tarikh_hadir', 'Tarikh hadir', 'trim|required', [
		// 	'required' => 'Tarikh hadir wajib diisi'
		// ]);
		// $this->form_validation->set_rules('tarikh_saman', 'Tarikh saman', 'trim|required', [
		// 	'required' => 'Tarikh saman dikeluarkan wajib diisi'
		// ]);
	
		if ($this->form_validation->run()==FALSE) {
			$this->kp_form();
		}else{

			$mysql = $this->load->database('default', true);	
			$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

			if ($this->input->post('submit')) {
				$status = 'lengkap';
			}else{
				$status = 'draf';
			}

			$object = [
				'case_id' => $case->row()->case_id,
				'user_id' => $this->session->userdata('current_user')->user_id,
				'kp_ind_kslah' => $this->input->post('kp_ind_kslah'),
				'kp_pegawai' => $this->input->post('kp_pegawai'),
				'kp_add1' => $this->input->post('kp_add1'),
				'kp_add2' => $this->input->post('kp_add2'),
				'kp_add3' => $this->input->post('kp_add3'),
				'kp_add4' => $this->input->post('kp_add4'),
				'kp_add5' => $this->input->post('kp_add5'),
				'kp_psalah_id' => $this->input->post('kp_psalah_id'),
				'kp_nama' => $this->input->post('kp_nama'),
				// 'tarikh_saman' => $this->input->post('tarikh_saman'),
				'kp_status' => $status
 			];

 			$check = $mysql->where('case_id', $case->row()->case_id)->get('kp');
 			if ($check->num_rows() > 0) {
 				$mysql->update('kp', $object);
 			}else{
 				$mysql->insert('kp', $object);
 			}
 			$this->index();
		}
	}

	public function kp_print(){
		$mysql = $this->load->database('default', true);	
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$saman = $mysql->where('case_id', $case->row()->case_id)->get('saman');
		$kp = $mysql->where('case_id', $case->row()->case_id)->get('kp');

		$data = [
			'saman' 	=> $saman->row(),
			'case' 		=> $case->row(),
			'kp' 		=> $kp->row(),
			'content' 	=> 'case_details/kp_print'
		];
		$this->load->view('case_details/kp_print', $data, FALSE);
	}

	public function aduan_print(){
		$mysql = $this->load->database('default', true);	
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		//$saman = $mysql->where('case_id', $case->row()->case_id)->get('saman');
		//$kp = $mysql->where('case_id', $case->row()->case_id)->get('kp');
		$adu = $mysql->where('case_id', $case->row()->case_id)->get('adu');
		//$role = $mysql->where('role_name', $this->session->userdata('current_user')->role)->get('roles');

		$data = [
		//	'saman' 	=> $saman->row(),
			'case' 		=> $case->row(),
			'adu' 		=> $adu->row(),
		//	'role' 		=> $role->row(),
			
		];
		$this->load->view('case_details/aduan_print', $data, FALSE);
	}

	public function aduan_form(){
		$this->load->library('form_validation');

		$mysql = $this->load->database('default', true);	
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$saman = $mysql->where('case_id', $case->row()->case_id)->get('saman');
		$check = $mysql->where('case_id', $case->row()->case_id)->get('adu');
		$role = $mysql->where('role_name', $this->session->userdata('current_user')->role)->get('roles');
 			if ($check->num_rows() > 0) {
 				$exist = $check;
 				$adu = $check->row();
 			}else{
 				$adu = null;
 				$exist =  ["num_rows"];
 			}

		$data = [
			'saman' => $saman->row(),
			'case' => $case->row(),
			'adu' => $adu,
			'check' => $check,
			'role' => $role->row(),
			'content' => 'case_details/aduan_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}

	public function aduan_process(){

		$this->load->library('form_validation');
		$this->form_validation->set_rules('adu_kslah', 'kesalahan', 'trim|required', [
			'required' => 'Ruang kesalahan wajib diisi'
		]);
		$this->form_validation->set_rules('adu_pegawai', 'pegawai', 'trim|required', [
			'required' => 'Ruang nama pegawai wajib diisi'
		]);
		// $this->form_validation->set_rules('tarikh_hadir', 'Tarikh hadir', 'trim|required', [
		// 	'required' => 'Tarikh hadir wajib diisi'
		// ]);
		// $this->form_validation->set_rules('tarikh_saman', 'Tarikh saman', 'trim|required', [
		// 	'required' => 'Tarikh saman dikeluarkan wajib diisi'
		// ]);
	
		if ($this->form_validation->run()==FALSE) {
			$this->aduan_form();
		}else{

			$mysql = $this->load->database('default', true);	
			$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
			
			

			if ($this->input->post('submit')) {
				$status = 'lengkap';
			}else{
				$status = 'draf';
			}

			$object = [
				'case_id' => $case->row()->case_id,
				'user_id' => $this->session->userdata('current_user')->user_id,
				'adu_kslah' => $this->input->post('adu_kslah'),
				'adu_pegawai' => $this->input->post('adu_pegawai'),
				'adu_add1' => $this->input->post('adu_add1'),
				'adu_add2' => $this->input->post('adu_add2'),
				'adu_add3' => $this->input->post('adu_add3'),
				'adu_add4' => $this->input->post('adu_add4'),
				'adu_add5' => $this->input->post('adu_add5'),
				'adu_psalah_id' => $this->input->post('adu_psalah_id'),
				'adu_psalah_nama' => $this->input->post('adu_psalah_nama'),
				'adu_jab' => $this->input->post('adu_jab'),
				'adu_jaw' => $this->input->post('adu_jaw'),
				'adu_amaun' => $this->input->post('adu_amaun'),
				// 'tarikh_saman' => $this->input->post('tarikh_saman'),
				'adu_status' => $status
 			];

 			$check = $mysql->where('case_id', $case->row()->case_id)->get('adu');
 			if ($check->num_rows() > 0) {
 				$mysql->update('adu', $object);
 			}else{
 				$mysql->insert('adu', $object);
 			}
 			$this->index();
		}
	}

	// public function ringkas_form(){
	// 	$mysql = $this->load->database('default', true);
	// 	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
	// 	$kr = $mysql->where('case_id', $case->row()->case_id)->get('kr');

	// 	$mysql->where('type', 'kr');
	// 	$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
	// 	$data = [
	// 		'case' => $case->row(),
	// 		'kr' => $kr,
	// 		'pic' => $pic,
	// 		'content' => 'case_details/ringkas_form'
	// 	];
	// 	$this->load->view('layouts/admin', $data, FALSE);
	// }
	
	// public function ringkas_process(){
	// 	$mysql = $this->load->database('default', true);
	// 	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

	// 	if ($this->input->post('submit')) {
	// 		$status = 'lengkap';
	// 	}else{
	// 		$status = 'draf';
	// 	}

	// 	$object = [
	// 		'kr_content' => $this->input->post('content'),
	// 		'kr_status' => $status,
	// 		'user_id' => $this->session->userdata('current_user')->user_id,
	// 		'case_id' => $case->row()->case_id,
	// 	];

	// 	$check = $mysql->where('case_id', $case->row()->case_id)->get('kr');
	// 	if ($check->num_rows() > 0) {
	// 		$mysql->update('kr', $object);
	// 	}else{
	// 		$mysql->insert('kr', $object);
	// 	}

	// 	$this->load->library('upload');
 //        $files = $_FILES;
 //        $count = count($_FILES['userfile']['name']);
 //        for($i=0; $i<$count; $i++)
 //        {
 //            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
 //            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
 //            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
 //            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
 //            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
 //            $this->upload->initialize($this->set_upload_options());
 //            if($this->upload->do_upload() == False)
 //            {
 //                echo 'error';
 //            }
 //            else
 //            {
 //            	$data = $this->upload->data();
 //            	$object1 = [
 //            		'user_id' => $this->session->userdata('current_user')->user_id,
 //            		'case_id' => $case->row()->case_id,
 //            		'pic_name' => $data['file_name'],
 //            		'type' => $this->input->get('case_type')
 //            	];
 //              	$mysql->insert('pics', $object1);


 //            }
 //        }

	// 	$this->index();	
	// }

	public function ringkas_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$kr = $mysql->where('case_id', $case->row()->case_id)->get('kr');

		$mysql->where('type', 'kr');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'kr' => $kr,
			'pic' => $pic,
			'content' => 'case_details/ringkas_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function ringkas_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'kr_content' => $this->input->post('content'),
			'kr_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('kr');
		if ($check->num_rows() > 0) {
			$mysql->update('kr', $object);
		}else{
			$mysql->insert('kr', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {
	                echo 'error';
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	// public function fakta_form(){
	// 	$mysql = $this->load->database('default', true);
	// 	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
	// 	$fk = $mysql->where('case_id', $case->row()->case_id)->get('fk');

	// 	$mysql->where('type', 'fk');
	// 	$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
	// 	$data = [
	// 		'case' => $case->row(),
	// 		'fk' => $fk,
	// 		'pic' => $pic,
	// 		'content' => 'case_details/fakta_form'
	// 	];
	// 	$this->load->view('layouts/admin', $data, FALSE);
	// }
	
	// public function fakta_process(){
	// 	$mysql = $this->load->database('default', true);
	// 	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

	// 	if ($this->input->post('submit')) {
	// 		$status = 'lengkap';
	// 	}else{
	// 		$status = 'draf';
	// 	}

	// 	$object = [
	// 		'fk_content' => $this->input->post('content'),
	// 		'fk_status' => $status,
	// 		'user_id' => $this->session->userdata('current_user')->user_id,
	// 		'case_id' => $case->row()->case_id,
	// 	];

	// 	$check = $mysql->where('case_id', $case->row()->case_id)->get('fk');
	// 	if ($check->num_rows() > 0) {
	// 		$mysql->update('fk', $object);
	// 	}else{
	// 		$mysql->insert('fk', $object);
	// 	}

	// 	$this->load->library('upload');
 //        $files = $_FILES;
 //        $count = count($_FILES['userfile']['name']);
 //        for($i=0; $i<$count; $i++)
 //        {
 //            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
 //            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
 //            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
 //            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
 //            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
 //            $this->upload->initialize($this->set_upload_options());
 //            if($this->upload->do_upload() == False)
 //            {
 //                echo 'error';
 //            }
 //            else
 //            {
 //            	$data = $this->upload->data();
 //            	$object1 = [
 //            		'user_id' => $this->session->userdata('current_user')->user_id,
 //            		'case_id' => $case->row()->case_id,
 //            		'pic_name' => $data['file_name'],
 //            		'type' => $this->input->get('case_type')
 //            	];
 //              	$mysql->insert('pics', $object1);


 //            }
 //        }

	// 	$this->index();	
	// }

	public function fakta_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$fk = $mysql->where('case_id', $case->row()->case_id)->get('fk');

		$mysql->where('type', 'fk');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'fk' => $fk,
			'pic' => $pic,
			'content' => 'case_details/fakta_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function fakta_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'fk_content' => $this->input->post('content'),
			'fk_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('fk');
		if ($check->num_rows() > 0) {
			$mysql->update('fk', $object);
		}else{
			$mysql->insert('fk', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {
	                echo 'error';
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function diari_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$ds = $mysql->where('case_id', $case->row()->case_id)->get('ds');

		$mysql->where('type', 'ds');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'ds' => $ds,
			'pic' => $pic,
			'content' => 'case_details/diari_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function diari_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'ds_content' => $this->input->post('content'),
			'ds_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('ds');
		if ($check->num_rows() > 0) {
			$mysql->update('ds', $object);
		}else{
			$mysql->insert('ds', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {
	                echo 'error';
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function gambar_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$gm = $mysql->where('case_id', $case->row()->case_id)->get('gm');

		$mysql->where('type', 'gm');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'gm' => $gm,
			'pic' => $pic,
			'content' => 'case_details/gambar_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function gambar_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'gm_content' => $this->input->post('content'),
			'gm_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('gm');
		if ($check->num_rows() > 0) {
			$mysql->update('gm', $object);
		}else{
			$mysql->insert('gm', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {
	                echo 'error';
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function rajah_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$rk = $mysql->where('case_id', $case->row()->case_id)->get('rk');

		$mysql->where('type', 'rk');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'rk' => $rk,
			'pic' => $pic,
			'content' => 'case_details/rajah_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function rajah_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'rk_content' => $this->input->post('content'),
			'rk_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('rk');
		if ($check->num_rows() > 0) {
			$mysql->update('rk', $object);
		}else{
			$mysql->insert('rk', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {	

            		$error[$i] = array('error' => 'Fail melebihi saiz yang dibenarkan');
            		
            		$this->session->set_flashdata('up_error', $error);
            		
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function ssm_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$ssm = $mysql->where('case_id', $case->row()->case_id)->get('ssm');

		$mysql->where('type', 'ssm');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'ssm' => $ssm,
			'pic' => $pic,
			'content' => 'case_details/ssm_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function ssm_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'ssm_content' => $this->input->post('content'),
			'ssm_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('ssm');
		if ($check->num_rows() > 0) {
			$mysql->update('ssm', $object);
		}else{
			$mysql->insert('ssm', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {	

            		$error[$i] = array('error' => 'Fail melebihi saiz yang dibenarkan');
            		
            		$this->session->set_flashdata('up_error', $error);
            		
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function jpj_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$jpj = $mysql->where('case_id', $case->row()->case_id)->get('jpj');

		$mysql->where('type', 'jpj');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'jpj' => $jpj,
			'pic' => $pic,
			'content' => 'case_details/jpj_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function jpj_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'jpj_content' => $this->input->post('content'),
			'jpj_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('jpj');
		if ($check->num_rows() > 0) {
			$mysql->update('jpj', $object);
		}else{
			$mysql->insert('jpj', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {	

            		$error[$i] = array('error' => 'Fail melebihi saiz yang dibenarkan');
            		
            		$this->session->set_flashdata('up_error', $error);
            		
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function ro_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$ro = $mysql->where('case_id', $case->row()->case_id)->get('ro');

		$mysql->where('type', 'ro');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'ro' => $ro,
			'pic' => $pic,
			'content' => 'case_details/ro_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function ro_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'ro_content' => $this->input->post('content'),
			'ro_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('ro');
		if ($check->num_rows() > 0) {
			$mysql->update('ro', $object);
		}else{
			$mysql->insert('ro', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {	

            		$error[$i] = array('error' => 'Fail melebihi saiz yang dibenarkan');
            		
            		$this->session->set_flashdata('up_error', $error);
            		
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function rps_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$rps = $mysql->where('case_id', $case->row()->case_id)->get('rps');

		$mysql->where('type', 'rps');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'rps' => $rps,
			'pic' => $pic,
			'content' => 'case_details/rps_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function rps_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'rps_content' => $this->input->post('content'),
			'rps_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('rps');
		if ($check->num_rows() > 0) {
			$mysql->update('rps', $object);
		}else{
			$mysql->insert('rps', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {	

            		$error[$i] = array('error' => 'Fail melebihi saiz yang dibenarkan');
            		
            		$this->session->set_flashdata('up_error', $error);
            		
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	public function np_form(){
		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
		$np = $mysql->where('case_id', $case->row()->case_id)->get('np');

		$mysql->where('type', 'np');
		$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		$data = [
			'case' => $case->row(),
			'np' => $np,
			'pic' => $pic,
			'content' => 'case_details/np_form'
		];
		$this->load->view('layouts/admin', $data, FALSE);
	}
	
	public function np_process(){

		$mysql = $this->load->database('default', true);
		$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

		if ($this->input->post('submit')) {
			$status = 'lengkap';
		}else{
			$status = 'draf';
		}

		$object = [
			'np_content' => $this->input->post('content'),
			'np_status' => $status,
			'user_id' => $this->session->userdata('current_user')->user_id,
			'case_id' => $case->row()->case_id,
		];

		$check = $mysql->where('case_id', $case->row()->case_id)->get('np');
		if ($check->num_rows() > 0) {
			$mysql->update('np', $object);
		}else{
			$mysql->insert('np', $object);
		}

		if ($_FILES != null) {
		
		
			$this->load->library('upload');
	        $files = $_FILES;
	        $count = count($_FILES['userfile']['name']);
	        for($i=0; $i<$count; $i++)
	        {
	            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
	            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
	            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
	            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
	            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	            $this->upload->initialize($this->set_upload_options());
	            if($this->upload->do_upload() == False)
	            {	

            		$error[$i] = array('error' => 'Fail melebihi saiz yang dibenarkan');
            		
            		$this->session->set_flashdata('up_error', $error);
            		
	            }
	            else
	            {
	            	$data = $this->upload->data();
	            	$object1 = [
	            		'user_id' => $this->session->userdata('current_user')->user_id,
	            		'case_id' => $case->row()->case_id,
	            		'pic_name' => $data['file_name'],
	            		'type' => $this->input->get('case_type')
	            	];
	              	$mysql->insert('pics', $object1);


	            }
	        }
        }

		$this->index();	
	}

	// public function pic_form(){
	// 	$mysql = $this->load->database('default', true);		
	// 	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');
	// 	$pic = $mysql->where('case_id', $case->row()->case_id)->get('pics');
		
	// 	$data = [
	// 		'case' => $case->row(),
	// 		'pic' => $pic,
	// 		'content' => 'case_details/pic_form'
	// 	];

	// 	$this->load->view('layouts/admin', $data, FALSE);
	// }

	
	// public function pic_process(){
	// 	$mysql = $this->load->database('default', true);		
	// 	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

	// 	$this->load->library('upload');
 //        $files = $_FILES;
 //        $count = count($_FILES['userfile']['name']);
 //        for($i=0; $i<$count; $i++)
 //        {
 //            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
 //            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
 //            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
 //            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
 //            $_FILES['userfile']['size']= $files['userfile']['size'][$i];    
 //            $this->upload->initialize($this->set_upload_options());
 //            if($this->upload->do_upload() == False)
 //            {
 //                echo 'error';
 //            }
 //            else
 //            {
 //            	$data = $this->upload->data();
 //            	$object = [
 //            		'user_id' => $this->session->userdata('current_user')->user_id,
 //            		'case_id' => $case->row()->case_id,
 //            		'pic_name' => $data['file_name'],
 //            	];
 //              	$mysql->insert('pics', $object);


 //            }
 //        }
 //        $this->pic_form();			
	// }

	private function set_upload_options()
    {   

        $config = array();
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size'] = 1000;
        $config['overwrite']     = FALSE;
        return $config;
    }

    public function delete_file(){

    	

    	$mysql = $this->load->database('default', true);
    	$case = $mysql->where('ind_akaun', $this->input->get('account'))->get('cases');

    	$mysql->where('pic_id',  $this->input->get('id'));
    	$pic = $mysql->get('pics')->row();
    	$path = FCPATH . '/assets/uploads/' . $pic->pic_name;
    	if (unlink($path)) {
    		$mysql->where('pic_id',  $this->input->get('id'));
    		$mysql->delete('pics');
    		$this->index();
    	}else{
    		echo 'error';
    	}
    	

    	
    
    }

}

/* End of file Case_details.php */
/* Location: ./application/controllers/Case_details.php */




