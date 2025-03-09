<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Admin
      <small>Data Admin</small>
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
            <h3 class="box-title">Admin</h3>
            <a href="<?php echo base_url('dashboard/admin_tambah') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-plus"></i> &nbsp Tambah Pengguna Baru</a>              
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th>LEVEL</th>
                    <th width="15%">FOTO</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $no=1;
                  foreach($admin as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->admin_nama; ?></td>
                      <td><?php echo $d->admin_username; ?></td>
                      <td><?php echo $d->admin_level; ?></td>
                      <td>
                        <center>
                          <?php if($d->admin_foto == ""){ ?>
                            <img src="../gambar/sistem/user.png" style="width: 30px;height: auto">
                          <?php }else{ ?>
                            <img src="../gambar/admin/<?php echo $d->admin_foto ?>" style="width: 30px;height: auto">
                          <?php } ?>
                        </center>
                      </td>
                      <td>                        
                        <a class="btn btn-warning btn-sm" href="<?php echo base_url('dashboard/admin_edit/'.$d->admin_id) ?>"><i class="fa fa-cog"></i></a>
                        <?php if($d->admin_id != 1){ ?>
                          <a onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm" href="<?php echo base_url('dashboard/admin_hapus/'.$d->admin_id) ?>"><i class="fa fa-trash"></i></a>
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