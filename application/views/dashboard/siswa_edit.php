<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Siswa
      <small>Edit Siswa</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-8">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Siswa</h3>
            <a href="<?php echo base_url('dashboard/siswa') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
          </div>
          <form action="<?php echo base_url('dashboard/siswa_update') ?>" method="post" enctype="multipart/form-data">

            <?php 
            foreach($data as $d){
              ?>

              <div class="box-body">

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="nama">Nama</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $d->siswa_id ?>" required="required">
                    <input type="text" class="form-control" name="nama" value="<?php echo $d->siswa_nama ?>" id="nama" placeholder="Masukkan Nama" required="required">
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="nisn">NISN</label>
                    <input type="number" class="form-control" name="nisn" value="<?php echo $d->siswa_nisn ?>" id="nisn" placeholder="Masukkan NISN" required="required">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <label for="jk">Jenis Kelamin</label>
                    <select class="form-control" name="jk" id="jk" required="required">
                      <option value="">Pilih</option>
                      <option <?php if($d->siswa_jk == "Laki-laki"){ echo "selected='selected'"; } ?> value="Laki-laki">Laki-laki</option>
                      <option <?php if($d->siswa_jk == "Perempuan"){ echo "selected='selected'"; } ?> value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $d->siswa_tgl_lahir ?>" id="tgl_lahir" required="required">
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $d->siswa_tempat_lahir ?>" id="tempat_lahir" placeholder="Masukkan Nama Kota" required="required">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <label for="angkatan">Angkatan</label>
                    <select class="form-control" name="angkatan" id="angkatan" required="required">
                      <option value="">-Pilih</option>
                      <?php foreach($angkatan as $a){ ?>
                        <option <?php if($a->angkatan_id == $d->siswa_angkatan){ echo "selected='selected'"; } ?> value="<?php echo $a->angkatan_id ?>"><?php echo $a->angkatan_nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="jurusan">Jurusan</label>
                    <select class="form-control" name="jurusan" id="jurusan" required="required">
                      <option value="">-Pilih</option>
                      <?php foreach($jurusan as $a){ ?>
                        <option <?php if($a->jurusan_id == $d->siswa_jurusan){ echo "selected='selected'"; } ?> value="<?php echo $a->jurusan_id ?>"><?php echo $a->jurusan_nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-lg-4">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" name="kelas" id="kelas" required="required">
                      <option value="">-Pilih</option>
                      <?php foreach($kelas as $a){ ?>
                        <option <?php if($a->kelas_id == $d->siswa_kelas){ echo "selected='selected'"; } ?> value="<?php echo $a->kelas_id ?>"><?php echo $a->kelas_nama ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="agama">Agama</label>
                  <select class="form-control" name="agama" id="agama" required="required">
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $d->siswa_alamat ?>" placeholder="Masukkan Alamat" required="required">
                </div>
                <div class="form-group">
                  <label for="hp">Nomor HP</label>
                  <input type="number" class="form-control" name="hp" id="hp" value="<?php echo $d->siswa_hp ?>" placeholder="Masukkan Nomor HP" required="required">
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $d->siswa_username ?>" placeholder="Masukkan Username" required="required">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
                  <small><i>Kosongkan jika tidak ingin di ganti</i></small>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" id="status" required="required">
                    <option value="">-Pilih</option>
                    <option <?php if($d->siswa_status == "Aktif"){ echo "selected='selected'"; } ?> value="Aktif">Aktif</option>
                    <option <?php if($d->siswa_status == "Pindah"){ echo "selected='selected'"; } ?> value="Pindah">Pindah</option>
                    <option <?php if($d->siswa_status == "Tamat"){ echo "selected='selected'"; } ?> value="Tamat">Tamat</option>
                  </select>
                </div>
              </div>

              <div class="box-footer">
                <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
              </div>

              <?php
            }
            ?>

          </form>

        </div>
      </section>
    </div>
  </section>

</div>

<link rel="stylesheet" type="text/css" href="">