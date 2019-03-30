<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Isi biodata penerima beasiswa
        </h1>
        
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
                "</div>";
            }
          }
        ?>
      <!-- alert  -->
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-9">
              <?php echo form_open_multipart();?>
                <div class="box">
                  <div class="box-body">
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">Nama Lengkap</label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control"  name="user_profile_fullname" value="<?php echo set_value("user_profile_fullname"  ); ?>"/>
                          <span style="color:red"><?php echo form_error("user_profile_fullname"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">Alamat</label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control"  name="user_profile_address" value="<?php echo set_value("user_profile_address"  ); ?>"/>
                          <span style="color:red"><?php echo form_error("user_profile_address"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">No Telp</label>
                      </div>
                      <div class="col-md-8">
                          <input type="text" class="form-control"  name="user_profile_phone" value="<?php echo set_value("user_profile_phone"); ?>"/>
                          <span style="color:red"><?php echo form_error("user_profile_phone"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">Semester</label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" step="any" class="form-control"  name="data_semester" value="<?php echo set_value("data_semester"); ?>"/>
                          <span style="color:red"><?php echo form_error("data_semester"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">IPK</label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" step="any" class="form-control"  name="data_IPK" value="<?php echo set_value("data_IPK"); ?>"/>
                          <span style="color:red"><?php echo form_error("data_IPK"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">Gaji Orang Tua</label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" step="any" class="form-control"  name="data_gaji_ortu" value="<?php echo set_value("data_gaji_ortu"); ?>"/>
                          <span style="color:red"><?php echo form_error("data_gaji_ortu"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">Tanggungan Orang Tua</label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" step="any" class="form-control"  name="data_tanggungan" value="<?php echo set_value("data_tanggungan"); ?>"/>
                          <span style="color:red"><?php echo form_error("data_tanggungan"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                    <!-- - -->
                    <div class="row">
                      <div class="col-md-3">
                          <label for="" class="control-label">UKT</label>
                      </div>
                      <div class="col-md-8">
                          <input type="number" step="any" class="form-control"  name="data_UKT" value="<?php echo set_value("data_UKT"); ?>"/>
                          <span style="color:red"><?php echo form_error("data_UKT"); ?></span>
                      </div>
                    </div>
                    <!--  -->
                  </div>
                </div>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="pull-right btn btn-sm btn-primary" >
                                    <i class="ace-icon fa fa-paper-plane"></i>
                                    <span class="bigger-110">Kirim</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              <?php echo form_close()?>
          </div>
        </div>
      </section>
    </div>
  </div>