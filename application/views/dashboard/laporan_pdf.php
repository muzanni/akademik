<?php
// memanggil library FPDF
// require('../library/fpdf181/fpdf.php');

$angkatan = $_GET['angkatan'];

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 

$pdf->SetFont('Arial','B',12);
$pdf->Cell(280,7,'LAPORAN SPP',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','B',10);

$pdf->Cell(35,6,'TAHUN AJARAN',0,0);
$pdf->Cell(5,6,':',0,0);

$angkatan = $_GET['angkatan'];
if($angkatan == "semua"){
  $kkk = "SEMUA ANGKATAN";
}else{
  $k = $this->db->query("select * from angkatan where angkatan_id='$angkatan'");
  $kk = $k->row();
  $kkk = $kk->angkatan_nama;
}
$pdf->Cell(35,6, $kkk ,0,0);


$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Arial','B',9);


$pdf->Cell(8,14,'NO',1,0,'C');
$pdf->Cell(20,14,'T/A',1,0,'C');
$pdf->Cell(50,14, 'NAMA SISWA' ,1,0,'C');
$pdf->Cell(23,14,'NISN',1,0,'C');
$pdf->Cell(18,14,'KELAS',1,0,'C');
$pdf->Cell(40,14,'JURUSAN',1,0,'C');
$pdf->Cell(18,14,'SPP',1,0,'C');

$pdf->Cell(40,7,'BULAN',1,0,'C');
$pdf->Cell(60,7,'SUB TOTAL',1,1,'C');


$pdf->Cell(177,7,'',0,0,'C');

$pdf->Cell(18,7,'LUNAS',1,0,'C');
$pdf->Cell(22,7,'TUNGGAKAN',1,0,'C');
$pdf->Cell(30,7,'LUNAS',1,0,'C');
$pdf->Cell(30,7,'TUNGGAKAN',1,1,'C');





$pdf->SetFont('Arial','',9);


$no=1;
$total_lunas=0;
$total_tunggakan=0;

if($angkatan == "semua"){
  $data = $this->db->query("SELECT * FROM angkatan, siswa_kelas, siswa, jurusan, kelas where siswa_kelas=kelas_id and siswa_jurusan=jurusan_id and angkatan_id=sk_angkatan and sk_siswa=siswa_id order by siswa_nisn asc");
}else{
  $data = $this->db->query("SELECT * FROM angkatan, siswa_kelas, siswa, jurusan, kelas where siswa_kelas=kelas_id and siswa_jurusan=jurusan_id and angkatan_id=sk_angkatan and sk_siswa=siswa_id and sk_angkatan='$angkatan' order by siswa_nisn asc");                    
}
foreach($data->result() as $d){

  $id_siswa = $d->siswa_id;
  $id_angkatan = $d->angkatan_id;
  
  
  $pdf->Cell(8,7, $no++, 1, 0, 'C');
  $pdf->Cell(20,7, $d->angkatan_nama, 1, 0, 'C');
  $pdf->Cell(50,7, $d->siswa_nama, 1, 0, 'C');
  $pdf->Cell(23,7, $d->siswa_nisn, 1, 0, 'C');
  $pdf->Cell(18,7, $d->kelas_nama, 1, 0, 'C');
  $pdf->Cell(40,7, $d->jurusan_nama, 1, 0, 'C');
  $pdf->Cell(18,7, number_format($d->angkatan_spp), 1, 0, 'C');

  $terbayar = $this->db->query("select * from pembayaran where pembayaran_siswa='$id_siswa' and pembayaran_angkatan='$id_angkatan'")->num_rows();
  $bulan_lunas = $terbayar;    
  $pdf->Cell(18,7, $bulan_lunas . " Bulan", 1, 0, 'C');


  $bulan_menunggak = 12-$terbayar;
  $pdf->Cell(22,7, $bulan_menunggak . " Bulan", 1, 0, 'C');


  $lunas = $bulan_lunas * $d->angkatan_spp;      
  $pdf->Cell(30,7, number_format($lunas), 1, 0, 'C');

  $menunggak = $bulan_menunggak * $d->angkatan_spp;
  $pdf->Cell(30,7, number_format($menunggak), 1, 1, 'C');

  $total_lunas += $lunas;
  $total_tunggakan += $menunggak;
}



$pdf->SetFont('Arial','B',9);
  $pdf->Cell(217,7, "TOTAL", 1, 0, 'C');
  $pdf->Cell(30,7, number_format($total_lunas), 1, 0, 'C');
  $pdf->Cell(30,7, number_format($total_tunggakan), 1, 0, 'C');

$pdf->Output();
?>