<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Kenaikan Kelas Siswa
      <small>Update Kenaikan Kelas Siswa</small>
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
            <h3 class="box-title">Data Siswa</h3>           
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>ANGKATAN</th>
                    <th>JURUSAN</th>
                    <th>KELAS</th>
                    <th>TGL.LAHIR</th>
                    <th>ALAMAT</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $data = $this->db->query("SELECT * FROM siswa, angkatan, jurusan, kelas where siswa_kelas=kelas_id and siswa_angkatan=angkatan_id and siswa_jurusan=jurusan_id order by siswa_id desc");
                  foreach($data->result() as $d){
                    $id_siswa = $d->siswa_id;
                    $nis_siswa = $d->siswa_nisn;
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->siswa_nisn; ?></td>
                      <td><?php echo $d->siswa_nama; ?></td>
                      <td><?php echo $d->angkatan_nama; ?></td>
                      <td><?php echo $d->jurusan_nama; ?></td>
                      <td><?php echo $d->kelas_nama; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($d->siswa_tgl_lahir)); ?></td>
                      <td><?php echo $d->siswa_status; ?></td>
                      <td>    

                        <?php 
                        $sekarang = $d->kelas_tingkat;
                        $ke = $sekarang+1;
                        ?>



                        <?php 
                        if($ke > 12){
                          $ke = "12";
                          ?>
                          <button type="button" class="btn btn-secondary btn-sm" disabled>
                            <i class="fa fa-circle"></i> &nbsp; KELAS 12
                          </button>
                          <?php
                        }else{
                          ?>
                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#naik_kelas_<?php echo $d->siswa_id ?>">
                            <i class="fa fa-arrow-circle-up"></i> &nbsp; NAIK KE KELAS <?php echo $ke ?>
                          </button>
                          <?php
                        }
                        ?>
                        

                        <form action="<?php echo base_url('dashboard/kenaikan_kelas_update') ?>" method="post">
                          <div class="modal fade" id="naik_kelas_<?php echo $d->siswa_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="exampleModalLabel">Kenaikan Kelas Siswa</h5>
                                </div>
                                <div class="modal-body">

                                  <?php 
                                  $angkatan = $d->angkatan_id;
                                  $jumlah_pembayaran = $this->db->query("select * from pembayaran where pembayaran_siswa='$id_siswa' and pembayaran_angkatan='$angkatan'");
                                  $jp = $jumlah_pembayaran->num_rows();
                                  $terbayar = $jp;
                                  $belum_terbayar = 12-$terbayar;                                  
                                  ?>

                                  <?php 
                                  if($jp < 12){
                                    ?>
                                    <div class="alert alert-warning text-center">
                                      SISWA INI BELUM MELUNASI SPP TAHUN INI ( <b>Tersisa <?php echo $belum_terbayar ?> bulan</b> ).
                                      <a class='btn btn-primary btn-sm' target="_blank" style="text-decoration:none;" href="<?php echo base_url('dashboard/spp') ?>?nis=<?php echo $nis_siswa ?>"><i class="fa fa-check"></i> Cek SPP</a>
                                    </div>
                                    <?php
                                  }else{
                                    ?>
                                    <div class="alert alert-success">
                                      SPP Tahun ini telah lunas.
                                    </div>
                                    <?php 
                                  }
                                  ?>

                                  <table class="table table-bordered">
                                    <tr>
                                      <th width="10%">NIS</th>
                                      <th width="1%">:</th>
                                      <td><?php echo $d->siswa_nisn ?></td>
                                    </tr>
                                    <tr>
                                      <th width="10%">Nama</th>
                                      <th width="1%">:</th>
                                      <td><?php echo $d->siswa_nama ?></td>
                                    </tr>
                                    <tr>
                                      <th width="10%">Jurusan</th>
                                      <th width="1%">:</th>
                                      <td><?php echo $d->jurusan_nama ?></td>
                                    </tr>
                                    <tr>
                                      <th width="10%">Kelas</th>
                                      <th width="1%">:</th>
                                      <td><?php echo $d->kelas_nama ?> | Tingkat <?php echo $d->kelas_tingkat ?></td>
                                    </tr>
                                    <tr>
                                      <th width="10%">Status</th>
                                      <th width="1%">:</th>
                                      <td><?php echo $d->siswa_status ?></td>
                                    </tr>
                                  </table>

                                  <?php 
                                  $angkatan_sekarang2 = $d->angkatan_id;

                                  $angkatan2 = $this->db->query("SELECT * FROM angkatan WHERE angkatan_id > '$angkatan_sekarang2' ORDER BY angkatan_id asc limit 1");
                                  if($angkatan2->num_rows() > 0){
                                    $a2 = $angkatan2->row();
                                    ?>


                                     <?php 
                                      if($jp == 12){
                                        ?>

                                        <div class="form-group" style="width:100%; margin-bottom: 5px;">

                                          <label>Tahun Ajaran Baru</label>
                                          <p class="text-small text-muted">                                      
                                            Angkatan sekarang : <b><?php echo $d->angkatan_nama ?></b>, jika naik kelas, ubah pada angkatan di bawah ini dengan angkatan baru (<?php echo $a2->angkatan_nama ?>)
                                          </p>
                                          <input type="hidden" name="siswa" value="<?php echo $d->siswa_id ?>">
                                          <select name="angkatan" class="form-control" required="required" style="width:100%">
                                            <option value="">- Pilih -</option>
                                            <?php 
                                            $angkatan_sekarang = $d->angkatan_id;
                                            $angkatan = $this->db->query("SELECT * FROM angkatan WHERE angkatan_id > '$angkatan_sekarang' ORDER BY angkatan_id asc limit 1");
                                            foreach($angkatan->result() as $k){
                                              ?>
                                              <option <?php if($d->siswa_angkatan == $k->angkatan_id){ echo "selected='selected'";} ?> value="<?php echo $k->angkatan_id; ?>"><?php echo $k->angkatan_nama; ?></option>
                                              <?php 
                                            }
                                            ?>
                                          </select>

                                        </div>

                                        <br>

                                        <div class="form-group" style="width:100%; margin-bottom: 5px;">
                                          <label>Naik Ke Kelas</label>
                                          <p class="text-small text-muted">
                                            Jika naik kelas, ubah kelas satu tingkat lebih tinggi (Tingkat <b><?php echo $ke ?></b>).                                      
                                          </p>
                                          <select name="kelas" class="form-control" required="required" style="width:100%">
                                            <option value="">- Pilih -</option>
                                            <?php 
                                            $tingkat_sekarang = $d->kelas_tingkat;
                                            $tingkat_sekarang2 = $tingkat_sekarang+1;
                                            $kelas = $this->db->query("SELECT * FROM kelas WHERE kelas_tingkat = '$tingkat_sekarang2' ORDER BY kelas_id ASC");
                                            foreach($kelas->result() as $k){
                                              ?>
                                              <option <?php if($d->siswa_kelas == $k->kelas_id){ echo "selected='selected'";} ?> value="<?php echo $k->kelas_id; ?>"><?php echo $k->kelas_nama; ?></option>
                                              <?php 
                                            }
                                            ?>
                                          </select>
                                        </div>

                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

                                          <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        <?php 
                                      }else{
                                        ?>

                                        <div class="alert alert-danger text-center">
                                          Siswa Ini Belum Melunasi SPP Tahun Ini. Belum bisa dinaikkan kelas.
                                        </div>

                                        <?php 
                                      }
                                      ?>

                                    <?php 
                                  }else{
                                    ?>

                                    <div class="alert alert-danger text-center">
                                      Tidak ada tahun ajaran baru. Silahkan Tambahkan Tahun Ajaran / Angkatan Baru
                                    </div>

                                    <?php 
                                  }
                                  ?>

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
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
