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
        if($this->session->flashdata('add')){
            if( $this->session->flashdata('add')['from'] ){
                echo"
                <div class=' alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-globe'></i> Information!</h4>".
                $this->session->flashdata('add')["message"].
                "</div>
                ";
            }else{
                echo"
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Alert!</h4>".
                $this->session->flashdata('add')["message"].
                "</div>
                ";
            }
            }
        ?>
        <div class="page-content">
            <div class="ace-settings-container" id="ace-settings-container">
                <br><br>
                <!--  -->
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
                <!--  -->
                <!-- upload file -->
                <!--  -->
                <!-- category        -->
                <div class="row">
                    <div class="col-xs-12"> 
                        <h2><?php echo "Pemilik Kost : ".$user->user_username ?></h2>
                        <div class="widget-box widget-color-orange" id="widget-box-3">
                            <div class="widget-header widget-header-small">
                            <h6 class="widget-title">
                                <i class="ace-icon fa fa-sort"></i>
                                Add Kost
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
                                            <button class="btn btn-white btn-info btn-bold" data-toggle="modal" data-target="#myModalAddCategory">
                                            <i class="ace-icon fa fa-plus bigger-120 blue"></i>Tambah Kamar
                                            </button>
                                            <!-- Modal Add Image-->
                                            <div class="modal fade" id="myModalAddCategory" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><b>#Tambah Kamar</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo form_open_multipart("add");?>
                                                        <input type="text" name="user_id" value="<?php echo $user->user_id ?>" hidden readonly>
                                                        <div class="box-body">
                                                        <div class="form-group">
                                                            <label>Nama Kamar</label>
                                                            <color class="text-red"> *</color>
                                                            <input type="text" class="form-control" placeholder="Nama Kamar" name="nama_kamar" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga</label>
                                                            <color class="text-red"> *</color>
                                                            <input type="text" name="harga" placeholder="Harga" class="form-control" rows="4" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Panjang</label>
                                                            <color class="text-red"> *</color>
                                                            <input type="text" name="panjang" placeholder="Panjang (Satuan Meter)" class="form-control" rows="4" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Lebar</label>
                                                            <color class="text-red"> *</color>
                                                            <input type="text" name="lebar" placeholder="Lebar (Satuan Meter)" class="form-control" rows="4" required="required">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Foto Kamar</label>
                                                            <color class="text-red"> *</color>
                                                            <label class="block clearfix">
                                                                <span class="block input-icon input-icon-right">
                                                                <input type="file" id="foto_kamar" onchange="getFilename(this.value)" class="form-control" name="foto_kamar"/>
                                                                </span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Keterangan</label>
                                                            <color class="text-red"> *</color>
                                                            <textarea name="keterangan" placeholder="Keterangan (cth : Kamar Mandi dalam, Ber AC)" class="form-control" rows="4"></textarea>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                                        <th>Nama Kost</th>
                                        <th>Panjang</th>
                                        <th>Lebar</th>
                                        <th>Harga</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no =1;

                                    foreach( $kamar as $category ):
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no?> 
                                        </td>
                                        <td>
                                            <?php echo $category->kost_name  ?>
                                        </td>
                                        <td>
                                            <?php echo $category->kamar_panjang  ?>
                                        </td>
                                        <td>
                                            <?php echo $category->kamar_lebar  ?>
                                        </td>
                                        <td>
                                            <?php echo $category->kamar_harga  ?>
                                        </td>
                                        <td>
                                            <?php echo $category->kamar_keterangan  ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal"">
                                                <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                                            </button>
                                            <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal"">
                                                <i class="ace-icon fa fa-trash bigger-120 red"></i>
                                            </button>
                                        </td>
                                    </tr>
                                        <!-- mdals -->
                                        <!-- Modal Edit-->
                                        <!-- <div class="modal fade" id="editModal" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><b>#Edit Category</b></h4>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo form_open('add/editCategory');?>
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <color class="text-red"> *</color>
                                                        <input type="hidden" class="form-control" value='<?php echo $category->category_id; ?>' name="category_id" required="required" readonly>
                                                        <input type="text" class="form-control" value='<?php echo $category->category_name; ?>' name="category_name" required="required" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <color class="text-red"> *</color>
                                                        <textarea type="text" class="form-control"  name="category_desc"/> <?php echo $category->category_desc; ?> </textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                                <?php echo form_close(); ?>
                                                </div>
                                            </div>
                                            </div>
                                        </div> -->
                                        <!--  -->
                                        <!-- Modal Delete-->
                                        <!-- <div class="modal fade" id="deleteModal<?php echo  $category->category_id;?>" role="dialog">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php echo form_open("add/deleteCategory");?>
                                                <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">#Delete Category</h4>
                                                </div>
                                                <div class="modal-body">
                                                <div class="alert alert-danger">Are you sure want delete "<b><?php echo $category->category_name?></b>?" ?</div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="hidden" class="form-control" value="<?php echo  $category->category_id?>" name="category_id" required="required">
                                                <input type="hidden" class="form-control" value="<?php echo  $category->category_name?>" name="category_name" required="required">
                                                <button type="submit" class="btn btn-danger">Ya</button>
                                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
                                                </div>
                                                <?php echo form_close(); ?>
                                            </div>
                                            </div>
                                        </div> -->
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
                <!-- category        -->
            </div>
        </div>
    </div>
</div>