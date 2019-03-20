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
                <div class="row">
                    <div class="col-xs-12"> 
                        <div class="widget-box widget-color-orange" id="widget-box-3">
                            <div class="widget-header widget-header-small">
                                <h6 class="widget-title">
                                    <i class="ace-icon fa fa-sort"></i>
                                    Add Item
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
                                <?php echo form_open_multipart();?>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row  ">
                                            <div class="col-xs-6 ">
                                                <!--  -->
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Kategori
                                                    <span class="caret"></span></button>
                                                    <ul class="dropdown-menu" >
                                                    <?php
                                                        foreach( $relation_trees as $relation_tree  ):
                                                    ?>
                                                        <?php
                                                            if( !empty( $relation_tree->child ) ):
                                                        ?>
                                                            <li class="dropdown-submenu">
                                                            <a class="test"  href="#"><?php echo $relation_tree->category_name  ?><span class="caret pull-right"></span></a>
                                                            <!-- onclick="select_category(<?php echo $relation_tree->category_id ?> , '<?php echo $relation_tree->category_name ?>'  )" -->
                                                                <!--  -->
                                                                <ul class="dropdown-menu">
                                                                    <?php
                                                                        foreach( $relation_tree->child as $relation_tree0 ):
                                                                    ?>
                                                                        <?php
                                                                            if( !empty( $relation_tree0->child ) ):
                                                                        ?>
                                                                        <?php
                                                                            else:
                                                                        ?>
                                                                            <li><a tabindex="-1" onclick="select_category(<?php echo $relation_tree0->category_id ?> , '<?php echo $relation_tree0->category_name ?>' )" href="#"><?php echo $relation_tree0->category_name  ?></a></li>
                                                                        <?php
                                                                            endif;
                                                                        ?>
                                                                    <?php
                                                                        endforeach;
                                                                    ?>
                                                                </ul>
                                                                <!--  -->
                                                            </li>
                                                        <?php
                                                            else:
                                                        ?>
                                                            <li><a tabindex="-1" onclick="select_category(<?php echo $relation_tree->category_id ?> , '<?php echo $relation_tree->category_name ?>'  )" href="#"><?php echo $relation_tree->category_name  ?></a></li>
                                                        <?php
                                                            endif;
                                                        ?>
                                                    <?php
                                                        endforeach;
                                                    ?>
                                                    </ul>
                                                </div>
                                                <!--  -->
                                                <label for="">Kategori</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input id="category_name" type="text" class="form-control"  name="category_name" value=""  readonly/>
                                                        <input id="category_id" type="hidden" class="form-control"  name="category_id" value=""  readonly />
                                                    </span>
                                                </label>
                                                <span style="color:red"><?php echo form_error('category_id'); ?></span>
                                                
                                               <!--  -->
                                               <label for="">Harga (Rp) </label>
                                                <label class="block clearfix">
                                                   <span class="block input-icon input-icon-right">
                                                        <input id="" type="number" class="form-control" placeholder="Harga" name="item_price" value="<?php echo set_value('item_price'); ?>"/>
                                                    </span>
                                               </label>
                                                <span style="color:red"><?php echo form_error('item_price'); ?></span>
                                                <!--  -->
                                                <!--  -->
                                                <label for="">Keterangan</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <textarea type="text" class="form-control" placeholder="Keterangan" name="item_description"/><?php echo set_value('item_description'); ?></textarea>
                                                        <!-- <i class="ace-icon fa fa-user"></i> -->
                                                    </span>
                                                </label>
                                                <span style="color:red"><?php echo form_error('item_description'); ?></span>
                                               <!--  -->    
                                           </div>
                                            <div class="col-xs-6 ">
                                               <!--  -->
                                                 <label class="block clearfix ">
                                                    <span class="block input-icon input-icon-right" >
                                                    <label for="">Asal Toko</label><br>
                                                        <select class="form-control" name="store_id" >
                                                                <?php foreach( $stores as $store ) : ?>
                                                                <option value="<?php echo $store->store_id ?>"> <?php echo $store->store_name ?> </option>
                                                                <?php endforeach ; ?>
                                                        </select>
                                                    </span>
                                                </label>
                                                <!--  -->
                                                <!--  -->
                                                <label for="">Nama Item</label>
                                               <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input id="" type="text" class="form-control" placeholder="Nama" name="item_name" value="<?php echo set_value('item_name'); ?>"/>
                                                    </span>
                                                </label>
                                                <span style="color:red"><?php echo form_error('item_name'); ?></span>
                                                <!--  -->
                                                <!--  -->
                                                <div id="facilities" style="display:none" >
                                                    <label for="">Fasilitas</label>
                                                    <br>
                                                        <?php
                                                            if(isset($facilities))
                                                            {
                                                                $n=0;
                                                                foreach($facilities as $t)
                                                                {
                                                                    echo form_checkbox('kamar_facility[]', $t->facility_name, set_checkbox('kamar_facility[]', $t->facility_name), 'id="basic_checkbox_'.$n.'"');
                                                                    echo '<label for="basic_checkbox_'.$n.'">';
                                                                    echo $t->facility_name;
                                                                    echo '</label> <br> ';
                                                                    $n++;
                                                                }
                                                            }
                                                        ?>
                                                        <br>
                                                </div>
                                               <!--  -->
                                                <!--  -->
                                                <label for="">Foto</label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input multiple="" type="file" class="form-control"  name="document_file[]" />
                                                       <!-- <input multiple="" type="file" class="form-control"  name="place_image[]"/> -->
                                                    </span>
                                                </label>
                                              <!--  -->
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <button type="submit" class="pull-right btn btn-sm btn-primary ">
                                                    <i class="ace-icon fa fa-paper-plane"></i>
                                                   <span class="bigger-110">Simpan</span>
                                                </button>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <?php echo form_close()?>
                                </div>    
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/jQuery.js"></script>
<script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
          $(this).next('ul').toggle();
          e.stopPropagation();
          e.preventDefault();
      });
    });

    function select_category( category_id , category_name)
    {
        if( category_id == 3 ) // BTN
        {
            document.getElementById("facilities").style.display = "block";
        }else{
            document.getElementById("facilities").style.display = "none";
        }
        console.log("select " + category_id +" "+ category_name);
        document.getElementById("category_name").value = category_name;
        document.getElementById("category_id").value = category_id;
    }

    
</script>