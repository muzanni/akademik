<div class="content-wrapper">
  <?php 
  function getNamaBulan($bulan) {
    $namaBulan = [
      1 => "Januari", 2 => "Februari", 3 => "Maret", 
      4 => "April", 5 => "Mei", 6 => "Juni", 
      7 => "Juli", 8 => "Agustus", 9 => "September", 
      10 => "Oktober", 11 => "November", 12 => "Desember"
    ];

    // Cek apakah parameter valid (antara 1 dan 12)
    if (isset($namaBulan[$bulan])) {
      return $namaBulan[$bulan];
    } else {
      return "Bulan tidak valid!";
    }
  }
  ?>
  <section class="content-header">
    <h1>
      Setoran SPP 
      <small>Data Pembayaran SPP dari Siswa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <?php 
    if(isset($_GET['alert'])){
      if($_GET['alert'] == "terima"){
        echo "<div class='alert alert-success text-center'><br>Pembayaran SPP telah diterima dan disimpan di data SPP Siswa.<br><br></div>";
      }else if($_GET['alert'] == "batal"){
        echo "<div class='alert alert-danger text-center'><br>Pembayaran SPP Telah Dibatalkan.<br><br></div>";
      }else if($_GET['alert'] == "hapus"){
        echo "<div class='alert alert-success text-center'><br>Setoran Pembayaran SPP Telah Dihapus.<br><br></div>";
      }
    }
    ?>

    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Setoran Pembayaran SPP</h3>            
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>TANGGAL BAYAR</th>
                    <th>NIS</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>BULAN</th>
                    <th>JUMLAH</th>
                    <th>STATUS</th>
                    <th>KONFIRMASI</th>
                    <th width="8%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  $setoran = $this->db->query("select * from setoran, siswa, angkatan, jurusan, kelas where kelas_id=setoran_kelas and siswa_jurusan=jurusan_id and setoran_angkatan=angkatan_id and setoran_siswa=siswa_id order by setoran_id DESC")->result();                  
                  foreach($setoran as $d){                   
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo date('d-m-Y', strtotime($d->setoran_tanggal)); ?></td>                      
                      <td><?php echo $d->siswa_nisn; ?></td>
                      <td><?php echo $d->siswa_nama; ?></td>
                      <td>
                          <?php echo $d->angkatan_nama; ?><br>
                          <?php echo $d->jurusan_nama; ?><br>
                          <b><?php echo $d->kelas_nama; ?></b>                            
                      </td>                      
                      <td><?php echo getNamaBulan($d->setoran_bulan); ?> <?php echo $d->setoran_tahun; ?></td>                   
                      <td><?php echo number_format($d->angkatan_spp); ?></td>                   
                      <td>
                        <?php if($d->setoran_status == "0"){ ?>
                          <span class="label label-warning">Menunggu Konfirmasi admin</span>
                        <?php }else if($d->setoran_status == "1"){ ?>
                          <span class="label label-danger">Ditolak</span>
                        <?php }else if($d->setoran_status == "2"){ ?>
                          <span class="label label-success">Diterima</span>
                        <?php } ?>
                      </td>                      
                      <td>
                        <form action="<?php echo base_url('dashboard/setoran_status') ?>" method="post">
                          <input type="hidden" name="id" value="<?php echo $d->setoran_id ?>">
                          <select class="form-control" name="status" onchange="this.form.submit()">
                            <option <?php if($d->setoran_status == "0"){ echo "selected='selected'"; } ?> value="0">Menunggu</option>
                            <option <?php if($d->setoran_status == "1"){ echo "selected='selected'"; } ?> value="1">Ditolak</option>
                            <option <?php if($d->setoran_status == "2"){ echo "selected='selected'"; } ?> value="2">Diterima</option>
                          </select>
                        </form>
                      </td>                      
                      <td>                       
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                          <i class="fa fa-image"></i> &nbsp Bukti Pembayaran
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                              </div>
                              <div class="modal-body">

                                <img src="<?php echo base_url('gambar/bukti/'.$d->setoran_bukti) ?>" class="img-responsive">

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <a target="_blank" class="btn btn-warning btn-xs" href="<?php echo base_url('dashboard/spp?nis='.$d->siswa_nisn) ?>"><i class="fa fa-eye"></i></a>
                        <a onclick="return confirm('Yakin ingin menghapus data ini? Pembayaran SPP ini akan dihapus.')" class="btn btn-danger btn-xs" href="<?php echo base_url('dashboard/setoran_hapus/'.$d->setoran_id) ?>"><i class="fa fa-trash"></i></a>                        
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