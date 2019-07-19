<?php
  $menus = array(
    array(
      'menuId' => "home",
      'menuName' => "Beranda",
      // 'menuPath' => site_url("home"),
      'menuPath' => site_url("admin/home"),
      'menuIcon' => "fa fa-file-archive-o"
    ),

    array(
      'menuId' => "data_testing",
      'menuName' => "Data Testing",
      'menuPath' => site_url("admin/data_testing"),
      'menuIcon' => 'fa fa-server'
    ),

    array(
      'menuId' => "data_uji",
      'menuName' => "Data Uji",
      'menuPath' => site_url("admin/data_uji"),
      'menuIcon' => 'fa fa-server'
    )
  );

  $admin = array(
    'menuId' => "user_management",
    'menuName' => "Data Peserta",
    'menuPath' => site_url("admin/user_management"),
    'menuIcon' => 'fa fa-users'
  );
  $log = array(
    'menuId' => "log",
    'menuName' => "log activity",
    'menuPath' => site_url("log"),
    'menuIcon' => 'fa fa-times'
  );
  $category = array(
    'menuId' => "category",
    'menuName' => "Kategori",
    'menuPath' => site_url("category"),
    'menuIcon' => 'fa fa-times'
  );



  if( $this->session->userdata('user_level') == 1 ){

    array_push($menus, $admin) ;
    // array_push($menus, $category) ;
    // array_push($menus, $log) ;
  }



?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php if( !empty($this->session->userdata('user_profile_image_path')) ): ?>
            <img class="img-circle" src="<?php echo base_url( "upload/user/" ).$this->session->userdata('user_profile_image_path') ?> " alt="Jason's Photo" />
        <?php endif; ?>
      </div>
      <div class="pull-left info">
        <?php echo $this->session->userdata('user_profile_fullname')?>
      </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU</li>
      <?php
        foreach($menus as $menu):
        ?>
        <li id="<?php echo $menu['menuId'] ?>">
          <a href="<?php echo $menu['menuPath'] ?>">
          <i class="menu-icon <?php echo $menu['menuIcon'] ?>"></i>
          <span class="menu-text"> <?php echo $menu['menuName'] ?> </span>
          </a>
          <b class="arrow"></b>
        </li>
        <?php
          endforeach;
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<script type="text/javascript">
    function menuActive( id ){
        // var a =document.getElementById("menu").children[num-1].className="active";
        if( id == "" )
          var a =document.getElementById("home").className="active";
        else
          var a =document.getElementById(id).className="active";
        console.log(a);
    }
</script>




