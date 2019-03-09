<div class="main-content" style="margin-top:48px">

    <div class="main-content-inner">

        <div class="breadcrumbs ace-save-state" id="breadcrumbs">

            <ul class="breadcrumb">

                <li>

                <i class="ace-icon fa fa-home home-icon"></i>

                <a href="<?php echo site_url('/add')?>"><?php echo $this->uri->segment(1)?></a>

                </li>

            </ul>

        <!-- /.breadcrumb -->

        </div>

        <?php

        if($this->session->flashdata('admin')){

            if( $this->session->flashdata('admin')['from'] ){

                echo"

                <div class=' alert alert-success alert-dismissible'>

                <h4><i class='icon fa fa-globe'></i> Information!</h4>".

                $this->session->flashdata('admin')["message"].

                "</div>

                ";

            }else{

                echo"

                <div class='alert alert-danger alert-dismissible'>

                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                <h4><i class='icon fa fa-ban'></i> Alert!</h4>".

                $this->session->flashdata('admin')["message"].

                "</div>

                ";

            }

            }

        ?>

        <div class="page-content">

        <div class="ace-settings-container" id="ace-settings-container">

            <br><br>

            <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">

                <i class="ace-icon fa fa-cog bigger-130"></i>

                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">

                <div class="pull-left width-50">

                    <div class="ace-settings-item">

                    <div class="pull-left">

                        <select id="skin-colorpicker" class="hide">

                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>

                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>

                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>

                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>

                        </select>

                    </div>

                    <span>&nbsp; Choose Skin</span>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />

                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />

                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />

                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />

                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />

                    <label class="lbl" for="ace-settings-add-container">

                    Inside

                    <b>.container</b>

                    </label>

                    </div>

                </div>

                <!-- /.pull-left -->

                <div class="pull-left width-50">

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />

                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />

                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>

                    </div>

                    <div class="ace-settings-item">

                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />

                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>

                    </div>

                </div>

                </div>

            </div>

            <!-- /.ace-settings-container -->

            <!--  -->

            <!-- user -->

            <div class="row">

                <div class="col-xs-12">

                    <div class="widget-box widget-color-orange" id="widget-box-3">

                        <div class="widget-header widget-header-small">

                        <h6 class="widget-title">

                            <i class="ace-icon fa fa-sort"></i>

                            User

                        </h6>

                        <div class="widget-toolbar">

                            <a href="#" data-action="reload">

                            <i class="ace-icon fa fa-refresh"></i>

                            </a>

                            <a href="#" data-action="collapse">

                            <i class="ace-icon fa fa-plus" data-icon-show="fa-minus" data-icon-hide="fa-plus"></i>

                            </a>

                        </div>

                        </div>

                        <div class="widget-body">

                        <div class="widget-main">

                            <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover">

                                <thead class="thin-border-bottom">

                                <tr >

                                    <th style="width:50px">No</th>

                                    <th>Username</th>

                                    <th>Full Name</th>

                                    <th>Alamat</th>

                                    <th>Email</th>

                                    <th>no HP</th>

                                    <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>

                                <?php 

                                $no =1;



                                foreach( $users as $user ):

                                ?>

                                <tr <?php if($user->user_status == 0) echo "class='bg-danger red'" ?>>

                                    <td>

                                        <?php echo $no?>

                                    </td>
                                    
                                    <td>

                                        <?php echo $user->user_username?>

                                    </td>

                                    <td>

                                        <?php echo $user->user_profile_fullname?>

                                    </td>

                                    <td>

                                        <?php echo $user->user_profile_address?>

                                    </td>

                                    <td>

                                        <?php echo $user->user_profile_email?>

                                    </td>

                                    <td>

                                        <?php echo $user->user_profile_phone?>

                                    </td>

                                    <td>

                                        <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModal<?php echo $user->user_id;?>">

                                            <i class="ace-icon fa fa-edit bigger-120 blue"></i>

                                        </button>

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

                                            <?php echo form_open('admin/editUser');?>

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

                                            <?php echo form_open("admin/deleteUser");?>

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

                    </div>

                </div>

                <!-- /.col -->

            </div>


            <!-- MOBILEVERSION -->
            <div class="row">
                <div class="col-xs-12"> 
                    <div class="widget-box widget-color-orange" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                        <h6 class="widget-title">
                            <i class="ace-icon fa fa-sort"></i>
                            Mobile Version
                        </h6>
                        <div class="widget-toolbar">
                            <a href="#" data-action="reload">
                            <i class="ace-icon fa fa-refresh"></i>
                            </a>
                            <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-plus" data-icon-show="fa-minus" data-icon-hide="fa-plus"></i>
                            </a>
                        </div>
                        </div>
                        <div class="widget-body">
                        <div class="widget-main">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <div class="btn-group">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thin-border-bottom">
                                <tr >
                                    <th style="width:50px">No</th>
                                    <th>Mobile Version</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no =1;

                                foreach( $mobiles as $mobile ):
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no?>
                                    </td>
                                    <td>
                                        <?php echo $mobile->mobile_version?>
                                    </td>
                                    <td>
                                        <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModalMobile<?php echo $mobile->mobile_id;?>">
                                            <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                                        </button>
                                    </td>
                                </tr>
                                    <!-- mdals -->
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="editModalMobile<?php echo $mobile->mobile_id?>" role="dialog">
                                        <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><b>#Edit Mobile Version</b></h4>
                                            </div>
                                            <div class="modal-body">
                                            <?php echo form_open('admin/edit_mobile_version');?>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label>Mobile Version</label>
                                                    <color class="text-red"> *</color>
                                                    <input type="hidden" class="form-control" value='<?php echo $mobile->mobile_id; ?>' name="mobile_id" required="required" readonly>
                                                    <input type="text" class="form-control" value='<?php echo $mobile->mobile_version; ?>' name="mobile_version" required="required" >
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
                                <?php 
                                $no++;
                                endforeach;?>
                                </tbody>
                            </table>
                            </div>    
                        </div>
                        </div>    
                    </div>
                </div>
            </div>
            <!-- MOBILEVERSION -->

            <!-- ADVERTISEMENT -->
            <div class="row">
                <div class="col-xs-12"> 
                    <div class="widget-box widget-color-orange" id="widget-box-3">
                        <div class="widget-header widget-header-small">
                        <h6 class="widget-title">
                            <i class="ace-icon fa fa-sort"></i>
                            Advertisement
                        </h6>
                        <div class="widget-toolbar">
                            <a href="#" data-action="reload">
                            <i class="ace-icon fa fa-refresh"></i>
                            </a>
                            <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-plus" data-icon-show="fa-minus" data-icon-hide="fa-plus"></i>
                            </a>
                        </div>
                        </div>
                        <div class="widget-body">
                        <div class="widget-main">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <div class="btn-group">
                                        <!-- Btn Add User -->
                                        <button class="btn btn-white btn-info btn-bold" data-toggle="modal" data-target="#myModalAddAdvertisement">
                                        <i class="ace-icon fa fa-plus bigger-120 blue"></i>Add
                                        </button>

                                        <!-- Btn Refresh Page -->
                                        <a href="<?php echo site_url('admin')?>" class="btn btn-white btn-success btn-bold tooltip-success" data-rel="tooltip" data-placement="top" title="Refresh Page">
                                        <i class="fa fa-refresh"></i>
                                        </a>
                                        <!-- Modal Add Image-->
                                        <div class="modal fade" id="myModalAddAdvertisement" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><b>#Add Advertisement</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo form_open_multipart("admin/add_Advertisement");?>
                                                    <div class="box-body">
                                                            <div class="form-group">
                                                                <!--  -->
                                                                <label>Advertisement Photo</label>
                                                                    <label class="block clearfix">
                                                                        <span class="block input-icon input-icon-right">
                                                                            <input type="file" id="advertise_photo"  class="form-control"  name="document_file"/>
                                                                        </span>
                                                                    </label>
                                                                    <!--  -->
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <color class="text-red"> *</color>
                                                                <textarea type="text" class="form-control" placeholder="deskripsi" name="advertise_desc" /></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Add</button>
                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Of Modal -->
                                    </div>
                                </div>
                            </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thin-border-bottom">
                                <tr >
                                    <th style="width:50px">No</th>
                                    <!-- <th>id</th> -->
                                    <th>Advertise Photo</th>
                                    <th>Advertise Desc</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no =1;

                                foreach( $Advertisements as $Advertisement ):
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $no?>
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#advertise_photo<?php echo  $Advertisement->advertise_id;?>"><?php echo $Advertisement->advertise_photo;?></a>
                                    </td>
                                    <td>
                                        <?php echo $Advertisement->advertise_desc?>
                                    </td>
                                    <td>
                                        <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModalAdvertisement<?php echo $Advertisement->advertise_id;?>">
                                            <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                                        </button>
                                        <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModalAdvertisement<?php echo $Advertisement->advertise_id?>">
                                            <i class="ace-icon fa fa-trash bigger-120 red"></i>
                                        </button>
                                    </td>
                                </tr>
                                    <!-- mdals -->
                                    <!-- Modal Edit-->
                                    <div class="modal fade" id="editModalAdvertisement<?php echo $Advertisement->advertise_id?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><b>#Edit Advertisement</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo form_open_multipart('admin/edit_Advertisement');?>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Advertisement Photo</label>

                                                            <label class="block clearfix">

                                                                <span class="block input-icon input-icon-right">

                                                                    <input type="file" id="advertise_photo"  class="form-control"  name="document_file"/>

                                                                </span>

                                                            </label>
                                                        </div>
                                                        <div class="form-group">

                                                            <label>Deskripsi</label>

                                                            <color class="text-red"> *</color>

                                                            <textarea type="text" class="form-control" placeholder="deskripsi" name="advertise_desc" /><?php echo $Advertisement->advertise_desc; ?></textarea>

                                                        </div>
                                                        <input type="hidden" class="form-control" value='<?php echo $Advertisement->advertise_id; ?>' name="advertise_id" required="required" readonly>
                                                        <input type="hidden" class="form-control" value='<?php echo $Advertisement->advertise_photo; ?>' name="advertise_old_photo" required="required" readonly>
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
                                    <div class="modal fade" id="deleteModalAdvertisement<?php echo  $Advertisement->advertise_id;?>" role="dialog">
                                        <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <?php echo form_open("admin/delete_Advertisement");?>
                                            <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">#Delete Facility</h4>
                                            </div>
                                            <div class="modal-body">
                                            <div class="alert alert-danger">apa anda yakin ingin menghapus <b><?php echo $Advertisement->advertise_photo?></b> ?</div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" class="form-control" value='<?php echo $Advertisement->advertise_id; ?>' name="advertise_id" required="required" readonly>
                                                <input type="hidden" class="form-control" value='<?php echo $Advertisement->advertise_photo; ?>' name="advertise_photo" required="required" readonly>
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!-- ADEVERISEMENPHOTO -->
                                    <div class="modal fade" id="advertise_photo<?php echo  $Advertisement->advertise_id;?>" role="dialog">

                                        <div class="modal-dialog">

                                            <!-- Modal content-->

                                            <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                                <h4 class="modal-title"><b>#Image Preview</b></h4>

                                            </div>

                                            <div class="modal-body">

                                                <div class="box-body">

                                                <img src="<?php echo base_url()."upload/iklan/".$Advertisement->advertise_photo  ?>" alt="" height="auto" width="500" >

                                                </div>

                                            </div>

                                            </div>

                                        </div>

                                    </div>
                                    <!-- ADEVERISEMENPHOTO -->
                                <?php 
                                $no++;
                                endforeach;?>
                                </tbody>
                            </table>
                            </div>    
                        </div>
                        </div>    
                    </div>
                </div>
            </div>
            <!-- ADVERTISEMENT -->

            <!--  -->

            

