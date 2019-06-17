<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $page_name ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row"> 
  <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?php echo $data_testing_count ?></h3>

          <p>Data Testing</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="<?php echo site_url("admin/data_testing") ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3><?php echo $data_uji_count ?><sup style="font-size: 20px"></sup></h3>

          <p>Data Uji</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="<?php echo site_url("admin/data_uji") ?>" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
    <!-- ./col -->
    <!-- <div class="col-lg-3 col-xs-6">
      <div class="small-box bg-red">
        <div class="inner">
          <h3>65</h3>

          <p>Tidak diterima</p>
        </div>
        <div class="icon">
          <i class="fa fa-hand-paper-o"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div> -->
    <!-- ./col -->
  </div>
  </section>
<!-- /.content -->
</div>