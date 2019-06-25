<section class="content-header">
  <h1>
    Dashboard
    <small>Home</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!-- Main content -->

<section class="content">
  <?= $this->session->flashdata('msgbox');?>
  <div class="jumbotron">
    <center>
      <h1 class="display-4">Selamat Datang!</h1>
      <p class="lead">Di Aplikasi Terpadu, Terima kasih!</p>
    </center>
  </div>
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>Total : <?= $data1;?></h3>

          <p><?= $title1;?></p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>Total : <?= $data2;?></h3>

          <p><?= $title2;?></p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <?php if($this->session->userdata('level') !='lapas'){?>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
        <h3>Bon : <?= $bon;?></h3>

        <p><?= $title_bon;?></p>
        </div>
        <div class="icon">
        <i class="ion ion-ios-pricetag-outline"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>APL : <?= $apl;?></h3>
          <p><?= $title_apl;?></p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  <?php } ?>
  </div>

</section>
  