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
           <?php if( !empty($user) ): ?>
          <div class="row">
            <div class="col-xs-6"> 
              <h2><?php echo $user[0]->user_profile_fullname ." ( ".$user[0]->user_username." ) "  ?> </h2>
              <h4> Alamat : <?php echo $user[0]->user_profile_address ?> </h4>
              <h4> <?php echo $user[0]->user_profile_email ?> </h4>
              <h4> <?php echo $user[0]->user_profile_phone ?> </h4>
              <br><br>
              <a href="<?php echo site_url('profile/edit') ?>" class="btn btn-white btn-info btn-bold btn-m">
                  Edit 
              </a>
           </div>
           <div class="col-xs-6"> 
             <center>
                <div style="background-color: grey ; padding : 8px">
                <img src="<?php echo base_url()."upload/user/".$user[0]->user_profile_image_path  ?>" alt="" height="300" width="auto" >
                </div>
              </center>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.page-content -->
  </div>
</div>
<!-- /.main-content -->