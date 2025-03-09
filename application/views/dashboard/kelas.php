<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Kelas
      <small>Data Kelas</small>
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
            <h3 class="box-title">Kelas</h3>
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Kelas
              </button>
            </div>
          </div>
          <div class="box-body">

            <!-- Modal -->
            <form action="<?php echo base_url('dashboard/kelas_aksi') ?>" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Kode Kelas</label>
                        <input type="text" name="kode" required="required" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="kelas" required="required" class="form-control" placeholder="Misal : 1 TKJ 1 ..">
                      </div>

                      <div class="form-group">
                        <label>Tingkat</label>
                        <select class="form-control" name="tingkat"> 
                          <?php 
                          foreach ($tingkatan as $t) {
                            ?>
                            <option value="<?php echo $t->id_tingkatan ?>"><?php echo $t->kd_tingkatan ?></option>
                            <?php
                          }
                          ?>
                        </select>                        
                      </div>

                       <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" required="required" class="form-control" placeholder="TKJ 1">
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
                    <th>KODE KELAS</th>
                    <th>NAMA KELAS</th>
                    <th>TINGKAT</th>
                    <th>JURUSAN</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php                  
                  $no=1;
                  $data = $this->db->query("SELECT k.*, t.nama_tingkatan, t.kd_tingkatan FROM tbl_kelas k JOIN tbl_tingkatan_kelas t ON k.id_tingkatan = t.id_tingkatan ORDER BY k.id_kelas ASC")->result();
                  foreach($data as $d){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d->kd_kelas; ?></td>
                      <td><?php echo $d->nama_kelas; ?></td>
                      <td><?php echo $d->kd_tingkatan; ?> (<?php echo $d->nama_tingkatan; ?>)</td>
                      <td><?php echo $d->kd_jurusan; ?></td>
                      <td>    
                      
                       <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_kelas_<?php echo $d->id_kelas ?>">
                        <i class="fa fa-cog"></i>
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_kelas_<?php echo $d->id_kelas ?>">
                        <i class="fa fa-trash"></i>
                      </button>

                        <form action="<?php echo base_url('dashboard/kelas_update') ?>" method="post">
                          <div class="modal fade" id="edit_kelas_<?php echo $d->id_kelas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <h5 class="modal-title" id="exampleModalLabel">Edit kelas</h5>
                                </div>
                                <div class="modal-body">

                                   <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Kode kelas</label>
                                    <input type="hidden" name="id" required="required" class="form-control" value="<?php echo $d->id_kelas; ?>">
                                    <input type="text" name="kode" required="required" class="form-control" value="<?php echo $d->kd_kelas; ?>" style="width:100%">
                                  </div>


                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Nama kelas</label>                                    
                                    <input type="text" name="kelas" required="required" class="form-control" placeholder="Misal : 1 TKJ 1 .." value="<?php echo $d->nama_kelas; ?>" style="width:100%">
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Tingkat</label>                                    
                                    <select class="form-control" name="tingkat" style="width:100%;margin-bottom: 10px;"> 
                                      <?php 
                                      foreach ($tingkatan as $t) {
                                        ?>
                                        <option <?php if($t->id_tingkatan==$d->id_tingkatan){echo "selected='selected'";} ?> value="<?php echo $t->id_tingkatan ?>"><?php echo $t->kd_tingkatan ?></option>
                                        <?php
                                      }
                                      ?>
                                    </select> 
                                  </div>

                                  <div class="form-group" style="width:100%;margin-bottom: 10px;">
                                    <label>Kode Jurusan</label>                                    
                                    <input type="text" name="jurusan" required="required" class="form-control"  value="<?php echo $d->kd_jurusan; ?>" style="width:100%">
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
                        <div class="modal fade" id="hapus_kelas_<?php echo $d->id_kelas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <a href="<?php echo base_url('dashboard/kelas_hapus/'.$d->id_kelas) ?>" class="btn btn-primary">Hapus</a>
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