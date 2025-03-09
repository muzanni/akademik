<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Admin
      <small>Edit Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-6">       
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Edit Admin</h3>
            <a href="<?php echo base_url('dashboard/admin') ?>" class="btn btn-info btn-sm pull-right"><i class="fa fa-reply"></i> &nbsp; Kembali</a> 
          </div>
          <div class="box-body">
            <form action="<?php echo base_url('dashboard/admin_update') ?>" method="post" enctype="multipart/form-data">
              <?php 

              foreach($data as $d){
                ?>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?php echo $d->admin_nama ?>" required="required">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $d->admin_id ?>" required="required">
                </div>

                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $d->admin_username ?>" required="required">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" min="5" placeholder="Kosong Jika tidak ingin di ganti">
                  <p>Kosong Jika tidak ingin di ganti</p>
                </div>

                <div class="form-group">
                  <label>Level</label>
                  <select class="form-control" name="level">
                    <option <?php if($d->admin_level=="Admin"){echo "selected='selected'";} ?> value="Admin">Admin</option>
                    <option <?php if($d->admin_level=="Kepala Sekolah"){echo "selected='selected'";} ?> value="Kepala Sekolah">Kepala Sekolah</option>
                    <option <?php if($d->admin_level=="Operator"){echo "selected='selected'";} ?> value="Operator">Operator</option>
                  </select>              
                </div>
           
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto">
                  <p>Kosong Jika tidak ingin di ganti</p>
                </div>

                <div class="form-group">
                  <input type="submit" class="btn btn-sm btn-primary" value="Simpan">
                </div>
                <?php
              }

              ?>
              
            </form>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>