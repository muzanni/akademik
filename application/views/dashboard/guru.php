<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Guru
      <small>Data Guru</small>
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
            <h3 class="box-title">Guru</h3>
            <a href="<?php echo base_url('dashboard/guru_tambah') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Guru Baru</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NUPTK</th>
                    <th>NAMA</th>
                    <th>KELAMIN</th>
                    <th>AGAMA</th>
                    <th>TEMPAT/TGL LAHIR</th>                    
                    <th>TELEPON</th>
                    <th>EMAIL</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach($guru as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->nuptk; ?></td>
                      <td><?php echo $d->nama_guru; ?></td>
                      <td><?php if($d->gener="L"){echo "Laki-Laki"; }else{echo "Perempuan";} ?></td>
                      <td><?php echo $d->agama; ?></td>
                      <td><?php echo $d->tempat_lahir; ?>/ <?php echo $d->tgl_lahir; ?></td>
                      <td><?php echo $d->telepon; ?></td>
                      <td><?php echo $d->email; ?></td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url('dashboard/admin_edit/'.$d->id_guru) ?>"><i class="fa fa-cog"></i></a>
                        <?php if($d->id_guru != 1){ ?>
                          <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="<?php echo base_url('dashboard/admin_hapus/'.$d->id_guru) ?>"><i class="fa fa-trash"></i></a>
                        <?php } ?>
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