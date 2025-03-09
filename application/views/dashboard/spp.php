<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Pembayaran SPP
      <small>Data Pembayaran SPP</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Input Pembayaran SPP</h3>           
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="" method="get">

              <div class="row">              
               <div class="col-lg-5 col-lg-offset-3">
                 <div class="form-group">
                   <input type="number" name="nis" value="<?php if(isset($_GET['nis'])){ echo $_GET['nis']; } ?>" required="required" class="form-control" placeholder="Masukkan NIS">
                 </div>
               </div>
               <div class="col-lg-1">
                 <div>
                   <button type="submit" class="btn btn-primary">Cari</button>
                 </div>
               </div>
             </div>

           </form>

         </div>
       </div>



       <?php 
       if(isset($_GET['nis'])){
        $nis = $_GET['nis'];
        $siswa = $this->db->query("select * from siswa, jurusan, angkatan, kelas where siswa_nisn='$nis' and siswa_jurusan=jurusan_id and siswa_angkatan=angkatan_id and siswa_kelas=kelas_id");
        $cek = $siswa->num_rows();
        if($cek > 0){
          $s = $siswa->row();
          ?>

          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Biodata Siswa</h3>           
            </div>
            <div class="box-body">

              <table class="table table-bordered">
                <tr>
                  <th width="10%">NIS</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->siswa_nisn ?></td>
                </tr>
                <tr>
                  <th width="10%">Nama</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->siswa_nama ?></td>
                </tr>
                <tr>
                  <th width="10%">Angkatan</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->angkatan_nama ?></td>
                </tr>
                <tr>
                  <th width="10%">Jurusan</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->jurusan_nama ?></td>
                </tr>
                <tr>
                  <th width="10%">Kelas</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->kelas_nama ?></td>
                </tr>
                <tr>
                  <th width="10%">Alamat</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->siswa_alamat ?></td>
                </tr>
                <tr>
                  <th width="10%">Status</th>
                  <th width="1%">:</th>
                  <td><?php echo $s->siswa_status ?></td>
                </tr>
              </table>

            </div>
          </div>






          <?php 
          $id_siswa = $s->siswa_id;
          $spp = $this->db->query("select * from siswa_kelas, angkatan, kelas where sk_siswa='$id_siswa' and sk_angkatan=angkatan_id and sk_kelas=kelas_id order by angkatan_id desc")->result();
          foreach($spp as $ss){

            $angkatan = $ss->angkatan_nama;
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
            ?>

            <div class="box box-info">
              <div class="box-header">
                <h3 class="box-title">Data Pembayaran SPP Kelas <b><?php echo $ss->kelas_nama ?> [ <?php echo $ss->angkatan_nama ?> ]</b></h3>           
                <div class="btn-group pull-right">            
                  <a target="_blank" href="<?php echo base_url('dashboard/spp_rekap') ?>/<?php echo $id_siswa ?>/<?php echo $ss->angkatan_id ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-print"></i> &nbsp Cetak Rekap SPP
                  </a>
                </div>
              </div>
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <tr>
                      <th>No</th>
                      <th>Bulan</th>
                      <th>Jatuh Tempo</th>
                      <th>No Bayar</th>
                      <th>Tgl Bayar</th>
                      <th>Jumlah</th>
                      <th>Keterangan</th>
                      <th width="15%">Opsi</th>
                    </tr>
                    <?php 
                    $no = 1;
                    foreach($arr_bulan_tahun as $bulan){
                      $status = "";
                      $bln = $bulan['bulan'];
                      $thn = $bulan['tahun'];
                      $cek_spp = $this->db->query("select * from pembayaran where pembayaran_bulan='$bln' and pembayaran_tahun='$thn' and pembayaran_siswa='$id_siswa'");
                      $cek = $cek_spp->num_rows();
                      if($cek > 0){
                        $c = $cek_spp->row();
                        ?>
                        <tr class="alert-success">
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                          <td>10 <?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                          <td><?php echo $c->pembayaran_no ?></td>
                          <td><?php echo date('d-m-Y', strtotime($c->pembayaran_tanggal)) ?></td>
                          <td><?php echo number_format($c->pembayaran_jumlah) ?></td>
                          <td>LUNAS</td>
                          <td>
                           <a onclick="return confirm('Yakin ingin membatalkan pembayaran?')" href="<?php echo base_url('dashboard/spp_bayar_batal') ?>/<?php echo $c->pembayaran_id ?>" class="btn btn-danger btn-sm">BATAL</a>
                           <a target="_blank" href="<?php echo base_url('dashboard/spp_cetak') ?>/<?php echo $c->pembayaran_id ?>" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> CETAK</a>
                         </td>
                       </tr>
                       <?php
                     }else{
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                        <td>10 <?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                        <td></td>
                        <td></td>
                        <td><?php echo number_format($s->angkatan_spp) ?></td>
                        <td>BELUM LUNAS</td>
                        <td>
                         <form onsubmit="return confirm('Yakin ingin menginput pembayaran?')" method="POST" action="<?php echo base_url('dashboard/spp_bayar') ?>">
                           <input type="hidden" name="bulan" value="<?php echo $bln ?>">
                           <input type="hidden" name="tahun" value="<?php echo $thn ?>">
                           <input type="hidden" name="siswa" value="<?php echo $id_siswa ?>">
                           <input type="hidden" name="kelas" value="<?php echo $s->siswa_kelas ?>">
                           <input type="hidden" name="jumlah" value="<?php echo $s->angkatan_spp ?>">
                           <input type="hidden" name="angkatan" value="<?php echo $s->angkatan_id ?>">
                           <button type="submit" class="btn btn-primary btn-sm">BAYAR</button>
                         </form>
                       </td>
                     </tr>
                     <?php
                   }
                   ?>

                   <?php 
                 }
                 ?>
               </table>
             </div>


           </div>
         </div>


         <?php
       }
       ?>

       <?php 
     }else{
      ?>
      <div class="alert alert-danger text-center text-bold">
        NIS Siswa tidak ditemukan.
      </div>
      <?php
    }
  }
  ?>



</section>
</div>
</section>

</div>