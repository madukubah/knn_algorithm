<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>KNN</title>
    <meta name="description" content="rumahaku" />
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/logo/rumahaku.jpeg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
          <a href="#"><b>K</b>-NN</a>
      </div>
      <div class="register-box-body">
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
              // echo"
              // <div class='alert alert-info alert-dismissible'>
              //   Regiter new membership
              // </div>
              // ";
            }
        ?>
        <p class="login-box-msg">Daftar</p>
        <?php echo form_open("user/register");?>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Full Name" name="user_profile_fullname" value="<?php echo set_value('user_profile_fullname'); ?>"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span style="color:red"><?php echo form_error('user_profile_fullname'); ?></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="user_profile_email" value="<?php echo set_value('user_profile_email'); ?>"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <span style="color:red"><?php echo form_error('user_profile_email'); ?></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="user_username" value="<?php echo set_value('user_username'); ?>"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <span style="color:red"><?php echo form_error('user_username'); ?></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="user_password" value="<?php echo set_value('user_password'); ?>"/>
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <span style="color:red"><?php echo form_error('user_password'); ?></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label class="">
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <a href="login" class="text-center">Sudah Punya Akun</a>
      </div>
      <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
</body>
</html>