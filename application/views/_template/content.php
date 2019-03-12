<div class="main-content" style="margin-top:48px">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="<?php echo site_url('home')?>">My Document</a>
        </li>
        
      </ul>
      <!-- /.breadcrumb -->
    </div>
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
    <div class="page-content">
      <div class="ace-settings-container" id="ace-settings-container">
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
      
     <div class="row">
        <div class="col-xs-12">
          <h2>Welcome, <?php echo $this->session->userdata('user_profile_fullname') ?>  </h2>
          <div class="row">
            <div class="col-xs-12">
              <div class="widget-box widget-color-orange" id="widget-box-3">
                <div class="widget-header widget-header-small">
                 <h6 class="widget-title">
                    <i class="ace-icon fa fa-sort"></i>
                    Document
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
                      <table id="tableDocument" class="table table-striped table-bordered table-hover">
                        <thead class="thin-border-bottom">
                          <tr >
                            <th style="width:50px">No</th>
                            <th>Nama </th>
                            <th>Alamat</th>
                            <th>Keterangan</th>
                            <th>Action</th>
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
                                    <?php echo $file->store_name ?>
                                </td>
                                <td>
                                    <?php echo  $file->store_address ?>
                                </td>
                                <td>
                                    <?php echo  $file->store_description ?>
                                </td>
                                <td>
                                  <a href="<?php echo site_url('home/detail_store')."/".$file->store_id  ?>" class="btn btn-white btn-info btn-bold btn-xs">
                                      Detail 
                                  </a>
                                 <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModalDocument<?php echo $file->store_id ;?>">
                                      <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                                </button>
                                  <!--  -->
                                  <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModalDocument<?php echo $file->store_id ?>">
                                      <i class="ace-icon fa fa-trash bigger-120 red"></i>
                                  </button>
                                </td>
                              </tr>
                              <!-- Modal Edit-->
                              <div class="modal fade" id="editModalDocument<?php echo $file->store_id?>" role="dialog">
                               <div class="modal-dialog">
                               <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><b>#Edit </b></h4>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open_multipart( "store/edit_store" ) ;?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input id="" type="text" name="store_id" value="<?php echo $file->store_id ?>"  hidden readonly />
                                           <input id="" type="text" name="store_old_images" value="<?php echo $file->store_images ?>"  hidden readonly />
                                       </div>
                                        <div class="form-group">
                                            <label>Nama </label>
                                           <color class="text-red"> *</color>
                                            <input type="text" class="form-control" value='<?php echo $file->store_name; ?>' name="store_name" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <color class="text-red"> *</color>
                                            <input type="text" class="form-control" value='<?php echo $file->store_address; ?>' name="store_address" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <color class="text-red"> *</color>
                                            <textarea type="text" class="form-control" placeholder="Keterangan" name="store_description" /><?php echo $file->store_description ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>latitude</label>
                                            <color class="text-red"> *</color>
                                            <input type="text" class="form-control" value='<?php echo $file->store_latitude; ?>' name="store_latitude" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <label>langitude</label>
                                            <color class="text-red"> *</color>
                                            <input type="text" class="form-control" value='<?php echo $file->store_langitude; ?>' name="store_langitude" required="required" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                              <!--  -->
                                              <label for="">Foto</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="file" id="kamar_file" onchange="getFilename(this.value)" class="form-control"  name="document_file"/>
                                                    </span>
                                                </label>
                                                <!--  -->
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
                           <!-- delete -->
                            <div class="modal fade" id="deleteModalDocument<?php echo  $file->store_id;?>" role="dialog">
                              <div class="modal-dialog">
                              <!-- Modal content-->
                                  <div class="modal-content">
                                      <?php echo form_open("store/delete_store");?>
                                      <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">#Hapus </h4>
                                      </div>
                                      <div class="modal-body">
                                      <div class="alert alert-danger">Anda yakin menghapus  <b><?php echo $file->store_name ?></b>" ?</div>
                                      </div>
                                      <div class="modal-footer">
                                     <input type="hidden" class="form-control" value='<?php echo $file->store_id; ?>' name="store_id" required="required" readonly>
                                     <input type="hidden" class="form-control" value='<?php echo $file->store_images; ?>' name="store_images" required="required" readonly>
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
                    <!-- Tampilkan Pagging -->  
                  </div>
                </div>    
              </div>
            </div>  
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>

<!-- /.main-content -->