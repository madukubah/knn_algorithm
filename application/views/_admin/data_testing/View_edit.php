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
    <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $page_name ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php echo form_open_multipart();?>
            <div class="row">
                <div class="col-xs-12">
                    <?php 
                      $a = array( 1 );
                      $ind = 0;
                      foreach( $files as $file ):
                    ?>
                      <div class="row  ">
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                                  <input type="text" class="form-control" placeholder="Nama" name="data_name[<?php echo $ind ?>]" value="<?php echo set_value("data_name[$ind]", $file->data_name  ); ?>"/>
                                  <span style="color:red"><?php echo form_error("data_name[$ind]"); ?></span>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                                  <input type="number"  step="any"  class="form-control" placeholder="Semester" name="data_semester[<?php echo $ind ?>]" value="<?php echo set_value("data_semester[$ind]",  $file->data_semester ); ?>"/>
                                  <span style="color:red"><?php echo form_error("data_semester[$ind]"); ?></span>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                                  <input type="number" step="any" class="form-control" placeholder="IPK" name="data_IPK[<?php echo $ind ?>]" value="<?php echo set_value('data_IPK['.$ind.']',  $file->data_IPK); ?>"/>
                                  <span style="color:red"><?php echo form_error('data_IPK['.$ind.']'); ?></span>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                                  <input type="number" step="any" class="form-control" placeholder="Gaji Orang Tua" name="data_gaji_ortu[<?php echo $ind ?>]" value="<?php echo set_value('data_gaji_ortu['.$ind.']',  $file->data_gaji_ortu); ?>"/>
                                  <span style="color:red"><?php echo form_error('data_gaji_ortu['.$ind.']'); ?></span>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                                  <input type="number" step="any" class="form-control" placeholder="Tanggungan Orang Tua" name="data_tanggungan[<?php echo $ind ?>]" value="<?php echo set_value('data_tanggungan['.$ind.']', $file->data_tanggungan); ?>"/>
                                  <span style="color:red"><?php echo form_error('data_tanggungan['.$ind.']'); ?></span>
                              </div>
                          </div> 
                          <div class="col-xs-2 ">
                              <div class="form-group has-feedback">
                                  <input type="number" step="any" class="form-control" placeholder="UKT" name="data_UKT[<?php echo $ind ?>]" value="<?php echo set_value('data_UKT['.$ind.']', $file->data_UKT); ?>"/>
                                  <span style="color:red"><?php echo form_error('data_UKT['.$ind.']'); ?></span>
                              </div>
                          </div> 
                      </div>
                    <?php 
                      $ind++;
                      endforeach;
                    ?>
                    <br>
                    <div class="row">
                        <div class="col-xs-12">
                            <input id="" type="text" name="data_id" value="<?php echo $file->data_id ?>"  hidden readonly />
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
      </div>
    </div>
  </section>
</div>