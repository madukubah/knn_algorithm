<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<section class="content">
        <div class="container-fluid">
		<ol class="breadcrumb breadcrumb-bg-indigo">
                <li><a href="<?php echo site_url('admin');?>"><i class="material-icons">home</i> Beranda</a></li>
                <li class="active"><i class="material-icons">person</i><?php echo $this->ion_auth->user()->row()->username;?></li>
            </ol>
		<!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Halaman Profil
                                
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php echo form_open('');?>
                                <div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('first_name');
											echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
											echo form_label('First name','first_name', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('last_name');
											echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
											echo form_label('Last name','last_name', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('company');
											echo form_input('company',set_value('company',$user->company),'class="form-control"');
											echo form_label('Company','company', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('phone');
											echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
											echo form_label('Phone','phone', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('username');
											echo form_input('username',set_value('username',$user->username),'class="form-control" readonly');
											echo form_label('Username','username', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('email');
											echo form_input('email',set_value('email',$user->email),'class="form-control" readonly');
											echo form_label('Email','email', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('password');
											echo form_password('password', '', 'class="form-control"');
											echo form_label('Change password','password', 'class="form-label"');
										?>
                                    </div>
                                </div>
								<div class="form-group form-float">
                                    <div class="form-line">
										<?php
											echo form_error('password_confirm');
											echo form_password('password_confirm', '', 'class="form-control"');
											echo form_label('Confirm changed password','password_confirm', 'class="form-label"');
										?>
                                    </div>
                                </div>
										
								<?php echo form_submit('submit', 'Simpan Data Profil', 'class="btn btn-primary m-t-15 waves-effect"');?>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
		</div>
	</section>