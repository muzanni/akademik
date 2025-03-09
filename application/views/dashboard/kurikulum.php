<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Kurikulum
      <small>Data Kurikulum</small>
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
            <h3 class="box-title">Kurikulum</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Kurikulum
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="<?php echo base_url('dashboard/kurikulum_aksi') ?>" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Kurikulum</h5>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Kurikulum</label>
                        <input type="text" name="kurikulum" required="required" class="form-control">
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


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>KURIKULUM</th>
                    <th>STATUS</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                  
                  $no=1;                  
                  foreach($kurikulum as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->nama_kurikulum; ?></td>
                      <td><?php echo $d->is_aktif; ?></td>
                      <td>    
                      
                       <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_jurusan_<?php echo $d->id_kurikulum ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_jurusan_<?php echo $d->id_kurikulum ?>">
                        <i class="fa fa-trash"></i>
                      </button>

                        <form action="<?php echo base_url('dashboard/jurusan_update') ?>" method="post">
                          <div class="modal fade" id="edit_jurusan_<?php echo $d->id_kurikulum ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="exampleModalLabel">Edit jurusan</h5>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Nama jurusan</label>
                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d->id_kurikulum; ?>">
                                    <input type="text" name="jurusan" required="required" class="form-control" placeholder="Misal : 1 TKJ 1 .." value="<?php echo $d->jurusan_nama; ?>" style="width:100%">
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

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_jurusan_<?php echo $d->id_kurikulum ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>
                                <p>SEMUA DATA YANG BERHUBUNGAN AKAN IKUT DIHAPUS</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="<?php echo base_url('dashboard/jurusan_hapus/'.$d->id_kurikulum) ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

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