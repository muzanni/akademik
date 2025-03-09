<?php
// memanggil library FPDF

$id = $this->uri->segment(3);

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A5');
// $pdf = new FPDF('p','mm',array(100,120));
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
$pdf->Cell(100,6,'BUKTI PEMBAYARAN SPP',0,1);
$pdf->ln(4);
$pdf->Cell(130,0,'',1,1);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,3,'',0,1);
$pdf->SetFont('Arial','B',8);

$pembayaran = $this->db->query("select * from pembayaran, siswa, angkatan, kelas, jurusan where pembayaran_siswa=siswa_id and pembayaran_angkatan=angkatan_id and pembayaran_kelas=kelas_id and siswa_jurusan=jurusan_id and pembayaran_id='$id'");
$p = $pembayaran->row();

$pdf->Cell(20,4,'Nama Siswa',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $p->siswa_nama ,0,0);
$pdf->Cell(30,4,'',0,1);
$pdf->Cell(20,4,'NISN',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $p->siswa_nisn ,0,1);
$pdf->Cell(20,4,'Kelas',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $p->kelas_nama ,0,1);
$pdf->Cell(20,4,'Angkatan',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $p->angkatan_nama ,0,1);
$pdf->Cell(20,4,'Jurusan',0,0);
$pdf->Cell(3,4,':',0,0);
$pdf->Cell(20,4, $p->jurusan_nama ,0,1);

$pdf->Cell(30,2,'',0,1);


$pdf->SetFont('Arial','B',8);

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




$pdf->Cell(8,5,'No',1,0,'C');
$pdf->Cell(25,5,'No Bayar',1,0,'C');
$pdf->Cell(33,5,'Pembayaran Bulan',1,0,'C');
$pdf->Cell(33,5,'Jumlah',1,0,'C');
$pdf->Cell(30,5,'Keterangan',1,1,'C');


$pdf->SetFont('Arial','',8);

$bbb = $p->pembayaran_bulan;
$pdf->Cell(8,4, '1.',1,0,'C');
$pdf->Cell(25,4, $p->pembayaran_no,1,0,'C');
$pdf->Cell(33,4, $arr_bulan[$bbb] ." ". $p->pembayaran_tahun,1,0,'C');
$pdf->Cell(33,4, number_format($p->pembayaran_jumlah),1,0,'C');
$pdf->Cell(30,4, "LUNAS",1,1,'C');

$pdf->SetFont('Arial','B',8);
$pdf->Cell(66,4, 'TOTAL',1,0,'C');
$pdf->Cell(33,4, number_format($p->pembayaran_jumlah),1,0,'C');
$pdf->Cell(30,4, "",1,1,'C');


$pdf->SetFont('Arial','',8);

$pdf->ln(10);


$pdf->Cell(8,5,'',0,0,'C');
$pdf->Cell(35,5,'Mengetahui',0,0,'C');
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(40,5,'Lampung, '. date('d-m-Y'),0,1,'C');

$pdf->Cell(8,5,'',0,0,'C');
$pdf->Cell(35,5,'Kepala Sekolah',0,0,'C');
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(40,5,'Admin, ',0,1,'C');



$pdf->ln(15);

$pdf->Cell(8,5,'',0,0,'C');
$pdf->Cell(35,5, "___________________" ,0,0,'C');
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(40,5, "___________________" ,0,1,'C');



$pdf->Output();
?>