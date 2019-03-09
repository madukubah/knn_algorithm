  <!DOCTYPE html>

<html lang="en">

  <head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta charset="utf-8" />

    <title>Co-Ternak</title>

    <meta name="description" content="Co-kost" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/logo/logots.png"/>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />



    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

    <script type="text/javascript" src="<?php echo base_url();?>assets/ajax/ajax_document.js"></script>

    <style type="text/css">

      .setting-border {

          border-style: solid;

          border-width: medium;

          width: auto !important;

          height: 200px !important;

          border-color: #E8B10D;

      }



      .setting-border video {

        width: 100%    !important;

        height: auto   !important;

      }



      

    </style>

    <script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

  </head>

  <!-- <body class="no-skin" onload="menuActive('<?php echo $this->uri->segment(1); ?>') ; loadDocument('<?php echo site_url(); ?>', '<?php echo  $this->session->userdata('user_id');?>')"> -->

  <body class="no-skin" onload="menuActive('<?php echo $this->uri->segment(1); ?>')" >

    <div id="navbar" class="navbar navbar-default ace-save-state">

      <div class="navbar-container ace-save-state" id="navbar-container">

        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">

        <span class="sr-only">Toggle sidebar</span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        <span class="icon-bar"></span>

        </button>

        <div class="navbar-header pull-left">

          <a href="<?php echo site_url()?>" class="navbar-brand">

          <small>

          <img src="<?php echo base_url()?>assets/images/logo/logots.png" height="26px">

            Co-Ternak

          </small>

          </a>

        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">

          <ul class="nav ace-nav">

            <li class="light-blue dropdown-modal">

              <a data-toggle="dropdown" href="#" class="dropdown-toggle">

              <img class="nav-user-photo" src="<?php echo base_url()?>assets/images/avatars/user.jpg" alt="Jason's Photo" />

              <span class="user-info">

              <small>Welcome,</small>

              <?php echo $this->session->userdata('user_profile_fullname')?>

              </span>

              <i class="ace-icon fa fa-caret-down"></i>

              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                <li>

                  <a href="#">

                  <i class="ace-icon fa fa-cog"></i>

                  Settings

                  </a>

                </li>

                <li>

                  <a href="#">

                  <i class="ace-icon fa fa-user"></i>

                  Profile

                  </a>

                </li>

                <li class="divider"></li>

                <li>

                  <a href="<?php echo site_url('user/logout')?>">

                  <i class="ace-icon fa fa-power-off"></i>

                  Logout

                  </a>

                </li>

              </ul>

            </li>

          </ul>

        </div>

      </div>
      <!-- /.navbar-container -->
    </div>