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

          <a href="<?php echo site_url('home')?>">My Document</a>

        </li>

        

      </ul>

      <!-- /.breadcrumb -->

    </div>

    <!-- alert  -->

    <?php

        if($this->session->flashdata('edit_kamar')){

            if( $this->session->flashdata('edit_kamar')['from'] ){

                echo"

                <div class=' alert alert-success alert-dismissible'>

                <h4><i class='icon fa fa-globe'></i> Information!</h4>".

                $this->session->flashdata('edit_kamar')["message"].

                "</div>

                ";

            }else{

                echo"

                <div class='alert alert-danger alert-dismissible'>

                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>

                <h4><i class='icon fa fa-ban'></i> Alert!</h4>".

                $this->session->flashdata('edit_kamar')["message"].

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

          <div class="row">

            <div class="col-xs-6"> 

              <h2> Kost : <?php echo $info_kost[0]->kost_name ?> </h2>

              <h4> Alamat : <?php echo $info_kost[0]->kost_address ?> </h4>

              <h4> <?php echo $info_kost[0]->kost_keterangan ?> </h4>
            </div>
            <div class="col-xs-6"> 
              <center>

                <div style="background-color: grey ; padding : 8px">

                <img src="<?php echo base_url()."upload/kost/".$info_kost[0]->kost_photo  ?>" alt="" height="300" width="auto" >

                </div>

              </center>

            </div>

          </div>

          <!-- <h2>Welcome, <?php echo $this->session->userdata('user_profile_fullname') ?>  </h2> -->

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

                            <th>Tipe Kamar</th>

                            <th>Panjang X Lebar</th>

                            <th>Harga/Tahun  </th>

                            <th>Foto</th>

                            <th style="width: 20%" >Fasilitas</th>

                            <th>Jumlah Kamar</th>

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

                                    <?php echo $file->kamar_type ?>

                                </td>

                                <td>

                                    <?php echo $file->kamar_panjang." X ".$file->kamar_lebar ?>

                                </td>

                                <td>

                                    <?php echo  "Rp. ".$file->kamar_harga ?>

                                </td>

                                <td>
                                    <!-- IMAGE -->
                                    <?php
                                        // $images = $file->kamar_foto;
                                        $images = explode(";", $file->kamar_foto );
                                        $i=0;
                                        foreach( $images as $image ):
                                    ?>
                                        <a href="" data-toggle="modal" data-target="#image<?php echo  $file->kamar_id.$i  ;?>"><?php echo $image;?></a>
                                        <br>
                                        <div class="modal fade" id="image<?php echo  $file->kamar_id.$i  ;?>" role="dialog">
                                            <div class="modal-dialog">
                                            <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title"><b>#Image Preview</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <div class="box-body">
                                                    <img src="<?php echo base_url()."upload/kamar/".$image  ?>" alt="" height="auto" width="500" >
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

                                    <?php echo str_ireplace( ";", " , ", $file->kamar_facility )  ?>

                                </td>

                                <td>
                                    <?php 
                                        echo  $file->kamar_quantity ;
                                    ?>
                                </td>

                                <td>

                                  <button class="btn btn-white btn-info btn-bold btn-xs" data-toggle="modal" data-target="#editModalDocument<?php echo $file->kamar_id ;?>">

                                      <i class="ace-icon fa fa-edit bigger-120 blue"></i>

                                  </button>

                                  <!--  -->

                                  <button class="btn btn-white btn-danger btn-bold btn-xs" data-toggle="modal" data-target="#deleteModalDocument<?php echo $file->kamar_id ?>">

                                    <i class="ace-icon fa fa-trash bigger-120 red"></i>

                                </button>

                                </td>

                              </tr>

                              <!-- Modal Edit-->

                                <div class="modal fade" id="editModalDocument<?php echo $file->kamar_id?>" role="dialog">

                                    <div class="modal-dialog">

                                    <!-- Modal content-->

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            <h4 class="modal-title"><b>#Edit Kamar</b></h4>

                                        </div>

                                        <div class="modal-body">

                                        <?php echo form_open_multipart( "kost/edit_kamar" ) ;?>

                                        <div class="box-body">

                                            <div class="form-group">

                                                <!--  -->

                                                <input id="" type="text" name="kost_id" value="<?php echo $info_kost[0]->kost_id ?>"  hidden readonly />

                                                <input id="" type="text" name="kamar_id" value="<?php echo $file->kamar_id ?>"  hidden readonly />

                                                <input id="" type="text" name="kepemilikan_id" value="<?php echo $file->kepemilikan_id ?>"  hidden readonly />
                                                <input id="" type="text" name="kamar_old_photo" value="<?php echo $file->kamar_foto ?>"  hidden readonly />

                                                <!--  -->

                                            </div>

                                            <div class="form-group">

                                                <!--  -->

                                                <label for="">Tipe Kamar</label>

                                                <label class="block clearfix">

                                                    <span class="block input-icon input-icon-right">

                                                        <input id="" type="text" class="form-control" placeholder="Tipe Kamar" name="kamar_type" value="<?php echo $file->kamar_type ?>" />

                                                    </span>

                                                </label>

                                                <span style="color:red"><?php echo form_error('kamar_type'); ?></span>

                                                <!--  -->

                                            </div>

                                            <div class="form-group">

                                              <!--  -->

                                              <label for="">Harga (Rp/Tahun) </label>

                                              <label class="block clearfix">

                                                  <span class="block input-icon input-icon-right">

                                                      <input id="" type="number" class="form-control" placeholder="Harga" name="kamar_harga" value="<?php echo $file->kamar_harga ?>" />

                                                  </span>

                                              </label>

                                              <span style="color:red"><?php echo form_error('kamar_harga'); ?></span>

                                              <!--  -->

                                            </div>

                                            <div class="form-group">

                                              <!--  -->

                                              <label for="">Panjang (m)</label>

                                              <label class="block clearfix">

                                                  <span class="block input-icon input-icon-right">

                                                      <input id="" type="number" class="form-control" placeholder="Panjang" name="kamar_panjang"  value="<?php echo $file->kamar_panjang ?>" />

                                                  </span>

                                              </label>

                                              <span style="color:red"><?php echo form_error('kamar_panjang'); ?></span>

                                              <!--  -->

                                            </div>

                                            <div class="form-group">

                                              <!--  -->

                                              <label for="">Lebar (m)</label>

                                              <label class="block clearfix">

                                                  <span class="block input-icon input-icon-right">

                                                      <input id="" type="number" class="form-control" placeholder="Lebar" name="kamar_lebar" value="<?php echo $file->kamar_lebar ?>" />

                                                  </span>

                                              </label>

                                              <span style="color:red"><?php echo form_error('kamar_lebar'); ?></span>

                                              <!--  -->
                                              <!--  -->

                                              <label for="">jumlah Kamar</label>

                                                <label class="block clearfix">

                                                    <span class="block input-icon input-icon-right">

                                                        <input id="" type="number" class="form-control" placeholder="Jumlah" name="kamar_quantity"  value="<?php echo $file->kamar_quantity ?>"/>

                                                    </span>

                                                </label>

                                                <span style="color:red"><?php echo form_error('kamar_quantity'); ?></span>

                                                <!--  -->

                                            </div>

                                            <div class="form-group">

                                              <!--  -->

                                              <label for="">Fasilitas</label>
                                              <br>
                                                  <?php
                                                      if(isset($facilities))
                                                      {
                                                          $n=1;
                                                          $f = (explode(";", $file->kamar_facility ));
                                                          foreach($facilities as $t)
                                                          {
                                                              echo form_checkbox('kamar_facility[]', $t->facility_name, set_checkbox('kamar_facility[]', $t->facility_name), ''.is_checked( $t->facility_name, $f ).'  id="basic_checkbox_'.$n.'"');
                                                              echo '<label for="basic_checkbox_'.$n.'">';
                                                              echo $t->facility_name;
                                                              echo '</label> <br> ';
                                                              $n++;
                                                          }
                                                      }
                                                  ?>

                                                <span style="color:red"><?php echo form_error('kamar_keterangan'); ?></span>

                                               <!--  -->

                                            </div>

                                            <!-- <div class="row">

                                                <div class="col-xs-6">

                                                    <div class="form-check form-check-inline">

                                                        <input class="form-check-input"  <?php if( $file->kepemilikan_status ==1 ) echo 'checked="true"' ?>  type="radio" name="kepemilikan_status" id="inlineRadio1" value="1">

                                                        <label class="form-check-label" for="inlineRadio1">tersedia (kosong)</label>

                                                    </div>

                                                </div>

                                                <div class="col-xs-6">

                                                    <div class="form-check form-check-inline">

                                                        <input class="form-check-input" type="radio" <?php if( $file->kepemilikan_status ==0 ) echo 'checked="true"' ?> name="kepemilikan_status" id="inlineRadio2" value="0">

                                                        <label class="form-check-label" for="inlineRadio2">tidak tersedia (digunakan)</label>

                                                    </div>

                                                </div>

                                            </div> -->

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

                                <div class="modal fade" id="deleteModalDocument<?php echo  $file->kamar_id;?>" role="dialog">

                                    <div class="modal-dialog">

                                    <!-- Modal content-->

                                    <div class="modal-content">

                                        <?php echo form_open("kost/delete_kamar");?>

                                        <div class="modal-header">

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        <h4 class="modal-title">#Hapus Kamar</h4>

                                        </div>

                                        <div class="modal-body">

                                        <div class="alert alert-danger">Anda yakin menghapus kamar tipe <b><?php echo $file->kamar_type ?></b>" ?</div>

                                        </div>

                                        <div class="modal-footer">

                                        <input type="hidden" class="form-control" value='<?php echo $file->kamar_id; ?>' name="kamar_id" required="required" readonly>

                                        <input type="hidden" class="form-control" value='<?php echo $file->kost_id; ?>' name="kost_id" required="required" readonly>

                                        <input type="hidden" class="form-control" value='<?php echo $file->kepemilikan_id ; ?>' name="kepemilikan_id" required="required" readonly>

                                        <input type="hidden" class="form-control" value='<?php echo $file->kamar_foto ; ?>' name="kamar_foto" required="required" readonly>

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