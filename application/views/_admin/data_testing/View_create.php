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
    <?php echo form_open_multipart();?>
    <?php 
        $a = array( 1,1, 1, 1, 1);
        $ind = 0;
        foreach( $a as $d ):
    ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"> Data Ke-<?php echo $ind+1 ?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-4 ">
                            <div class="form-group ">
                                <input type="text" class="form-control" placeholder="Nama" name="data_name[<?php echo $ind ?>]" value="<?php echo set_value("data_name[$ind]"  ); ?>"/>
                                <span style="color:red"><?php echo form_error("data_name[$ind]"); ?></span>
                            </div>
                        </div> 
                        <div class="col-xs-4">
                            <div class="form-group has-feedback">
                                <input type="number"  step="any"  class="form-control" placeholder="Semester" name="data_semester[<?php echo $ind ?>]" value="<?php echo set_value("data_semester[$ind]" ); ?>"/>
                                <span style="color:red"><?php echo form_error("data_semester[$ind]"); ?></span>
                            </div>
                        </div> 
                        <div class="col-xs-4">
                            <div class="form-group has-feedback">
                                <input type="number" step="any" class="form-control" placeholder="IPK" name="data_IPK[<?php echo $ind ?>]" value="<?php echo set_value('data_IPK['.$ind.']'); ?>"/>
                                <span style="color:red"><?php echo form_error('data_IPK['.$ind.']'); ?></span>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group has-feedback">
                                <input type="number" step="any" class="form-control" placeholder="Gaji Orang Tua" name="data_gaji_ortu[<?php echo $ind ?>]" value="<?php echo set_value('data_gaji_ortu['.$ind.']'); ?>"/>
                                <span style="color:red"><?php echo form_error('data_gaji_ortu['.$ind.']'); ?></span>
                            </div>
                        </div> 
                        <div class="col-xs-3">
                            <div class="form-group has-feedback">
                                <input type="number" step="any" class="form-control" placeholder="Tanggungan Orang Tua" name="data_tanggungan[<?php echo $ind ?>]" value="<?php echo set_value('data_tanggungan['.$ind.']'); ?>"/>
                                <span style="color:red"><?php echo form_error('data_tanggungan['.$ind.']'); ?></span>
                            </div>
                        </div> 
                        <div class="col-xs-3">
                            <div class="form-group has-feedback">
                                <input type="number" step="any" class="form-control" placeholder="UKT" name="data_UKT[<?php echo $ind ?>]" value="<?php echo set_value('data_UKT['.$ind.']'); ?>"/>
                                <span style="color:red"><?php echo form_error('data_UKT['.$ind.']'); ?></span>
                            </div>
                        </div> 
                        <div class="col-xs-3">
                            <div class="form-group has-feedback">
                                <input type="number" step="any" class="form-control" placeholder="Label" name="data_label[<?php echo $ind ?>]" value="<?php echo set_value('data_label['.$ind.']'); ?>"/>
                                <span style="color:red"><?php echo form_error('data_label['.$ind.']'); ?></span>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
        $ind++;
        endforeach;
    ?>
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="pull-right btn btn-sm btn-primary ">
                        <i class="ace-icon fa fa-paper-plane"></i>
                        <span class="bigger-110">Submit</span>
                    </button>  
                </div>
            </div>
        </div>
    </div>
    <?php echo form_close()?>
  </section>
</div>