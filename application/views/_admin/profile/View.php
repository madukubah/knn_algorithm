<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!-- alert  -->
<?php
  if($this->session->flashdata('info')){
      if( $this->session->flashdata('info')['from'] ){
          echo"
          <div class=' alert alert-success alert-dismissible'>
          <h4><i class='icon fa fa-globe'></i> Information!</h4>".
          $this->session->flashdata('info')["message"].
          "</div>
          ";
      }else{
          echo"
          <div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
          <h4><i class='icon fa fa-ban'></i> Alert!</h4>".
          $this->session->flashdata('info')["message"].
          "</div>
          ";
      }
    }
  ?>
<!-- alert  -->

<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row"> 
  <div class="col-xs-12">
      <?php if( !empty($user) ): ?>
        <div class="row">
          <div class="col-xs-6"> 
            <h2><?php echo $user[0]->user_profile_fullname ." ( ".$user[0]->user_username." ) "  ?> </h2>
            <h4> Alamat : <?php echo $user[0]->user_profile_address ?> </h4>
            <h4> <?php echo $user[0]->user_profile_email ?> </h4>
            <h4> <?php echo $user[0]->user_profile_phone ?> </h4>
            <br><br>
            <a href="<?php echo site_url('admin/profile/edit') ?>" class="btn btn-white btn-info btn-bold btn-m">
                Edit 
            </a>
        </div>
        <div class="col-xs-6"> 
          <center>
              <div style="background-color: grey ; padding : 8px">
              <img src="<?php echo base_url()."upload/user/".$user[0]->user_profile_image_path  ?>" alt="" height="300" width="auto" >
              </div>
            </center>
          </div>
        </div>
        <?php endif; ?>
      </div>
  </div>
</section>
<!-- /.content -->
</div>