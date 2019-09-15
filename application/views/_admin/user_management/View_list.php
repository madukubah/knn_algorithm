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
          <br>
          <br>
          <a href="<?php echo site_url('landing/add_biodata');?>" class="btn-sm btn-primary">Tambah Data</a>
          <a href="<?php echo site_url('admin/data_uji/import');?>" class="btn-sm btn-success">Import Data Peserta</a>
          <a href="<?php echo site_url('admin/user_management/delete_all');?>" class="btn-sm btn-danger">Kosongkan Data</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thin-border-bottom">
                    <tr >
                        <th style="width:50px">No</th>
                        <!-- <th>Username</th> -->
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>no HP</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no =1;
                    // $users = array();
                    foreach( $users as $user ):
                    ?>
                    <tr <?php if($user->user_status == 0) echo "style='background-color: #f7c8c8 !important'" ?>>
                        <td>
                            <?php echo $no?>
                        </td>
                    <!-- <td>
                            <?php echo $user->user_username ?>
                        </td> -->
                        <td>
                            <?php echo $user->user_profile_fullname ?>
                        </td>
                        <td>
                            <?php echo $user->user_profile_address ?>
                        </td>
                        <td>
                            <?php echo $user->user_profile_email ?>
                        </td>
                        <td>
                            <?php echo $user->user_profile_phone ?>
                        </td>
                        <td>
                            <!-- <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModal<?php echo $user->user_id;?>">
                                <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                            </button> -->
                            <a href="<?php echo site_url('admin/user_management/editUser/').$user->user_id;?>" class="btn-sm btn-primary">Edit</a>
                            <a href="<?php echo site_url('admin/user_management/index/').$user->user_id;?>" class="btn-sm btn-primary">Detail</a>
                            <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModal<?php echo $user->user_id?>">
                                <i class="ace-icon fa fa-trash bigger-120 red"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- user -->
                        <!-- mdals -->
                        <!-- Modal Edit user-->
                        <div class="modal fade" id="editModal<?php echo $user->user_id?>" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>#Edit User</b></h4>
                                </div>
                                <div class="modal-body">
                                <?php echo form_open('admin/admin/editUser');?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <color class="text-red"> *</color>
                                        <input type="hidden" class="form-control" value='<?php echo $user->user_id; ?>' name="user_id" required="required" readonly>
                                        <input type="hidden" class="form-control" value='<?php echo $user->user_username; ?>' name="user_username" required="required" readonly>
                                        <input type="text" class="form-control" value='<?php echo $user->user_profile_fullname; ?>' name="user_profile_fullname" required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <color class="text-red"> *</color>
                                        <input type="text" class="form-control" value='<?php echo $user->user_profile_address; ?>' name="user_profile_address" required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label>no HP</label>
                                        <color class="text-red"> *</color>
                                        <input type="text" class="form-control" value='<?php echo $user->user_profile_phone; ?>' name="user_profile_phone" required="required" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <color class="text-red"> *</color>
                                        <input type="password" class="form-control"  name="user_password" >
                                    </div>
                                    <label>Status</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" <?php
                                                    if( $user->user_status == 1 ) echo 'checked="true"';
                                                ?> type="radio" name="user_status" id="inlineRadio1a" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Active</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" <?php
                                                    if( $user->user_status == 0 ) echo 'checked="true"';
                                                ?> type="radio" name="user_status" id="inlineRadio2a" value="0">
                                                <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                                            </div>
                                        </div>
                                    </div>
                                    <label>Level</label>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" <?php
                                                    if( $user->user_level == 1 ) echo 'checked="true"';
                                                ?> type="radio" name="user_level" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Admin</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" <?php
                                                    if( $user->user_level == 2 ) echo 'checked="true"';
                                                ?> type="radio" name="user_level" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">User</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </div>
                                <?php echo form_close(); ?>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--  -->
                        <!-- Modal Delete-->
                        <div class="modal fade" id="deleteModal<?php echo  $user->user_id;?>" role="dialog">
                            <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <?php echo form_open("admin/user_management/deleteUser");?>
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">#Delete Image</h4>
                                </div>
                                <div class="modal-body">
                                <div class="alert alert-danger">Are you sure want delete "<b><?php echo $user->user_username?></b>?" ?</div>
                                </div>
                                <div class="modal-footer">
                                <input type="hidden" class="form-control" value="<?php echo  $user->user_id?>" name="user_id" required="required">
                                <input type="hidden" class="form-control" value="<?php echo  $user->user_username?>" name="user_username" required="required">
                                <button type="submit" class="btn btn-danger">Ya</button>
                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            </div>
                        </div>
                        <!--  -->
                    <?php 
                    $no++;
                    endforeach;?>
                    </tbody>
                </table>
            </div>    
      </div>
    </div>

    
  </section>
</div>