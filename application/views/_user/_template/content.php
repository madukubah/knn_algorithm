<!-- Full Width Column -->
<div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Selamat Datang
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
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
        <div class="row">
          <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary"> 
                <div class="box-body box-profile">
                  <?php if( !empty($this->session->userdata('user_profile_image_path')) ): ?>
                      <img class="profile-user-img img-responsive " src="<?php echo base_url( "upload/user/" ).$this->session->userdata('user_profile_image_path') ?> " alt="User profile picture">
                  <?php else : ?>
                  <img class="profile-user-img img-responsive " src="<?php echo base_url( "upload/user/" ).$this->session->userdata('user_profile_image_path') ?> " alt="Belum Ada Foto">
                  <?php endif; ?>
                  <h3 class="profile-username text-center"><?php echo $this->session->userdata('user_profile_fullname')?></h3>
                  <!-- <p class="text-muted text-center">Software Engineer</p> -->
                  <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#UploadPhoto">
                      Ganti Foto
                  </button>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="UploadPhoto" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><b>Ganti Foto </b></h4>
                            </div>
                            <div class="modal-body">
                              <?php echo form_open_multipart( "profile/upload" ) ;?>
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
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" class="form-control" value='<?php echo $user[0]->user_id ; ?>' name="user_id" required="required" readonly>
                                <input type="hidden" class="form-control" value='<?php echo $user[0]->user_profile_image_path ; ?>' name="user_old_images" required="required" readonly>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Infomasi Dasar</a></li>
              <li><a href="#timeline" data-toggle="tab"> Beasiswa</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                  <br>
                  <a href="<?php echo site_url('profile/edit');?>" class="btn-sm btn-primary">Lengkapi Data</a>
                  <br><br>
                        <span class="username">
                            <table>
                              <tr>
                                <td>Nama &nbsp&nbsp</td><td>:</td><td> &nbsp&nbsp<?php echo $user[0]->user_profile_fullname ." ( ".$user[0]->user_username." ) "  ?> </td>
                              </tr>
                              <tr>
                                <td>Alamat &nbsp&nbsp</td><td>:</td><td> &nbsp&nbsp<?php  echo ( empty( $user[0]->user_profile_address ) ) ? "-" :  $user[0]->user_profile_address ?> </td>
                              </tr>
                              <tr>
                                <td>Email &nbsp&nbsp</td><td>:</td><td>&nbsp&nbsp<?php  echo ( empty( $user[0]->user_profile_email ) ) ? "-" :  $user[0]->user_profile_email ?> </td>
                              </tr>
                              <tr>
                                <td>Telepon &nbsp&nbsp</td><td>:</td><td>&nbsp&nbsp<?php  echo ( empty( $user[0]->user_profile_phone ) ) ? "-" :  $user[0]->user_profile_phone ?> </td>
                              </tr>
                            </table>
                        </span>
                  </div>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <li>
                    <div class="timeline-item">
                      <h3 class="timeline-header"><a href="#">Data Pengaju Beasiswa</a></h3>

                      <div class="timeline-body">
                        
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>