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
          <a href="<?php echo site_url('shared')?>">shared Document</a>
        </li>
        
      </ul>
      <!-- /.breadcrumb -->
    </div>
    <!-- alert  -->
    <?php
        if($this->session->flashdata('shared')){
            if( $this->session->flashdata('shared')['from'] ){
                echo"   
                <div class=' alert alert-success alert-dismissible'>
                <h4><i class='icon fa fa-globe'></i> Information!</h4>".
                $this->session->flashdata('shared')["message"].
                "</div>
                ";
            }else{
                echo"
                <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Alert!</h4>".
                $this->session->flashdata('shared')["message"].
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
        <h2>Welcome, <?php echo $this->session->userdata('user_profile_fullname')." (".$this->session->userdata('user_group_name')." / ".$this->session->userdata('position_name').")" ?>  </h2>
          <div class="infobox infobox-green infobox-small infobox-dark">
            <div class="infobox-icon">
              <i class="ace-icon 	fa fa-file-archive-o"></i>
            </div>

            <div class="infobox-data">
              <div class="infobox-content">total</div>
              <div class="infobox-content"><?php echo $total?></div>
            </div>
          </div>
          
          <?php
          // echo var_dump( $num_files );
            foreach($num_files as $num_file):
          ?>
          <div class="infobox <?php echo $infobox[ floor( rand(0, count($infobox)-1  ) ) ] ?> infobox-small infobox-dark">
            <div class="infobox-icon">
              <i class="ace-icon <?php
                  switch($num_file->document_type){
                    case 'image': echo 'fa fa-image'; break;
                    case 'text': echo 'fa fa-file-archive-o'; break;
                    case 'audio': echo 'fa fa-music'; break;
                    case 'video': echo 'fa fa-video-camera'; break;
                    case 'docx': echo 'fa fa-file-word-o'; break;
                    case 'pptx': echo 'fa fa-file-powerpoint-o'; break;
                    case 'sql': echo 'fa fa-database'; break;
                    case 'zip':
                    case 'rar':
                        echo 'fa fa-file-zip-o'; break;
                    default : echo 'fa fa-question';break;
                  }
              ?>"></i>
            </div>

            <div class="infobox-data">
              <div class="infobox-content"><?php echo $num_file->document_type?></div>
              <div class="infobox-content"><?php echo $num_file->num ?></div>
            </div>
          </div>
          <?php endforeach;?>

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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Group/Position</th>   
                                <th>Pemilik</th>
                                <!-- <th>Description</th> -->
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $status = array(
                                'private','public'
                            );
                            $no =1;

                            foreach( $files as $file ):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $no?>
                                </td>
                                <td>
                                    <?php echo $file->document_title ?>
                                </td>
                                <td>
                                    <?php echo $file->document_desc ?>
                                </td>
                                <td>
                                    <?php echo $file->document_type ?>
                                </td>
                                <td>
                                    <?php echo $file->category_name ?>
                                </td>
                                <td>
                                    <?php echo $status[ $file->document_status ]  ?>
                                </td>
                                <td>
                                    <?php echo $file->user_group_name."/".$file->position_name; ?>
                                </td>
                                <td>
                                    <?php echo $file->user_profile_fullname ?>
                                </td>
                                <td>
                                <a href="<?php echo site_url('/download/index/'.$file->document_file ) ?>">
                                    <button class="btn btn-white btn-success btn-bold btn-xs" >
                                        <i class="ace-icon fa fa-download bigger-120 green"></i>
                                    </button>
                                </a>
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