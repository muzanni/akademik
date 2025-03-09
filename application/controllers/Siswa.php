<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti admin belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="siswa_login"){
			redirect(base_url().'index?alert=belum_login');
		}
	}

	public function index()
	{
		$id_siswa = $this->session->userdata('id');
		$data['siswa'] = $this->db->query("select * from siswa, jurusan,angkatan, kelas where siswa_kelas=kelas_id and siswa_jurusan=jurusan_id and siswa_angkatan=angkatan_id and siswa_id='$id_siswa'")->result();
		$this->load->view('siswa/header');
		$this->load->view('siswa/index', $data);
		$this->load->view('siswa/footer');
	}


	// CRUD angkatan
	public function angkatan()
	{
		$data['angkatan'] = $this->m_data->get_data('angkatan')->result();
		$this->load->view('siswa/header');
		$this->load->view('siswa/angkatan',$data);
		$this->load->view('siswa/footer');
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url('index?alert=logout'));
	}

	public function ganti_password()
	{
		$this->load->view('siswa/header');
		$this->load->view('siswa/ganti_password');
		$this->load->view('siswa/footer');
	}

	public function ganti_password_aksi()
	{

		// form validasi
		$this->form_validation->set_rules('password','Password','required');

		// cek validasi
		if($this->form_validation->run() != false){


			$id = $this->session->userdata('id');
			$password = md5($this->input->post('password'));

			$this->db->query("UPDATE admin SET admin_password='$password' WHERE admin_id='$id'");

			redirect(base_url('siswa/ganti_password?alert=sukses'));

		}else{
			$this->load->view('siswa/header');
			$this->load->view('siswa/ganti_password');
			$this->load->view('siswa/footer');
		}

	}


	// spp
	public function spp() 
	{
		$this->load->view('siswa/header');
		$this->load->view('siswa/spp');
		$this->load->view('siswa/footer');
	}
	

	public function spp_bayar()
	{		

		$no = rand();
		$tanggal  = date('Y-m-d');

		$siswa = $this->input->post('siswa');
		$angkatan = $this->input->post('angkatan');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$kelas = $this->input->post('kelas');
		$jumlah = $this->input->post('jumlah');	


		$rand = rand();
		$allowed =  array('png','jpg','jpeg');
		$filename = $_FILES['bukti']['name'];

		$config['encrypt_name'] = TRUE;
		$config['upload_path']   = './gambar/bukti/';
		$config['allowed_types'] = 'jpeg|jpg|png';

		$this->load->library('upload', $config);

		if($this->upload->do_upload('bukti')){
			$foto = $this->upload->do_upload('bukti');
			$gambar1 = $this->upload->data();
			$foto = $gambar1['file_name'];	

			// hapus yg lama dulu
			$ww = array(								
				'setoran_siswa' => $siswa,
				'setoran_bulan' => $bulan,
				'setoran_tahun' => $tahun,
				'setoran_angkatan' => $angkatan,
				'setoran_kelas' => $kelas,
			);

			$this->m_data->delete_data($ww,'setoran');


			// input pembayaran
			$data = array(				
				'setoran_tanggal' => $tanggal,
				'setoran_siswa' => $siswa,
				'setoran_bulan' => $bulan,
				'setoran_tahun' => $tahun,
				'setoran_angkatan' => $angkatan,
				'setoran_kelas' => $kelas,
				'setoran_jumlah' => $jumlah,
				'setoran_status' => 0,
				'setoran_bukti' => $foto
			);

			$this->m_data->insert_data($data,'setoran');


			redirect(base_url('siswa/spp?alert=sukses'));

		}else{
			
			redirect(base_url('siswa/spp?alert=gagal'));
		}
	
	}

	public function spp_cetak($id)
	{				
		$this->load->library('Pdf');
		$data['title_pdf'] = 'Bukti Pembayaran SPP';
		$file_pdf = 'Bukti Pembayaran SPP';
		$paper = 'A4';
		$orientation = "landscape";			
		$this->load->view('siswa/spp_cetak', true);	
	}

	public function spp_rekap($id_siswa,$id_angkatan)
	{				
		$this->load->library('Pdf');
		$data['title_pdf'] = 'Kartu Pembayaran SPP';
		$file_pdf = 'Kartu Pembayaran SPP';
		$paper = 'A4';
		$orientation = "landscape";			
		$this->load->view('siswa/spp_rekap', true);	
	}





}
