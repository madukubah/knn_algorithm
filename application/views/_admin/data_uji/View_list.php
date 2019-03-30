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
    <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $page_name ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
              <table id="tableDocument" class="table table-striped table-bordered table-hover">
                <thead class="thin-border-bottom">
                  <tr >
                    <th style="width:50px">No</th>
                    <th>Nama</th>
                    <th>IPK </th>
                    <th>Semester</th>
                    <th>Gaji Orang Tua</th>
                    <th>Tanggungan Orang Tua</th>
                    <th>UKT</th>
                    <!-- <th>Label</th> -->
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      $no=1;
                      foreach( $files as $file ):
                    ?>
                      <tr>
                        <td>
                            <?php echo $no?>
                        </td>
                        <td>
                            <?php echo $file->user_profile_fullname  ?>
                        </td>
                        <td>
                            <?php echo $file->data_IPK ?>
                        </td>
                        <td>
                            <?php echo $file->data_semester ?>
                        </td>
                        <td>
                            <?php echo $file->data_gaji_ortu ?>
                        </td>
                        <td>
                            <?php echo $file->data_tanggungan ?>
                        </td>
                        <td>
                            <?php echo $file->data_UKT ?>
                        </td>
                        <!-- <td>
                            <?php echo $file->data_label ?>
                        </td> -->
                      </tr>
                    <?php 
                      $no++;
                    endforeach;?>
                </tbody>
              </table>
          </div>   
      </div>
    </div>

    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Normalisasi Data</h3>
          <br>
          <br>
          <a href="<?php echo site_url('admin/data_uji/normalize');?>" class="btn-sm btn-primary">Normalisasi Data</a>
          
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
              <table id="tableDocument" class="table table-striped table-bordered table-hover">
                <thead class="thin-border-bottom">
                  <tr >
                    <th style="width:50px">No</th>
                    <th>Nama</th>
                    <th>IPK </th>
                    <th>Semester</th>
                    <th>Gaji Orang Tua</th>
                    <th>Tanggungan Orang Tua</th>
                    <th>UKT</th>
                    <th>Label</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      $no=1;
                      foreach( $files_normalized as $file ):
                    ?>
                      <tr>
                        <td>
                            <?php echo $no?>
                        </td>
                        <td>
                            <?php echo $file->user_profile_fullname  ?>
                        </td>
                        <td>
                            <?php echo $file->data_IPK ?>
                        </td>
                        <td>
                            <?php echo $file->data_semester ?>
                        </td>
                        <td>
                            <?php echo $file->data_gaji_ortu ?>
                        </td>
                        <td>
                            <?php echo $file->data_tanggungan ?>
                        </td>
                        <td>
                            <?php echo $file->data_UKT ?>
                        </td>
                        <td>
                            <?php echo $file->data_label ?>
                        </td>
                      </tr>
                    <?php 
                      $no++;
                    endforeach;?>
                </tbody>
              </table>
          </div>   
      </div>
    </div>
    <!-- modal -->
    <div class="modal fade" id="ujiKnn" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Uji KNN </b></h4>
                </div>
                <div class="modal-body">
                <?php echo form_open_multipart( "admin/data_uji/uji" ) ;?>
                    <div class="form-group">
                        <label for="">Nilai K </label>
                        <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                            <input type="number" class="form-control"  name="k_value" required="required">
                            </span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">UJI</button>
                </div>
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#ujiKnn" >
                            Uji KNN
                    </button>  
                    
                </div>
            </div>
        </div>
    </div>
    
  </section>
</div>
