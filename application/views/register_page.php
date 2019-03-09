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
                  <span class="red" id="id-text2">Archive</span>
                </h2>
              </div>
              <div class="space-6"></div>
              <div class="position-relative">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <?php
                        if($this->session->flashdata('register')){
                          echo"
                          <div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Alert!</h4>".
                            $this->session->flashdata('register').
                            "</div>
                          ";
                        }else{
                          echo"
                          <div class='alert alert-info alert-dismissible'>
                            Regiter new membership
                          </div>
                          ";
                        }
                      ?>
                      <?php echo form_open("user/register");?>
                        <fieldset>
                         <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" placeholder="Full Name" name="user_profile_fullname" value="<?php echo set_value('user_profile_fullname'); ?>"/>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                            <span style="color:red"><?php echo form_error('user_profile_fullname'); ?></span>
                          </label>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="email" class="form-control" placeholder="Email" name="user_profile_email" value="<?php echo set_value('user_profile_email'); ?>"/>
                              <i class="ace-icon fa fa-envelope"></i>
                            </span>
                            <span style="color:red"><?php echo form_error('user_profile_email'); ?></span>
                          </label>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" placeholder="Address" name="user_profile_address" value="<?php echo set_value('user_profile_address'); ?>"/>
                              <i class="ace-icon fa fa-location-arrow"></i>
                            </span>
                            <span style="color:red"><?php echo form_error('user_profile_address'); ?></span>
                          </label>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="text" class="form-control" placeholder="Username" name="user_username" value="<?php echo set_value('user_username'); ?>"/>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                            <span style="color:red"><?php echo form_error('user_username'); ?></span>
                          </label>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" class="form-control" placeholder="Password" name="user_password" value="<?php echo set_value('user_password'); ?>"/>
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                            <span style="color:red"><?php echo form_error('user_password'); ?></span>
                          </label>

                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="number" class="form-control" placeholder="Phone" name="user_profile_phone" value="<?php echo set_value('user_profile_phone'); ?>"/>
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                            <span style="color:red"><?php echo form_error('user_profile_phone'); ?></span>
                          </label>

                          <div class="space"></div>
                          <div class="clearfix">
                            <label class="inline">
                            <!-- <div class="checkbox icheck">
                                <label>
                                <input type="checkbox" > I agree to the <a href="#">terms</a>
                                </label>
                            </div> -->
                            </label>
                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                            <i class="ace-icon fa fa-key"></i>
                                <span class="bigger-110">Register</span>
                            </button>
                          </div>
                          <div class="space-4"></div>
                        </fieldset>
                      <?php echo form_close(); ?>
                      <div class="social-or-login center">
                        <span class="bigger-110">Powered By</span>
                      </div>
                      <div class="space-6"></div>
                      <div class="social-login center">
                        <img src="<?php echo base_url()?>assets/images/logo/logots.png" height="60px">
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