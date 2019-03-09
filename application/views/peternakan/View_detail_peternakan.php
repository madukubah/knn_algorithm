<?php
  function is_checked( $target, $data )
  {
      foreach($data as $t)
      {
        if ( $target == $t )
          return "checked";
      }
      return " ";
  }
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
      
      <div class="row">
        <div class="col-xs-12">
           <?php if( !empty($store_info) ): ?>
          <div class="row">
            <div class="col-xs-6"> 
              <h2> Kost : <?php echo $store_info[0]->store_name ?> </h2>
              <h4> Alamat : <?php echo $store_info[0]->store_address ?> </h4>
              <h4> <?php echo $store_info[0]->store_description ?> </h4>
           </div>
           <div class="col-xs-6"> 
             <center>
                <div style="background-color: grey ; padding : 8px">
                <img src="<?php echo base_url()."upload/store/".$store_info[0]->store_images  ?>" alt="" height="300" width="auto" >
                </div>
              </center>
            </div>
          </div>
          <?php endif; ?>
          <div class="row">
            <div class="col-xs-12">
              <div class="widget-box widget-color-orange" id="widget-box-3">
                <div class="widget-header widget-header-small">
                  <h6 class="widget-title">
                    <i class="ace-icon fa fa-sort"></i>
                    Kamar
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
                            <th>Nama</th>
                            <th>Berat / Umur</th>
                            <th>Harga </th>
                            <th>Foto</th>
                            <th style="width: 20%" >deskripsi</th>
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
                                    <?php echo $file->item_name ?>
                                </td>
                                <td>
                                    <?php echo $file->item_weight." Kg/ ".$file->item_ages." Thn" ?>
                                </td>
                                <td>
                                    <?php echo  "Rp. ".$file->item_price ?>
                                </td>
                                <td>
                                   <!-- IMAGE -->
                                   <?php
                                       // $images = $file->kamar_foto;
                                       $images = explode(";", $file->item_images );
                                       $i=0;
                                        foreach( $images as $image ):
                                    ?>
                                        <a href="" data-toggle="modal" data-target="#image<?php echo  $file->item_id.$i  ;?>"><?php echo $image;?></a>
                                        <br>
                                        <div class="modal fade" id="image<?php echo  $file->item_id.$i  ;?>" role="dialog">
                                            <div class="modal-dialog">
                                            <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><b>#Image Preview</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="box-body">
                                                    <img src="<?php echo base_url()."upload/item/".$image  ?>" alt="" height="auto" width="500" >
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                        $i++;
                                        endforeach;
                                    ?>
                                    <!-- IMAGE -->
                                </td>
                                <td>
                                    <?php echo  $file->item_description   ?>
                                </td>
                                <td>
                                  <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModalDocument<?php echo $file->item_id ;?>">
                                      <i class="ace-icon fa fa-edit bigger-120 blue"></i>
                                  </button>
                                  <!--  -->
                                  <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModalDocument<?php echo $file->item_id ?>">
                                    <i class="ace-icon fa fa-trash bigger-120 red"></i>
                                </button>
                                </td>
                              </tr>
                              <!-- Modal Edit-->
                                <div class="modal fade" id="editModalDocument<?php echo $file->item_id?>" role="dialog">
                                    <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><b>#Edit Ternak</b></h4>
                                        </div>
                                        <div class="modal-body">
                                        <?php echo form_open_multipart( "item/edit_item" ) ;?>
                                        <div class="box-body">
                                            <div class="form-group">
                                                <!--  -->
                                                <input id="" type="text" name="store_id" value="<?php echo $store_info[0]->store_id ?>"  hidden readonly />
                                                <input id="" type="text" name="item_id" value="<?php echo $file->item_id ?>"  hidden readonly />
                                                <input id="" type="text" name="store_item_id" value="<?php echo $file->store_item_id ?>"  hidden readonly />
                                               <input id="" type="text" name="item_old_images" value="<?php echo $file->item_images ?>"  hidden readonly />
                                                <!--  -->
                                            </div>
                                            <div class="form-group">
                                                <!--  -->
                                                <label for="">Nama</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input id="" type="text" class="form-control" placeholder="Nama" name="item_name" value="<?php echo $file->item_name ?>" />
                                                    </span>
                                                </label>
                                                <span style="color:red"><?php echo form_error('item_name'); ?></span>
                                                <!--  -->
                                            </div>
                                            <div class="form-group">
                                              <!--  -->
                                              <label for="">Harga (Rp) </label>
                                              <label class="block clearfix">
                                                  <span class="block input-icon input-icon-right">
                                                      <input id="" type="number" class="form-control" placeholder="Harga" name="item_price" value="<?php echo $file->item_price ?>" />
                                                  </span>
                                              </label>
                                              <span style="color:red"><?php echo form_error('item_price'); ?></span>
                                              <!--  -->
                                            </div>
                                            <div class="form-group">
                                              <!--  -->
                                              <label for="">Umur (Tahun)</label>
                                              <label class="block clearfix">
                                                  <span class="block input-icon input-icon-right">
                                                      <input id="" type="number" class="form-control" placeholder="Umur" name="item_ages" value="<?php echo $file->item_ages; ?>"/>
                                                 </span>
                                              </label>
                                              <span style="color:red"><?php echo form_error('item_ages'); ?></span>
                                              <!--  -->
                                            </div>
                                            <div class="form-group">
                                              <!--  -->
                                              <label for="">Berat (kg)</label>
                                              <label class="block clearfix">
                                                   <span class="block input-icon input-icon-right">
                                                       <input id="" type="number" class="form-control" placeholder="Berat" name="item_weight" value="<?php echo $file->item_weight; ?>"/>
                                                   </span>
                                               </label>
                                               <span style="color:red"><?php echo form_error('item_weight'); ?></span>
                                               <!--  -->
                                            </div>
                                            <div class="form-group">
                                              <!--  -->
                                              <label for="">Keterangan</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <textarea type="text" class="form-control" placeholder="Keterangan" name="item_description"/><?php echo $file->item_description; ?></textarea>
                                                        <!-- <i class="ace-icon fa fa-user"></i> -->
                                                    </span>
                                                </label>
                                                <span style="color:red"><?php echo form_error('item_description'); ?></span>
                                               <!--  -->
                                            </div>
                                            <div class="form-group">
                                              <!-- FOTO -->
                                              <!-- <label for="">Foto</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="file" id="kamar_file" onchange="getFilename(this.value)" class="form-control"  name="document_file"/>
                                                    </span>
                                                </label> -->
                                                <!--  -->
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
                                <!-- delete -->
                                <div class="modal fade" id="deleteModalDocument<?php echo  $file->item_id;?>" role="dialog">
                                    <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <?php echo form_open("item/delete_item");?>
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">#Hapus Ternak</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="alert alert-danger">Anda yakin menghapus Ternak <b><?php echo $file->item_name ?></b> ?</div>
                                        </div>
                                        <div class="modal-footer">
                                        <input type="hidden" class="form-control" value='<?php echo $file->item_id; ?>' name="item_id" required="required" readonly>
                                        <input type="hidden" class="form-control" value='<?php echo $file->store_id; ?>' name="store_id" required="required" readonly>
                                        <input type="hidden" class="form-control" value='<?php echo $file->store_item_id ; ?>' name="store_item_id" required="required" readonly>
                                        <input type="hidden" class="form-control" value='<?php echo $file->item_images ; ?>' name="item_images" required="required" readonly>
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