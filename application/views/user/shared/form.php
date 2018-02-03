<?php $this->load->view('shared/errors'); ?>

<div style="margin: 70px 0px 50px 0px;width:97%;text-align: left;height: auto;border: 0px solid #333;position: relative;">	

<div style="width: 100%;float: left;padding: 1px;border: 0px solid #333">
	<div>
		<div>
			<legend>
			<h1>Masukan Data Baru </h1>
			<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'add') { ?>
				<?php echo form_open('user/create'); ?>
			<?php }else{ ?>
				<?php echo form_open('user/update'); ?>
			<?php }?>
		</legend>
		<center>
			<table class="normal" style="width: 60%;padding: 20px;">
				<tr><td colspan="3"><h3>Informasi Akun</h3></td></tr>
				<tr><td><label class="pull-left"><label>Username</label></label></td><td>:</td><td><input type="hidden" class="form" name="id" value="<?php echo isset($user) ? $user->id : ''; ?>">
				<input type="text" class="form" name="username" placeholder="Your Username ..." value="<?php echo isset($value['username']) ? $value['username'] : isset($user) ? $user->username : '' ?>"></td></tr>

				<tr><td><label class="pull-left">Password</label></td><td>:</td><td><input type="password" id="example-email" name="encrypted_password" class="form" placeholder="Password" value="<?php echo isset($value['encrypted_password']) ? $value['encrypted_password'] : isset($user) ? $user->encrypted_password : '' ?>"></td></tr>

				<tr><td><label class="pull-left">Email</label></td><td>:</td><td><input type="email" id="example-email" name="email" class="form" placeholder="Email" value="<?php echo isset($value['email']) ? $value['email'] : isset($user) ? $user->email : '' ?>"></td></tr>

				<tr><td><label class="pull-left">Telepon</label></td><td>:</td><td><input type="hidden" class="form" name="role_id" value="3"> 
				<input type="text" class="form" name="phone" placeholder="Your Phone Number..." value="<?php echo isset($value['phone']) ? $value['phone'] : isset($user) ? $user->phone : '' ?>"></td></tr>
				
				<tr><td colspan="3"><h3>Data Pribadi</h3></td></tr>
				<tr><td><label class="pull-left">Nama Lengkap</label></td><td>:</td><td><input type="text" class="form" name="fullname"  placeholder="Your Fullname ..." value="<?php echo isset($value['fullname']) ? $value['fullname'] : isset($user) ? $user->fullname : '' ?>"></td></tr>

				<tr><td><label class="pull-left">NIK</label></td><td>:</td><td><input type="text" class="form" name="nik"  placeholder="Your NIK ..." value="<?php echo isset($value['nik']) ? $value['nik'] : isset($user) ? $user->nik : '' ?>"></td></tr>

				<tr><td><label class="pull-left">Tanggal Lahir</label></td><td>:</td><td><input type="date" class="form" id="" name="birthday" value="<?php echo isset($value['birthday']) ? $value['birthday'] : isset($user) ? $user->birthday : '' ?>">
					<span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span></td></tr>

				<tr><td><label class="pull-left">Tempat Lahir</label></td><td>:</td><td><select class="form" name="city">
					<option  value="">Pilih Kota</option>                    
					<option  value="Jakarta">Jakarta</option>                    
					<option  value="Bogor">Bogor</option>                    
					<option  value="Depok">Depok</option>                    
					<option  value="Tanggerang">Tanggerang</option>                    
					<option  value="Tanggerang">Tanggerang</option>                    
				</select>  </td></tr>

				<tr><td><label class="pull-left">Jenis Kelamin</label></td><td>:</td><td><select class="form" name="gender">
					<option  value="">Pilih Jenis Kelamin</option>                    
					<option  value="L">Laki-Laki</option>                    
					<option  value="P">Perempuan</option>                           
				</select>  </td></tr>

				<tr><td><label class="pull-left">Alamat</label></td><td>:</td><td><textarea class="form" rows="5" name="address" value="<?php echo isset($value['address']) ? $value['address'] : isset($user) ? $user->address : '' ?>"><?php echo isset($value['address']) ? $value['address'] : isset($user) ? $user->address : '' ?></textarea></td></tr>


				<tr><td><label class="pull-left"></label></td><td>:</td><td><?php echo form_submit(array('class' => 'button save', 'value' => 'Simpan')); ?>
		<a href="<?= base_url(); ?>user" type="button" class=" button back" value="Kembali">Kembali</a>
		<div><br/></div><?php echo form_close(); ?></td></tr>
			</table>
		</div>
	</div>
</div>
</div>

<div><br/></div>