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

        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "sukses"){
            echo "<div class='alert alert-success text-center'><br><b>TERIMA KASIH</b><br>Pembayaran SPP telah terkirim. Silahkan tunggu verifikasi dari admin.<br><br></div>";
          }else if($_GET['alert'] == "gagal"){
            echo "<div class='alert alert-danger text-center'><br><b>MAAF</b><br>Pembayaran SPP Gagal dikirim. Pastikan anda mengupload bukti pembayaran yang benar.<br><br></div>";
          }
        }
        ?>


       <?php 
       
       $id_siswa = $this->session->userdata('id');        
       $siswa = $this->db->query("select * from siswa, jurusan, angkatan, kelas where siswa_id='$id_siswa' and siswa_jurusan=jurusan_id and siswa_angkatan=angkatan_id and siswa_kelas=kelas_id");
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
                <a target="_blank" href="<?php echo base_url('siswa/spp_rekap') ?>/<?php echo $id_siswa ?>/<?php echo $ss->angkatan_id ?>" class="btn btn-primary btn-sm">
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
                        <td><?php echo $no ?></td>
                        <td><?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                        <td>10 <?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                        <td><?php echo $c->pembayaran_no ?></td>
                        <td><?php echo date('d-m-Y', strtotime($c->pembayaran_tanggal)) ?></td>
                        <td><?php echo number_format($c->pembayaran_jumlah) ?></td>
                        <td>LUNAS</td>
                        <td>                           
                         <a target="_blank" href="<?php echo base_url('siswa/spp_cetak') ?>/<?php echo $c->pembayaran_id ?>" class="btn btn-warning btn-sm"><i class="fa fa-print"></i> BUKTI PEMBAYARAN</a>
                       </td>
                     </tr>
                     <?php
                   }else{
                    ?>
                    <tr>
                      <td><?php echo $no ?></td>
                      <td><?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                      <td>10 <?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                      <td></td>
                      <td></td>
                      <td><?php echo number_format($s->angkatan_spp) ?></td>
                      <td>BELUM LUNAS</td>
                      <td>

                        <?php 
                        // echo $bulan;                        
                        $cek = $this->db->query("select * from setoran where setoran_siswa='$id_siswa' and setoran_bulan='$bln' and setoran_tahun='$thn' and setoran_angkatan='$s->angkatan_id'");
                        $c = $cek->num_rows();
                        if($c > 0){
                          $ce = $cek->row();
                          $status = $ce->setoran_status;
                          
                          if($status == "0"){
                            echo "<span class='label label-warning'>Sedang menunggu konfirmasi admin</span>";
                          }else if($status == "1"){
                            echo "<span class='badge label-danger'>Pembayaran Ditolak,<br> Silahkan upload bukti pembayaran yang benar</span>";
                            ?>
                            <br>
                            <br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#siswaModal_<?php echo $bln ?>_<?php echo $thn ?>_<?php echo $no ?>">
                              Bayar
                            </button>
                            <?php
                          }
                          ?>

                          <?php
                        }else{
                          ?>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#siswaModal_<?php echo $bln ?>_<?php echo $thn ?>_<?php echo $no ?>">
                            Bayar
                          </button>
                          <?php
                        }                        
                        ?>

                        <!-- Modal -->
                        <form onsubmit="return confirm('Yakin ingin menginput pembayaran?')" method="POST" action="<?php echo base_url('siswa/spp_bayar') ?>" enctype="multipart/form-data">
                          <div class="modal fade" id="siswaModal_<?php echo $bln ?>_<?php echo $thn ?>_<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="siswaModalLabel">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h4 class="modal-title" id="siswaModalLabel">Upload bukti pembayaran SPP</h4>
                                </div>
                                <div class="modal-body">
                                  <input type="hidden" name="bulan" value="<?php echo $bln ?>">
                                  <input type="hidden" name="tahun" value="<?php echo $thn ?>">
                                  <input type="hidden" name="siswa" value="<?php echo $id_siswa ?>">
                                  <input type="hidden" name="kelas" value="<?php echo $s->siswa_kelas ?>">
                                  <input type="hidden" name="jumlah" value="<?php echo $s->angkatan_spp ?>">
                                  <input type="hidden" name="angkatan" value="<?php echo $s->angkatan_id ?>">

                                  <table class="table table-bordered">
                                    <tr>
                                      <th width="30%">BULAN / TAHUN</th>
                                      <td width="1%">:</td>
                                      <td><?php echo $bulan['bulan_nama'] ?> <?php echo $bulan['tahun'] ?></td>
                                    </tr>
                                    <tr>
                                      <th>BUKTI PEMBAYARAN</th>
                                      <td>:</td>
                                      <td><input type="file" name="bukti" required="required"><br><i>Upload file gambar</i></td>
                                    </tr>                                   
                                  </table>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">BAYAR</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </form>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>

                  <?php 
                  $no++;
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

    ?>



  </section>
</div>
</section>

</div>