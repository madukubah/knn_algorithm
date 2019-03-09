<?php
      $infobox = array(
        'infobox-blue', 'infobox-grey', 'infobox-pink', 'infobox-red', 'infobox-green'
      );
?>
<div class="main-content" style="margin-top:48px">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="ace-icon fa fa-home home-icon"></i>
          <a href="<?php echo site_url('home')?>">Home</a>
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
      <!-- /.KATEGORI -->
      <div class="row">
        <div class="col-xs-12"> 
            <div class="widget-box widget-color-orange" id="widget-box-3">
                <div class="widget-header widget-header-small">
                <h6 class="widget-title">
                    <i class="ace-icon fa fa-sort"></i>
                    <?php echo $page_title ?>
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
                                <button class="btn btn-white btn-info btn-bold" data-toggle="modal" data-target="#myModalAddcategory">
                                <i class="ace-icon fa fa-plus bigger-120 blue"></i>Tambah
                                </button>

                                <!-- Btn Refresh Page -->
                                <a href="<?php echo site_url('admin')?>" class="btn btn-white btn-success btn-bold tooltip-success" data-rel="tooltip" data-placement="top" title="Refresh Page">
                                <i class="fa fa-refresh"></i>
                                </a>
                                <!-- Modal Add Image-->
                                <div class="modal fade" id="myModalAddcategory" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><b>#Tambah Kategori Tempat</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart("category/add_category");?>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label>Nama Kategori</label>
                                                    <color class="text-red"> *</color>
                                                    <input type="text" class="form-control"  name="category_name" required="required" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Keterangan</label>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <textarea type="text" class="form-control" placeholder="Keterangan" name="category_description"/></textarea>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
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
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no =1;

                        foreach( $categories as $category ):
                        ?>
                        <tr>
                            <td>
                                <?php echo $no?>
                            </td>
                            <td>
                                <?php echo $category->category_name?>
                            </td>
                            <td>
                                <?php echo $category->category_description?>
                            </td>
                            <td>
                                <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModalcategory<?php echo $category->category_id;?>">
                                    <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                                </button>
                                <?php if( $category->category_id != 0 ) :
                                ?>
                                    <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModalcategory<?php echo $category->category_id?>">
                                        <i class="ace-icon fa fa-trash bigger-120 red"></i>
                                    </button>
                                <?php endif;
                                ?>
                            </td>
                        </tr>
                            <!-- mdals -->
                            <!-- Modal Edit-->
                            <div class="modal fade" id="editModalcategory<?php echo $category->category_id;?>" role="dialog">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><b>#Edit Kategori Tempat</b></h4>
                                    </div>
                                    <div class="modal-body">
                                    <?php echo form_open('category/edit_category');?>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>
                                            <color class="text-red"> *</color>
                                            <input type="text" class="form-control" value='<?php echo $category->category_name; ?>' name="category_name" required="required" >
                                        </div>
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
                                                    <textarea type="text" class="form-control" placeholder="Keterangan" name="category_description"/><?php echo $category->category_description;?></textarea>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" class="form-control" value='<?php echo $category->category_id; ?>' name="category_id" required="required" readonly>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                    <?php echo form_close(); ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!--  -->
                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModalcategory<?php echo $category->category_id?>" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <?php echo form_open("category/delete_category");?>
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">#Delete Kategori</h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="alert alert-danger">apa anda yakin ingin menghapus <b><?php echo $category->category_name?></b> ?</div>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" class="form-control" value='<?php echo $category->category_id; ?>' name="category_id" required="required" readonly>
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
    </div>
    <!-- KATEGORI -->
    <!-- category_relation -->
    <div class="row">
        <div class="col-xs-12"> 
            <div class="widget-box widget-color-orange" id="widget-box-3">
                <div class="widget-header widget-header-small">
                <h6 class="widget-title">
                    <i class="ace-icon fa fa-sort"></i>
                    Relasi Kategori 
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
                                <button class="btn btn-white btn-info btn-bold" data-toggle="modal" data-target="#myModalAddCategory_relation">
                                    <i class="ace-icon fa fa-plus bigger-120 blue"></i>Tambah
                                </button>
                                <!-- modal add -->
                                <div class="modal fade" id="myModalAddCategory_relation" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><b>#Tambah Relasi Kategori</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo form_open_multipart("category/add_category_relation");?>
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <label for="">Kategori Parent</label><br>
                                                        <select class="form-control" name="category_relation_parent" >
                                                                <option value="0"> coternak </option>x
                                                        </select>
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Kategori Child</label><br>
                                                        <select class="form-control" name="category_relation_child" >
                                                                <?php foreach( $categories as $category ) : ?>
                                                                <option value="<?php echo $category->category_id ?>"> <?php echo $category->category_name ?> </option>
                                                                <?php endforeach ; ?>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Btn Refresh Page -->
                                <a href="<?php echo site_url('admin')?>" class="btn btn-white btn-success btn-bold tooltip-success" data-rel="tooltip" data-placement="top" title="Refresh Page">
                                <i class="fa fa-refresh"></i>
                                </a>
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
                            <th>Kategori Parent</th>
                            <th>Kategori Child</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no =1;

                        foreach( $category_relations as $category_relation ):
                        ?>
                        <tr>
                            <td>
                                <?php echo $no?>
                            </td>
                            <td>
                                <?php echo $category_relation->parentName?>
                            </td>
                            <td>
                                <?php echo $category_relation->childName?>
                            </td>
                            <td style="width : 30%">
                                <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModalCategory_relation<?php echo $category_relation->category_relation_id?>">
                                    <i class="ace-icon fa fa-trash bigger-120 red"></i>
                                </button>
                                <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#myModalAddChild<?php echo $category_relation->category_relation_id?>">
                                    <i class="ace-icon fa fa-plus bigger-120 blue"></i>Tambah Child
                                </button>
                                <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#myModalAddChildNew<?php echo $category_relation->category_relation_id?>">
                                    <i class="ace-icon fa fa-plus bigger-120 blue"></i>Tambah Child Baru
                                </button>
                            </td>
                        </tr>
                            <!-- mdals -->
                            <!-- myModalAddChildNew -->
                            <div class="modal fade" id="myModalAddChildNew<?php echo $category_relation->category_relation_id?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><b>#Tambah Relasi Kategori</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart("category/add_category_relation_Add_new_child");?>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="">Kategori Parent</label><br>
                                                    <select class="form-control" name="category_relation_parent" >
                                                            <option value="<?php echo $category_relation->category_relation_child ?>"> <?php echo $category_relation->childName ?> </option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <color class="text-red"> *</color>
                                                <input type="text" class="form-control"  name="category_name" required="required" >
                                            </div>
                                            <div class="form-group">
                                                <label for="">Keterangan</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <textarea type="text" class="form-control" placeholder="Keterangan" name="category_description"/></textarea>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- myModalAddChildNew -->
                            <!-- modal add child -->
                            <div class="modal fade" id="myModalAddChild<?php echo $category_relation->category_relation_id?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><b>#Tambah Relasi Kategori</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo form_open_multipart("category/add_category_relation");?>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label for="">Kategori Parent</label><br>
                                                    <select class="form-control" name="category_relation_parent" >
                                                            <option value="<?php echo $category_relation->category_relation_child ?>"> <?php echo $category_relation->childName ?> </option>
                                                    </select>
                                                </span>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Kategori Child</label><br>
                                                    <select class="form-control" name="category_relation_child" >
                                                        <?php foreach( $categories as $category ) : ?>
                                                        <option value="<?php echo $category->category_id ?>"> <?php echo $category->category_name ?> </option>
                                                        <?php endforeach ; ?>
                                                    </select>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal add child -->
                            <!-- Modal Delete-->
                            <div class="modal fade" id="deleteModalCategory_relation<?php echo $category_relation->category_relation_id?>" role="dialog">
                                <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <?php echo form_open("category/delete_category_relation");?>
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">#Delete Kategori</h4>
                                    </div>
                                    <div class="modal-body">
                                    <div class="alert alert-danger">apa anda yakin ingin menghapus relasi <?php echo $category_relation->parentName; ?> dengan <?php echo $category_relation->childName; ?> ?</div>
                                    </div>
                                    <div class="modal-footer">
                                    <input type="hidden" class="form-control" value='<?php echo $category_relation->category_relation_id; ?>' name="category_relation_id" required="required" readonly>
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
    </div>
    <!-- category_relation -->
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>

<!-- /.main-content -->