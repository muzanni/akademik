
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

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $jumlah = $this->db->query("select * from kelas")->num_rows();
            ?>
            <h3 style="font-weight: bolder"><?php echo $jumlah ?></h3>
            <p>Jumlah Kelas</p>
          </div>
          <div class="icon">
            <i class="ion ion-folder"></i>
          </div>
          <a href="<?php echo base_url('dashboard/kelas') ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>


      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $jumlah = $this->db->query("select * from jurusan")->num_rows();
            ?>
            <h3 style="font-weight: bolder"><?php echo $jumlah ?></h3>
            <p>Jumlah jurusan</p>
          </div>
          <div class="icon">
            <i class="ion ion-folder"></i>
          </div>
          <a href="<?php echo base_url('dashboard/jurusan') ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $jumlah = $this->db->query("select * from angkatan")->num_rows();
            ?>
            <h3 style="font-weight: bolder"><?php echo $jumlah ?></h3>
            <p>Jumlah Angkatan / Tahun Ajaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-folder"></i>
          </div>
          <a href="<?php echo base_url('dashboard/angkatan') ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $jumlah = $this->db->query("select * from siswa")->num_rows();
            ?>
            <h3 style="font-weight: bolder"><?php echo $jumlah ?></h3>
            <p>Jumlah Siswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo base_url('dashboard/siswa') ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $jumlah = $this->db->query("select sum(pembayaran_jumlah) as total from pembayaran")->row();
            ?>
            <h3 style="font-weight: bolder"><?php echo number_format($jumlah->total) ?></h3>
            <p>Total SPP Terbayar</p>

          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a href="<?php echo base_url('dashboard/laporan') ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

       <div class="col-lg-6 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $total = 0;
            $total_terbayar = $jumlah->total;
            $jumlah2 = $this->db->query("select * from angkatan, siswa_kelas where sk_angkatan=angkatan_id")->result();
            foreach($jumlah2 as $j){
                $spp = $j->angkatan_spp;
                $total_spp_persiswa = $spp*12;
                $total+=$total_spp_persiswa;
            }
            ?>
            <h3 style="font-weight: bolder"><?php echo number_format($total-$total_terbayar) ?></h3>
            <p>Total Tunggakan Seluruh Siswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-cash"></i>
          </div>
          <a href="<?php echo base_url('dashboard/laporan') ?>" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      


    
    </div>






  </section>

</div>

