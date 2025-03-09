<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Angkatan / Tahun Ajaran
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
           
          </div>
          <div class="box-body">

            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>NAMA ANGKATAN</th>
                    <th>BIAYA SPP</th>
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