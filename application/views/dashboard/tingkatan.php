<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Tingkatan
      <small>Data Tingkatan</small>
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
            <h3 class="box-title">Tingkatan</h3>            
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>KODE TINGKATAN</th>
                    <th>NAMA TINGKATAN</th>                    
                    <th width="1%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                  
                  $no=1;
                  $data = $this->db->query("SELECT * FROM tbl_tingkatan_kelas ORDER BY id_tingkatan ASC")->result();
                  foreach($data as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->kd_tingkatan; ?></td>
                      <td><?php echo $d->nama_tingkatan; ?></td>
                      <td>    
                      
                       <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_kelas_<?php echo $d->id_tingkatan ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                        <form action="<?php echo base_url('dashboard/tingkatan_update') ?>" method="post">
                          <div class="modal fade" id="edit_kelas_<?php echo $d->id_tingkatan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Tingkatan</h5>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Kode Tingkatan</label>
                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d->id_tingkatan; ?>">
                                    <input type="text" name="kode" required="required" class="form-control"  value="<?php echo $d->kd_tingkatan; ?>" style="width:100%">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Nama Tingkatan</label>                                    
                                    <input type="text" name="nama" required="required" class="form-control"  value="<?php echo $d->nama_tingkatan; ?>" style="width:100%">
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
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