<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Archive</title>
    <meta name="description" content="Kominfo HaloSultra" />
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/logo/logots.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  </head>
  <body class="login-layout light-login">
    <div class="main-container">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <br><br>
                <h2>
                  <!-- <img src="<?php echo base_url();?>assets/images/logo.svg" height="50px"> -->
                  <!-- <span class="blue">Ar</span> -->
                  <span class="" style="color: #eab402" id="id-text2">Co-Kost</span>
                </h2>
              </div>
              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <?php
                        if($this->session->flashdata('login')){
                          if( $this->session->flashdata('login')['from'] ){
                              echo"
                            <div class='alert alert-info alert-dismissible'>
                              <h4><i class='icon fa fa-globe'></i> Information!</h4>".
                              $this->session->flashdata('login')["message"].
                            "</div>
                            ";
                          }else{
                            echo"
                            <div class='alert alert-danger alert-dismissible'>
                              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                              <h4><i class='icon fa fa-ban'></i> Alert!</h4>".
                              $this->session->flashdata('login')["message"].
                              "</div>
                            ";
                          }
                        }else{
                          echo"
                          <div class='alert alert-info alert-dismissible'>
                            <h4><i class='icon fa fa-globe'></i> Information!</h4>
                            Please Sign In to Start Your Session
                          </div>
                          ";
                        }
                      ?>
                      <?php echo form_open("user/login");?>
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" placeholder="Username" name="user_username"/>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" placeholder="Password" name="user_password" />
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>
                          <div class="space"></div>
                          <div class="clearfix">
                            <label class="inline">
                              <input type="checkbox" class="ace" />
                              <span class="lbl"> Remember Me</span>
                            </label>
                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-key"></i>
                            <span class="bigger-110">Login</span>
                            </button>
                          </div>
                          <div class="space-4"></div>
                        </fieldset>
                      <?php echo form_close(); ?>
                      <div class="lbl" >belum punya akun?? 
                          <a href="<?php echo site_url('user/register')?>">klik</a>
                      </div>
                      <div class="social-or-login center">
                        <span class="bigger-110">Powered By</span>
                      </div>
                      <div class="space-6"></div>
                      <div class="social-login center">
                        <!-- <img src="<?php echo base_url()?>assets/images/logo/kominfo.png" height="40px"> -->
                        <img src="<?php echo base_url()?>assets/images/logo/logots.png" height="60px">
                        <!-- <img src="<?php echo base_url()?>assets/images/logo/pemprov.png" height="45spx">
                        <img src="<?php echo base_url()?>assets/images/logo/halosultra.jpg" height="45spx"> -->
                      </div>
                    </div>
                    <!-- /.widget-main -->
                  </div>
                  <!-- /.widget-body -->
                </div>
                <!-- /.login-box -->
              </div>
              <!-- /.position-relative -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.main-content -->
    </div>
    <!-- /.main-container -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
  </body>
</html>