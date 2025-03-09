<?php

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',11);
// mencetak string 

$pdf->Image(base_url()."gambar/sistem/logo.png", 10, 10, 13);

$pdf->Cell(16,6,'',0,0);
$pdf->Cell(100,6,'SMK DARUSSALAM SYAFA\'AT',0,1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(16,6,'',0,0);
$pdf->Cell(100,6,'KARTU PEMBAYARAN SPP',0,1);
$pdf->ln(4);
$pdf->Cell(130,0,'',1,1);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,3,'',0,1);
$pdf->SetFont('Arial','B',8);

$id = $this->uri->segment(3);
$angkatan = $this->uri->segment(4);

$siswa = $this->db->query("select * from siswa, siswa_kelas, angkatan, kelas, jurusan where sk_siswa='$id' and sk_angkatan='$angkatan' and siswa_id=sk_siswa and sk_angkatan=angkatan_id and sk_kelas=kelas_id and jurusan_id=siswa_jurusan");

$s = $siswa->row();

$pdf->Cell(20,4,'Nama Siswa',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $s->siswa_nama ,0,0);
$pdf->Cell(30,4,'',0,1);
$pdf->Cell(20,4,'NISN',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $s->siswa_nisn ,0,1);
$pdf->Cell(20,4,'Kelas',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $s->kelas_nama ,0,1);
$pdf->Cell(20,4,'Angkatan',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $s->angkatan_nama ,0,1);
$pdf->Cell(20,4,'Jurusan',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $s->jurusan_nama ,0,1);

$pdf->Cell(30,2,'',0,1);



$pdf->Cell(8,5,'No',1,0,'C');
$pdf->Cell(25,5,'No Bayar',1,0,'C');
$pdf->Cell(33,5,'Pembayaran Bulan',1,0,'C');
$pdf->Cell(33,5,'Jumlah',1,0,'C');
$pdf->Cell(30,5,'Keterangan',1,1,'C');

$pdf->SetFont('Arial','',8);

$arr_bulan[1] = 'Januari';
$arr_bulan[2] = 'Februari';
$arr_bulan[3] = 'Maret';
$arr_bulan[4] = 'April';
$arr_bulan[5] = 'Mei';
$arr_bulan[6] = 'juni';
$arr_bulan[7] = 'Juli';
$arr_bulan[8] = 'Agustus';
$arr_bulan[9] = 'September';
$arr_bulan[10] = 'Oktober';
$arr_bulan[11] = 'November';
$arr_bulan[12] = 'Desember';

$no=1;
$total_harus=0;  
$total_dibayar=0;  

$angkatan = $s->angkatan_nama;
$angkatan = str_replace(" ", "", $angkatan);
$angkatan = explode("/", $angkatan);
$awal = $angkatan[0];
$akhir = $angkatan[1];

$arr_bulan_tahun = array(
  [
    'bulan' => 7,
    'bulan_nama' => 'Juli',
    'tahun' => $awal,
  ],
  [
    'bulan' => 8,
    'bulan_nama' => 'Agustus',
    'tahun' => $awal,
  ],
  [
    'bulan' => 9,
    'bulan_nama' => 'September',
    'tahun' => $awal,
  ],
  [
    'bulan' => 10,
    'bulan_nama' => 'Oktober',
    'tahun' => $awal,
  ],
  [
    'bulan' => 11,
    'bulan_nama' => 'November',
    'tahun' => $awal,
  ],
  [
    'bulan' => 12,
    'bulan_nama' => 'Desember',
    'tahun' => $awal
  ],
  [
    'bulan' => 1,
    'bulan_nama' => 'Januari',
    'tahun' => $akhir,
  ],
  [
    'bulan' => 2,
    'bulan_nama' => 'Februari',
    'tahun' => $akhir,
  ],
  [
    'bulan' => 3,
    'bulan_nama' => 'Maret',
    'tahun' => $akhir,
  ],
  [
    'bulan' => 4,
    'bulan_nama' => 'April',
    'tahun' => $akhir,
  ],
  [
    'bulan' => 5,
    'bulan_nama' => 'Mei',
    'tahun' => $akhir,
  ],
  [
    'bulan' => 6,
    'bulan_nama' => 'juni',
    'tahun' => $akhir
  ]
);



$no = 1;
foreach($arr_bulan_tahun as $bulan){
  $total_harus += $s->angkatan_spp;
  $status = "";
  $bln = $bulan['bulan'];
  $thn = $bulan['tahun'];
  $cek_spp = $this->db->query("select * from pembayaran where pembayaran_bulan='$bln' and pembayaran_tahun='$thn' and pembayaran_siswa='$id'");
  $cek = $cek_spp->num_rows();
  if($cek > 0){
    $c = $cek_spp->row();
    $total_dibayar += $c->pembayaran_jumlah;

    $pdf->Cell(8,5, $no++,1,0,'C');
    $pdf->Cell(25,5, $c->pembayaran_no,1,0,'C');
    $pdf->Cell(33,5, $arr_bulan[$bln] ." ". $c->pembayaran_tahun,1,0,'C');
    $pdf->Cell(33,5, number_format($c->pembayaran_jumlah),1,0,'C');
    $pdf->Cell(30,5, "LUNAS",1,1,'C');    

  }else{

    $pdf->Cell(8,5, $no++,1,0,'C');
    $pdf->Cell(25,5, '-',1,0,'C');
    $pdf->Cell(33,5, $arr_bulan[$bln] ." ". $thn,1,0,'C');
    $pdf->Cell(33,5, number_format($s->angkatan_spp),1,0,'C');
    $pdf->Cell(30,5, "BELUM LUNAS",1,1,'C');

  }



}


$pdf->SetFont('Arial','B',8);

$pdf->Cell(66,5, "TOTAL HARUS DIBAYAR",1,0,'C');
$pdf->Cell(33,5, number_format($total_harus),1,0,'C');
$pdf->Cell(30,5, "",1,1,'C');

$pdf->Cell(66,5, "TOTAL SUDAH DIBAYAR",1,0,'C');
$pdf->Cell(33,5, number_format($total_dibayar),1,0,'C');
$pdf->Cell(30,5, "",1,1,'C');

$pdf->Cell(66,5, "KURANG",1,0,'C');
$pdf->Cell(33,5, number_format($total_harus - $total_dibayar),1,0,'C');
$pdf->Cell(30,5, "",1,1,'C');

$pdf->ln(10);
$pdf->SetFont('Arial','',8);



$pdf->Cell(8,5,'',0,0,'C');
$pdf->Cell(35,5,'Mengetahui',0,0,'C');
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(40,5,'Lampung, '. date('d-m-Y'),0,1,'C');

$pdf->Cell(8,5,'',0,0,'C');
$pdf->Cell(35,5,'Kepala Sekolah',0,0,'C');
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(40,5,'Admin, ',0,1,'C');


$pdf->ln(10);


$pdf->Cell(8,5,'',0,0,'C');
$pdf->Cell(35,5, "_____________" ,0,0,'C');
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(40,5, "_____________" ,0,1,'C');


$pdf->Output();
?>