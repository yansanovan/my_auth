<div class="content-wrapper" style="min-height: 460px;">
	<section class="content-header">
        <h1><i class="fa fa-pencil" aria-hidden="true"></i> ADD USERS</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-pencil"></i> Add users</a></li>
        </ol>
    </section>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header"><br>
						<?= $this->session->flashdata('msgbox');?>
						<?=  form_open_multipart('superadmin/store');?>
						<div class="col-md-12">
							<div class="form-group">
								<?= form_label('Username', 'Username');?>
								<?= form_input(['type'=> 'text', 'name'=>'username', 'value'=> set_value('username'), 'class'=> 'form-control', 'placeholder'=>'Input username']);?>
								<?= form_error('username');?>
							</div>
							<div class="form-group">
								<?= form_label('Email', 'email');?>
								<?= form_input(['type'=> 'email', 'name'=>'email', 'value'=> set_value('email'), 'class'=> 'form-control', 'placeholder'=>'Input email ']);?>
								<?= form_error('email');?>
							</div>
							<div class="form-group">
								<?= form_label('Password', 'Password');?>
								<?= form_input(['type'=> 'password', 'name'=>'password', 'value'=> set_value('password'), 'class'=> 'form-control', 'placeholder'=>'Input password ']);?>
								<?= form_error('password');?>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">level</label>
								<div class="form-group">
									<select class="form-control" name="level">
									  	<option value="">Chosee Level . . .</option>
									  	<option value="kepolisian">Kepolisian</option>
									  	<option value="kejaksaan">Kejaksaan</option>
									  	<option value="pengadilan">Pengadilan</option>
									  	<option value="lapas">Lapas</option>
									</select>
								</div>
								<?= form_error('level');?>
							</div>
						</div>
						<center><button class="btn btn-primary"><i class="fa fa-send" aria-hidden="true"></i>  Submit</button></center><br>
					</div>
					<?= form_close();?>
				</div>
			</div>
		</div>
	</section>
</div>