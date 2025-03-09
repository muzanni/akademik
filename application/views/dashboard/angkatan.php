<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Angkatan
      <small>Data Angkatan</small>
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
            <h3 class="box-title">Angkatan</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Angkatan
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="<?php echo base_url('dashboard/angkatan_aksi') ?>" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Angkatan</h5>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Angkatan</label>
                        <input type="text" name="angkatan" required="required" class="form-control" placeholder="Misal : 2024/2025 ..">
                      </div>

                      <div class="form-group">
                        <label>Biaya SPP</label>
                        <input type="number" name="spp" required="required" class="form-control" placeholder="Misal : 200000">
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
                    <th>NAMA ANGKATAN</th>
                    <th>BIAYA SPP</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                  
                  $no=1;
                  $data = $this->db->query("SELECT * FROM angkatan ORDER BY angkatan_id ASC")->result();
                  foreach($data as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->angkatan_nama; ?></td>
                      <td><?php echo "Rp.".number_format($d->angkatan_spp); ?></td>
                      <td>    
                      
                       <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_angkatan_<?php echo $d->angkatan_id ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_angkatan_<?php echo $d->angkatan_id ?>">
                        <i class="fa fa-trash"></i>
                      </button>

                        <form action="<?php echo base_url('dashboard/angkatan_update') ?>" method="post">
                          <div class="modal fade" id="edit_angkatan_<?php echo $d->angkatan_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="exampleModalLabel">Edit angkatan</h5>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Nama Angkatan</label>
                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d->angkatan_id; ?>">
                                    <input type="text" name="angkatan" required="required" class="form-control" placeholder="Misal : 2024/2025 .." value="<?php echo $d->angkatan_nama; ?>" style="width:100%">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Tingkat</label>                                    
                                    <input type="number" name="spp" required="required" class="form-control" placeholder="Misal : 200000 .." value="<?php echo $d->angkatan_spp; ?>" style="width:100%">
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
                        <div class="modal fade" id="hapus_angkatan_<?php echo $d->angkatan_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="<?php echo base_url('dashboard/angkatan_hapus/'.$d->angkatan_id) ?>" class="btn btn-primary">Hapus</a>
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