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
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
              <table id="tableDocument" class="table table-striped table-bordered table-hover">
                <thead class="thin-border-bottom">
                  <tr >
                    <th style="width:50px">No</th>
                    <th>Nama</th>
                    <th>IPK </th>
                    <th>Semester</th>
                    <th>Gaji Orang Tua</th>
                    <th>Tanggungan Orang Tua</th>
                    <th>UKT</th>
                    <th>Label</th>
                    <th>X</th>
                    
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
                            <?php echo $file->user_profile_fullname  ?>
                        </td>
                        <td>
                            <?php echo $file->data_IPK ?>
                        </td>
                        <td>
                            <?php echo $file->data_semester ?>
                        </td>
                        <td>
                            <?php echo $file->data_gaji_ortu ?>
                        </td>
                        <td>
                            <?php echo $file->data_tanggungan ?>
                        </td>
                        <td>
                            <?php echo $file->data_UKT ?>
                        </td>
                        <td>
                            <?php echo  ( $file->data_label == 1 )? "LULUS" : ( ( $file->data_label == 0 )? "TIDAK LULUS" : "BELUM DI UJI"   )  ?>
                        </td>
                        <td>
                            <?php echo  ( $file->tetangga_terdekat)  ?>
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

    
  </section>
</div>
