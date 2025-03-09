<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Siswa
      <small>Data Siswa</small>
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
            <h3 class="box-title">Siswa</h3>
            <a href="<?php echo base_url('dashboard/siswa_tambah') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Pengguna Baru</a>              
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
                    <th>TEMPAT LAHIR</th>
                    <th>ALAMAT</th>
                    <th>STATUS</th>
                    <th width="8%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach($siswa as $d){
                   
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->siswa_nisn; ?></td>
                      <td><?php echo $d->siswa_nama; ?></td>
                      <td><?php echo $d->angkatan_nama; ?></td>
                      <td><?php echo $d->jurusan_nama; ?></td>
                      <td><?php echo $d->kelas_nama; ?></td>                      
                      <td><?php echo $d->siswa_tgl_lahir; ?></td>                      
                      <td><?php echo $d->siswa_tempat_lahir; ?></td>                      
                      <td><?php echo $d->siswa_alamat; ?></td>                      
                      <td><?php echo $d->siswa_status; ?></td>                      
                      <td>                        
                        <a class="btn btn-warning btn-xs" href="<?php echo base_url('dashboard/siswa_edit/'.$d->siswa_id) ?>"><i class="fa fa-cog"></i></a>
                        <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-xs" href="<?php echo base_url('dashboard/siswa_hapus/'.$d->siswa_id) ?>"><i class="fa fa-trash"></i></a>                        
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