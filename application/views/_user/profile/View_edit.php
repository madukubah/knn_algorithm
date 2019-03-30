<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?php echo $page_title ?>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
      <!-- Main content -->
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
      <section class="content">
        <div class="row">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Infomasi Dasar</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <?php if( !empty($user) ): ?>
                    <?php echo form_open_multipart();?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="row  ">
                                <div class="col-xs-6 ">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Full Name" name="user_profile_fullname" value="<?php echo set_value('user_profile_fullname', $user[0]->user_profile_fullname); ?>"/>
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    <span style="color:red"><?php echo form_error('user_profile_fullname'); ?></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="email" class="form-control" placeholder="Email" name="user_profile_email" value="<?php echo set_value('user_profile_email', $user[0]->user_profile_email); ?>"/>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    <span style="color:red"><?php echo form_error('user_profile_email'); ?></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Address" name="user_profile_address" value="<?php echo set_value('user_profile_address', $user[0]->user_profile_address); ?>"/>
                                    <span class="ace-icon fa fa-location-arrow form-control-feedback"></span>
                                    <span style="color:red"><?php echo form_error('user_profile_address'); ?></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="password" class="form-control" placeholder="Password" name="user_password" value="<?php echo set_value('user_password'); ?>"/>
                                    <span class="ace-icon fa fa-lock form-control-feedback"></span>
                                    <span style="color:red"><?php echo form_error('user_password'); ?></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="number" class="form-control" placeholder="Phone" name="user_profile_phone" value="<?php echo set_value('user_profile_phone',  $user[0]->user_profile_phone); ?>"/>
                                    <span class="ace-icon fa fa-user form-control-feedback"></span>
                                    <span style="color:red"><?php echo form_error('user_profile_phone'); ?></span>
                                </div>
                                <!--  -->
                                <label for="">Foto </label>
                                <label class="block clearfix">
                                    <span class="block input-icon input-icon-right">
                                        <input type="file" class="form-control"  name="document_file"/>
                                    </span>
                                </label>
                                <!--  -->
                                </div> 
                                <div class="col-xs-6"> 
                                    <center>
                                        <div style="background-color: grey ; padding : 8px">
                                        <img src="<?php echo base_url()."upload/user/".$user[0]->user_profile_image_path  ?>" alt="" height="300" width="auto" >
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                <input id="" type="text" name="user_old_images" value="<?php echo $user[0]->user_profile_image_path ?>"  hidden readonly />
                                    <button type="submit" class="pull-right btn btn-sm btn-primary ">
                                        <i class="ace-icon fa fa-paper-plane"></i>
                                        <span class="bigger-110">Submit</span>
                                    </button>  
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php echo form_close()?>
                    </div>    
                <?php endif; ?>
                <!-- /.post -->
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>