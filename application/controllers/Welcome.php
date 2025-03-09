<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')=="telah_login"){
			redirect(base_url('/dashboard'));
		}
		
	}

	public function index()
	{
		$this->load->view('v_index');
	}

	public function index_aksi()
	{

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){

			// menangkap data username dan password dari halaman index
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = array(
				'siswa_username' => $username,
				'siswa_password' => md5($password)
			);

			$this->load->model('m_data');

			// cek kesesuaian login pada table siswa
			$cek = $this->m_data->cek_login('siswa',$where)->num_rows();

			// cek jika login benar
			if($cek > 0){

				// ambil data siswa yang melakukan login
				$data = $this->m_data->cek_login('siswa',$where)->row();
				$data_session = array(
					'id' => $data->siswa_id,
					'username' => $data->siswa_username,
					'status' => "siswa_login"
				);
				$this->session->set_userdata($data_session);

					// alihkan halaman ke halaman dashboard admin
				redirect(base_url().'siswa');
				
			}else{
				redirect(base_url().'index?alert=gagal');
			}

		}else{
			$this->load->view('v_index');
			
		}
	}





	public function login()
	{
		$this->load->view('v_login');
	}

	public function login_aksi()
	{

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){

			// menangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = array(
				'admin_username' => $username,
				'admin_password' => md5($password)
			);

			$this->load->model('m_data');

			// cek kesesuaian login pada table admin
			$cek = $this->m_data->cek_login('tbl_admin',$where)->num_rows();

			// cek jika login benar
			if($cek > 0){

				// ambil data admin yang melakukan login
				$data = $this->m_data->cek_login('tbl_admin',$where)->row();
				$data_session = array(
					'id' => $data->admin_id,
					'username' => $data->admin_username,
					'status' => "telah_login"
				);
				$this->session->set_userdata($data_session);

					// alihkan halaman ke halaman dashboard admin
				redirect(base_url().'dashboard');
				
			}else{
				redirect(base_url().'login?alert=gagal');
			}

		}else{
			$this->load->view('v_login');
			
		}
	}


	public function notfound()
	{
		$this->load->view('v_notfound');
	}

}
