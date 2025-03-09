
<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>


  <section class="content">

    



















    <!-- /.row -->
    <!-- Main row -->
    <div class="row">




      <section class="col-lg-6">


       <div class="box box-info">

        <div class="box-header">
          <h3 class="box-title">Profil Siswa</h3>         
        </div>

        <?php 
        foreach($siswa as $d){
          ?>

          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th width="20%">Nama</th>
                  <td width="1%">:</td>
                  <td><?php echo $d->siswa_nama; ?></td>
                </tr>
                <tr>
                  <th>NISN</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_nisn; ?></td>
                </tr>
                <tr>
                  <th>Jenis Kelamin</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_jk; ?></td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_tgl_lahir; ?></td>
                </tr>
                <tr>
                  <th>Tempat Lahir</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_tempat_lahir; ?></td>
                </tr>
                <tr>
                  <th>Angkatan</th>
                  <td>:</td>
                  <td><?php echo $d->angkatan_nama; ?></td>
                </tr>
                <tr>
                  <th>Jurusan</th>
                  <td>:</td>
                  <td><?php echo $d->jurusan_nama; ?></td>
                </tr>
                <tr>
                  <th>Kelas</th>
                  <td>:</td>
                  <td><?php echo $d->kelas_nama; ?></td>
                </tr>
                <tr>
                  <th>Agama</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_agama; ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_alamat; ?></td>
                </tr>
                <tr>
                  <th>Nomor HP</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_hp; ?></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_username; ?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>:</td>
                  <td><?php echo $d->siswa_status; ?></td>
                </tr>
              </table>

            </div>
          </div>



          <?php
        }
        ?>

      </div>


    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->










</section>

</div>

