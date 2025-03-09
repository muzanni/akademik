<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan</small>
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
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
            <form method="get" action="">
              <div class="row">                

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Tahun Ajaran / Angkatan</label>
                    <select name="angkatan" class="form-control" required="required">
                      <option value="">- Pilih angkatan -</option>
                      <!-- <option value="semua">- Semua angkatan -</option> -->
                      <?php 
                      $angkatan = $this->db->query("SELECT * FROM angkatan");
                      foreach($angkatan->result() as $k){
                        ?>
                        <option <?php if(isset($_GET['angkatan'])){ if($_GET['angkatan'] == $k->angkatan_id){echo "selected='selected'";}} ?>  value="<?php echo $k->angkatan_id; ?>"><?php echo $k->angkatan_nama; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan SPP</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['angkatan'])){
              $angkatan = $_GET['angkatan'];
              ?>

              <div class="row">
                <div class="col-lg-6">

                  <table class="table table-bordered">                   
                    <tr>
                      <th width="30%">TAHUN AJARAN</th>
                      <th width="1%">:</th>
                      <td>
                        <?php 
                        if($angkatan == "semua"){
                          echo "SEMUA TAHUN AJARAN";
                        }else{
                          $k = $this->db->query("select * from angkatan where angkatan_id='$angkatan'");
                          $kk = $k->row();
                          echo $kk->angkatan_nama;
                        }
                        ?>
                      </td>
                    </tr>
                  </table>

                </div>
              </div>

              <a href="<?php echo base_url('dashboard/laporan_pdf') ?>?angkatan=<?php echo $angkatan ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>

              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%" rowspan="2">NO</th>
                      <th width="10%" rowspan="2" class="text-center">TAHUN AJARAN</th>
                      <th width="10%" rowspan="2" class="text-center">NAMA SISWA</th>
                      <th width="10%" rowspan="2" class="text-center">NISN</th>
                      <th width="10%" rowspan="2" class="text-center">KELAS</th>
                      <th width="10%" rowspan="2" class="text-center">JURUSAN</th>
                      <th width="10%" rowspan="2" class="text-center">SPP</th>
                      <th colspan="2" class="text-center">BULAN</th>
                      <th colspan="2" class="text-center">SUB TOTAL</th>
                    </tr>
                    <tr>
                      <th class="text-center">LUNAS</th>
                      <th class="text-center">TUNGGAKAN</th>                    
                      <th class="text-center">LUNAS</th>
                      <th class="text-center">TUNGGAKAN</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php                     
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
                      ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo $d->angkatan_nama; ?></td>
                        <td><?php echo $d->siswa_nama; ?></td>
                        <td><?php echo $d->siswa_nisn; ?></td>
                        <td><?php echo $d->kelas_nama; ?></td>
                        <td><?php echo $d->jurusan_nama; ?></td>
                        <td><?php echo number_format($d->angkatan_spp); ?></td>                      
                        <td class="text-center">
                          <?php 
                          $terbayar = $this->db->query("select * from pembayaran where pembayaran_siswa='$id_siswa' and pembayaran_angkatan='$id_angkatan'")->num_rows();
                          $bulan_lunas = $terbayar;
                          echo $bulan_lunas . " Bulan";
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          $bulan_menunggak = 12-$terbayar;
                          echo $bulan_menunggak . " Bulan";
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          $lunas = $bulan_lunas * $d->angkatan_spp;
                          echo number_format($lunas);
                          ?>
                        </td>
                        <td class="text-center">
                          <?php 
                          $menunggak = $bulan_menunggak * $d->angkatan_spp;
                          echo number_format($menunggak);
                          ?>
                        </tr>
                        <?php 
                        $total_lunas += $lunas;
                        $total_tunggakan += $menunggak;
                      }
                      ?>

                      <tr>
                        <th colspan="7" class="text-right">TOTAL</th>
                        <td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($total_lunas)." ,-"; ?></td>
                        <td class="text-center text-bold text-danger"><?php echo "Rp. ".number_format($total_tunggakan)." ,-"; ?></td>
                      </tr>
                    </tbody>
                  </table>



                </div>

                <?php 
              }else{
                ?>

                <div class="alert alert-info text-center">
                  Silahkan Filter Laporan Terlebih Dulu.
                </div>

                <?php
              }
              ?>

            </div>
          </div>
        </section>
      </div>
    </section>

  </div>