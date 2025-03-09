<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		date_default_timezone_set('Asia/Jakarta');

		$this->load->model('m_data');

		// cek session yang login, 
		// jika session status tidak sama dengan session telah_login, berarti admin belum login
		// maka halaman akan di alihkan kembali ke halaman login.
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url().'login?alert=belum_login');
		}
	}

	public function index()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/footer');
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect(base_url('login?alert=logout'));
	}

	public function ganti_password()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/ganti_password');
		$this->load->view('dashboard/footer');
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

			redirect(base_url('dashboard/ganti_password?alert=sukses'));

		}else{
			$this->load->view('dashboard/header');
			$this->load->view('dashboard/ganti_password');
			$this->load->view('dashboard/footer');
		}

	}

	// CRUD tingkatan
	public function tingkatan()
	{		
		$data['tingkatan'] = $this->m_data->get_data('tbl_tingkatan_kelas')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/tingkatan',$data);
		$this->load->view('dashboard/footer');
	}

	public function tingkatan_update()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$where = array(
			'id_tingkatan' => $id
		);
		$data = array(
			'kd_tingkatan' => $kode,
			'nama_tingkatan' => $nama,
		);
		$this->m_data->update_data($where, $data,'tbl_tingkatan_kelas');
		redirect(base_url().'dashboard/tingkatan');
	}

	// CRUD guru
	public function guru()
	{		
		$data['guru'] = $this->m_data->get_data('tbl_guru')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/guru',$data);
		$this->load->view('dashboard/footer');
	}
	public function guru_tambah()
	{		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/guru_tambah');
		$this->load->view('dashboard/footer');
	}

	// CRUD admin
	public function admin()
	{		
		$data['admin'] = $this->m_data->get_data('tbl_admin')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/admin',$data);
		$this->load->view('dashboard/footer');
	}

	public function admin_tambah()
	{		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/admin_tambah');
		$this->load->view('dashboard/footer');
	}

	public function admin_aksi()
	{		
		$nama  = $this->input->post('nama');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$password = md5($this->input->post('password'));

		$rand = rand();
		$allowed =  array('png','jpg','jpeg');
		$filename = $_FILES['foto']['name'];

		if($filename == ""){
			$this->db->query("insert into tbl_admin values (NULL,'$nama','$username','$password','$level','')");
			redirect(base_url('dashboard/admin'));	
		}else{
			$config['encrypt_name'] = TRUE;
			$config['upload_path']   = './gambar/admin/';
			$config['allowed_types'] = 'jpeg|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')){
				$foto = $this->upload->do_upload('foto');
				$gambar1 = $this->upload->data();
				$foto = $gambar1['file_name'];
			}else{
				$foto = "";
			}

			$this->db->query("insert into tbl_admin values (NULL,'$nama','$username','$password','$level','$foto')");
		}

		redirect(base_url('dashboard/admin'));	
	}

	public function admin_edit($id)
	{		      
		$data['data'] = $this->db->query("select * from tbl_admin where admin_id='$id'")->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/admin_edit',$data);
		$this->load->view('dashboard/footer');
	}

	public function admin_update()
	{		
		
		$id  = $this->input->post('id');
		$nama  = $this->input->post('nama');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$password = md5($this->input->post('password'));

		if($this->input->post('password') == ""){
			$this->db->query("update tbl_admin set admin_nama='$nama', admin_username='$username', admin_level='$level' where admin_id='$id'");
		}else{
			$this->db->query("update tbl_admin set admin_nama='$nama', admin_password='$password', admin_username='$username', admin_level='$level' where admin_id='$id'");
		}

		$rand = rand();
		$allowed =  array('png','jpg','jpeg');
		$filename = $_FILES['foto']['name'];

		if($filename != ""){
			$config['encrypt_name'] = TRUE;
			$config['upload_path']   = './gambar/admin/';
			$config['allowed_types'] = 'jpeg|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('foto')){
				$foto = $this->upload->do_upload('foto');
				$gambar1 = $this->upload->data();
				$foto = $gambar1['file_name'];
				$this->db->query("update tbl_admin set admin_foto='$foto' where admin_id='$id'");				
			}
		}

		redirect(base_url('dashboard/admin'));

	}

	public function admin_hapus($id){		
		$data = $this->db->query("select * from tbl_admin where admin_id='$id'");
		$d = mysqli_fetch_assoc($data);
		$foto = $d->admin_foto;
		if($foto !=""){
			@chmod('./gambar/admin/'.$foto, 0777);
			@unlink('./gambar/admin/'.$foto);
			$this->db->query("delete from tbl_admin where admin_id='$id'");
			redirect(base_url('dashboard/admin'));		
		}else{			
			$this->db->query("delete from tbl_admin where admin_id='$id'");
			redirect(base_url('dashboard/admin'));		
		}
		
	}
	// END CRUD admin



	// CRUD kurikulum
	public function kurikulum()
	{
		$data['kurikulum'] = $this->m_data->get_data('tbl_kurikulum')->result();		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/kurikulum',$data);
		$this->load->view('dashboard/footer');
	}
	public function kurikulum_aksi()
	{		
		$kurikulum = $this->input->post('kurikulum');
		$data = array(
			'nama_kurikulum' => $kurikulum,
			'is_aktif' => 'N',
		);
		$this->m_data->insert_data($data,'tbl_kurikulum');
		redirect(base_url().'dashboard/kurikulum');
	}





	// CRUD kelas
	public function kelas()
	{
		$data['kelas'] = $this->m_data->get_data('kelas')->result();
		$data['tingkatan'] = $this->m_data->get_data('tbl_tingkatan_kelas')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/kelas',$data);
		$this->load->view('dashboard/footer');
	}
	
	public function kelas_aksi()
	{		
		$kode = $this->input->post('kode');
		$kelas = $this->input->post('kelas');
		$tingkat = $this->input->post('tingkat');
		$jurusan = $this->input->post('jurusan');
		$data = array(
			'kd_kelas' => $kode,
			'nama_kelas' => $kelas,
			'id_tingkatan' => $tingkat,
			'kd_jurusan' => $jurusan,
		);
		$this->m_data->insert_data($data,'tbl_kelas');
		redirect(base_url().'dashboard/kelas');
	}	

	public function kelas_update()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$kelas = $this->input->post('kelas');
		$tingkat = $this->input->post('tingkat');
		$jurusan = $this->input->post('jurusan');
		$where = array(
			'id_kelas' => $id
		);
		$data = array(
			'kd_kelas' => $kode,
			'nama_kelas' => $kelas,
			'id_tingkatan' => $tingkat,
			'kd_jurusan' => $jurusan,
		);
		$this->m_data->update_data($where, $data,'tbl_kelas');
		redirect(base_url().'dashboard/kelas');
	}


	public function kelas_hapus($id)
	{
		$where = array(
			'id_kelas' => $id
		);
		$this->m_data->delete_data($where,'tbl_kelas');
		redirect(base_url().'dashboard/kelas');
	}
	// END CRUD kelas


	// CRUD jurusan
	public function jurusan()
	{
		$data['jurusan'] = $this->m_data->get_data('jurusan')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/jurusan',$data);
		$this->load->view('dashboard/footer');
	}
	
	public function jurusan_aksi()
	{		
		$jurusan = $this->input->post('jurusan');

		$data = array(
			'jurusan_nama' => $jurusan,
		);

		$this->m_data->insert_data($data,'jurusan');

		redirect(base_url().'dashboard/jurusan');
	}	

	public function jurusan_update()
	{
		$id = $this->input->post('id');
		$jurusan = $this->input->post('jurusan');

		$where = array(
			'jurusan_id' => $id
		);

		$data = array(
			'jurusan_nama' => $jurusan,
		);

		$this->m_data->update_data($where, $data,'jurusan');

		redirect(base_url().'dashboard/jurusan');
	}


	public function jurusan_hapus($id)
	{
		$where = array(
			'jurusan_id' => $id
		);

		$this->m_data->delete_data($where,'jurusan');

		redirect(base_url().'dashboard/jurusan');
	}
	// END CRUD jurusan





	// CRUD angkatan
	public function angkatan()
	{
		$data['angkatan'] = $this->m_data->get_data('angkatan')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/angkatan',$data);
		$this->load->view('dashboard/footer');
	}
	
	public function angkatan_aksi()
	{		
		$angkatan = $this->input->post('angkatan');
		$spp = $this->input->post('spp');

		$data = array(
			'angkatan_nama' => $angkatan,
			'angkatan_spp' => $spp,
		);

		$this->m_data->insert_data($data,'angkatan');

		redirect(base_url().'dashboard/angkatan');
	}	

	public function angkatan_update()
	{
		$id = $this->input->post('id');
		$angkatan = $this->input->post('angkatan');
		$spp = $this->input->post('spp');

		$where = array(
			'angkatan_id' => $id
		);

		$data = array(
			'angkatan_nama' => $angkatan,
			'angkatan_spp' => $spp,
		);

		$this->m_data->update_data($where, $data,'angkatan');

		redirect(base_url().'dashboard/angkatan');
	}


	public function angkatan_hapus($id)
	{
		$where = array(
			'angkatan_id' => $id
		);

		$this->m_data->delete_data($where,'angkatan');

		redirect(base_url().'dashboard/angkatan');
	}
	// END CRUD angkatan





	// CRUD siswa
	public function siswa()
	{		
		$data['siswa'] = $this->db->query("select * from angkatan, jurusan, siswa, kelas where siswa_angkatan=angkatan_id and siswa_jurusan=jurusan_id and siswa_kelas=kelas_id")->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/siswa',$data);
		$this->load->view('dashboard/footer');
	}

	public function siswa_tambah()
	{		
		$data['angkatan'] = $this->m_data->get_data('angkatan')->result();
		$data['jurusan'] = $this->m_data->get_data('jurusan')->result();
		$data['kelas'] = $this->m_data->get_data('kelas')->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/siswa_tambah',$data);
		$this->load->view('dashboard/footer');
	}

	public function siswa_aksi()
	{		
	
		$nama = $this->input->post('nama');
		$nisn = $this->input->post('nisn');
		$jk = $this->input->post('jk');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$angkatan = $this->input->post('angkatan');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		
		$pwd = md5($password);

		$data = array(
			'siswa_nama' => $nama,
			'siswa_nisn' => $nisn,
			'siswa_jk' => $jk,
			'siswa_tgl_lahir' => $tgl_lahir,
			'siswa_tempat_lahir' => $tempat_lahir,
			'siswa_angkatan' => $angkatan,
			'siswa_jurusan' => $jurusan,
			'siswa_kelas' => $kelas,
			'siswa_agama' => $agama,
			'siswa_alamat' => $alamat,
			'siswa_hp' => $hp,
			'siswa_username' => $username,
			'siswa_password' => $pwd,
			'siswa_status' => $status,
		);

		$this->m_data->insert_data($data,'siswa');

		$id_terakhir = $this->db->insert_id();

		$data = array(			
			'sk_angkatan' => $angkatan,
			'sk_siswa' => $id_terakhir,
			'sk_kelas' => $kelas
		);

		$this->m_data->insert_data($data,'siswa_kelas');
		
		redirect(base_url('dashboard/siswa'));	
	}

	public function siswa_edit($id)
	{		      
		$data['angkatan'] = $this->m_data->get_data('angkatan')->result();
		$data['jurusan'] = $this->m_data->get_data('jurusan')->result();
		$data['kelas'] = $this->m_data->get_data('kelas')->result();
		$data['data'] = $this->db->query("select * from siswa where siswa_id='$id'")->result();
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/siswa_edit',$data);
		$this->load->view('dashboard/footer');
	}

	public function siswa_update()
	{				
		$id  = $this->input->post('id');

		$nama = $this->input->post('nama');
		$nisn = $this->input->post('nisn');
		$jk = $this->input->post('jk');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$angkatan = $this->input->post('angkatan');
		$jurusan = $this->input->post('jurusan');
		$kelas = $this->input->post('kelas');
		$agama = $this->input->post('agama');
		$alamat = $this->input->post('alamat');
		$hp = $this->input->post('hp');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$status = $this->input->post('status');
		$submit = $this->input->post('submit');


		$lama 			= $this->db->query("select * from siswa where siswa_id='$id'")->row();		
		$lama_angkatan  = $lama->siswa_angkatan;
		$lama_kelas 	= $lama->siswa_kelas;

		$this->db->query("update siswa_kelas set sk_kelas='$kelas' where sk_siswa='$id' and sk_angkatan='$lama_angkatan' and sk_kelas='$lama_kelas'");



		if($password == ""){
			$data = array(
				'siswa_nama' => $nama,
				'siswa_nisn' => $nisn,
				'siswa_jk' => $jk,
				'siswa_tgl_lahir' => $tgl_lahir,
				'siswa_tempat_lahir' => $tempat_lahir,
				'siswa_angkatan' => $angkatan,
				'siswa_jurusan' => $jurusan,
				'siswa_kelas' => $kelas,
				'siswa_agama' => $agama,
				'siswa_alamat' => $alamat,
				'siswa_hp' => $hp,
				'siswa_username' => $username,
				'siswa_status' => $status,
			);
		}else{
			$pwd = md5($password);
			$data = array(
				'siswa_nama' => $nama,
				'siswa_nisn' => $nisn,
				'siswa_jk' => $jk,
				'siswa_tgl_lahir' => $tgl_lahir,
				'siswa_tempat_lahir' => $tempat_lahir,
				'siswa_angkatan' => $angkatan,
				'siswa_jurusan' => $jurusan,
				'siswa_kelas' => $kelas,
				'siswa_agama' => $agama,
				'siswa_alamat' => $alamat,
				'siswa_hp' => $hp,
				'siswa_username' => $username,
				'siswa_password' => $pwd,
				'siswa_status' => $status,
			);
		}
		

		$where = array(
			'siswa_id' => $id
		);

		$this->m_data->update_data($where,$data,'siswa');

		
	
		redirect(base_url('dashboard/siswa'));

	}

	public function siswa_hapus($id){		
		// $data = $this->db->query("select * from siswa where siswa_id='$id'");
		// $d = mysqli_fetch_assoc($data);
		// $foto = $d->siswa_foto;
		// @chmod('./gambar/siswa/'.$foto, 0777);
		// @unlink('./gambar/siswa/'.$foto);
		$this->db->query("delete from siswa where siswa_id='$id'");
		redirect(base_url('dashboard/siswa'));		
	}
	// END CRUD siswa


	// spp
	public function spp()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/spp');
		$this->load->view('dashboard/footer');
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

		$data = array(
			'pembayaran_no' => $no,
			'pembayaran_tanggal' => $tanggal,
			'pembayaran_siswa' => $siswa,
			'pembayaran_bulan' => $bulan,
			'pembayaran_tahun' => $tahun,
			'pembayaran_angkatan' => $angkatan,
			'pembayaran_kelas' => $kelas,
			'pembayaran_jumlah' => $jumlah
		);

		$this->m_data->insert_data($data,'pembayaran');

		$sis = $this->m_data->edit_data(array('siswa_id' => $siswa), 'siswa')->row();
		$ss = $sis->siswa_nisn;		
		
		redirect(base_url('dashboard/spp?nis=').$ss);	
	}


	public function spp_bayar_batal($id)
	{		

		$w = array(
			'pembayaran_id' => $id
		);

		$siswa = $this->m_data->edit_data($w, 'pembayaran')->row();
		$id_siswa = $siswa->pembayaran_siswa;

		$this->m_data->delete_data($w, 'pembayaran');

		$sis = $this->m_data->edit_data(array('siswa_id' => $id_siswa), 'siswa')->row();
		$ss = $sis->siswa_nisn;		
		
		redirect(base_url('dashboard/spp?nis=').$ss);	
	}

	public function spp_cetak($id)
	{				
		$this->load->library('Pdf');
		$data['title_pdf'] = 'Bukti Pembayaran SPP';
		$file_pdf = 'Bukti Pembayaran SPP';
		$paper = 'A4';
		$orientation = "landscape";			
		$this->load->view('dashboard/spp_cetak', true);	
	}

	public function spp_rekap($id_siswa,$id_angkatan)
	{				
		$this->load->library('Pdf');
		$data['title_pdf'] = 'Kartu Pembayaran SPP';
		$file_pdf = 'Kartu Pembayaran SPP';
		$paper = 'A4';
		$orientation = "landscape";			
		$this->load->view('dashboard/spp_rekap', true);	
	}

	// setoran
	public function setoran()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/setoran');
		$this->load->view('dashboard/footer');
	}


	public function setoran_status()
	{		

		// $no = rand();
		// $tanggal  = date('Y-m-d');

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		
		if($status == '2'){

			$setoran = $this->m_data->edit_data(array('setoran_id' => $id), 'setoran')->row();			

			$no = rand();
			$tanggal = $setoran->setoran_tanggal;
			$siswa = $setoran->setoran_siswa;
			$angkatan = $setoran->setoran_angkatan;
			$bulan = $setoran->setoran_bulan;
			$tahun = $setoran->setoran_tahun;
			$kelas = $setoran->setoran_kelas;
			$jumlah = $setoran->setoran_jumlah;	

			$data = array(
				'pembayaran_no' => $no,
				'pembayaran_tanggal' => $tanggal,
				'pembayaran_siswa' => $siswa,
				'pembayaran_bulan' => $bulan,
				'pembayaran_tahun' => $tahun,
				'pembayaran_angkatan' => $angkatan,
				'pembayaran_kelas' => $kelas,
				'pembayaran_jumlah' => $jumlah
			);

			$this->m_data->insert_data($data,'pembayaran');

			$this->m_data->update_data(array('setoran_id' => $id), array('setoran_status' => $status), 'setoran');			

			redirect(base_url('dashboard/setoran?alert=terima'));	

		}else{

			$setoran = $this->m_data->edit_data(array('setoran_id' => $id), 'setoran')->row();			

			$tanggal = $setoran->setoran_tanggal;
			$siswa = $setoran->setoran_siswa;
			$angkatan = $setoran->setoran_angkatan;
			$bulan = $setoran->setoran_bulan;
			$tahun = $setoran->setoran_tahun;
			$kelas = $setoran->setoran_kelas;
			$jumlah = $setoran->setoran_jumlah;	

			$where = array(				
				'pembayaran_siswa' => $siswa,
				'pembayaran_bulan' => $bulan,
				'pembayaran_tahun' => $tahun,
				'pembayaran_angkatan' => $angkatan,
				'pembayaran_kelas' => $kelas
			);

			$this->m_data->delete_data($where, 'pembayaran');		

			$this->m_data->update_data(array('setoran_id' => $id), array('setoran_status' => $status), 'setoran');		

			redirect(base_url('dashboard/setoran?alert=batal'));

		}

	}

	public function setoran_hapus($id)
	{		

		$setoran = $this->m_data->edit_data(array('setoran_id' => $id), 'setoran')->row();			

		$tanggal = $setoran->setoran_tanggal;
		$siswa = $setoran->setoran_siswa;
		$angkatan = $setoran->setoran_angkatan;
		$bulan = $setoran->setoran_bulan;
		$tahun = $setoran->setoran_tahun;
		$kelas = $setoran->setoran_kelas;
		$jumlah = $setoran->setoran_jumlah;	

		// hapus pembayaran
		$where = array(				
			'pembayaran_siswa' => $siswa,
			'pembayaran_bulan' => $bulan,
			'pembayaran_tahun' => $tahun,
			'pembayaran_angkatan' => $angkatan,
			'pembayaran_kelas' => $kelas
		);

		$this->m_data->delete_data($where, 'pembayaran');	


		@chmod('./gambar/bukti/'.$setoran->setoran_bukti, 0777);
		@unlink('./gambar/bukti/'.$setoran->setoran_bukti);

		// hapus setoran
		$w = array(				
			'setoran_id' => $id
		);

		$this->m_data->delete_data($w, 'setoran');		

		redirect(base_url('dashboard/setoran?alert=hapus'));
	}



	// kenaikan kelas
	public function kenaikan_kelas()
	{
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/kenaikan_kelas');
		$this->load->view('dashboard/footer');
	}

	public function kenaikan_kelas_update()
	{		


		$siswa  = $this->input->post('siswa');
		$angkatan  = $this->input->post('angkatan');
		$kelas  = $this->input->post('kelas');

		$lama = $this->db->query("select * from siswa where siswa_id='$siswa'");
		$l = $lama->row();
		$lama_angkatan = $l->siswa_angkatan;
		$lama_kelas = $l->siswa_kelas;


		$this->db->query("update siswa set siswa_angkatan='$angkatan', siswa_kelas='$kelas' where siswa_id='$siswa'");

		$cek = $this->db->query("select * from siswa_kelas where sk_siswa='$siswa' and sk_angkatan='$angkatan' and sk_kelas='$kelas'");
		$c = $cek->num_rows();

		if($c == 0){
			$this->db->query("insert into siswa_kelas values (NULL,'$siswa','$angkatan','$kelas')");
		}

		redirect(base_url('dashboard/kenaikan_kelas'));	

	}












	public function laporan()
	{		
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/laporan');
		$this->load->view('dashboard/footer');

	}


	public function laporan_pdf()
	{
		$this->load->library('Pdf');

			// $this->load->library('pdfgenerator');
		$data['title_pdf'] = 'Laporan Pembayaran SPP';
		$file_pdf = 'laporan_penjualan';
		$paper = 'A4';
		$orientation = "landscape";			
		$html = $this->load->view('dashboard/laporan_pdf', true);	
	}





}
