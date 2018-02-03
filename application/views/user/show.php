<div style="margin: 70px 0px 50px 0px;width:97%;text-align: left;height: auto;border: 0px solid #333;position: relative;">	
<div style="width: 30%;float: left;padding: 0px;border: 0px solid #333;position: relative;">
		<legend>
			<h1>Detail Data <?php echo $user->fullname ?></h1>
		</legend>
		<div style="margin: 80px;">
			<img src="<?= base_url(); ?>assets/images/people.jpg" class="pull-right">	
		</div>
</div>
<div style="width: 40%;float: left;padding: 1px;border: 0px solid #333">
	<div>
		<div>
			
			<table class="normal">
				<tr><td colspan="3"><h3>Informasi Kontak</h3></td></tr>
				<tr><td><label class="pull-left">Username</label></td><td>:</td><td><?php echo $user->username ?></td></tr>
				<tr><td><label class="pull-left">Email</label></td><td>:</td><td><?php echo $user->email ?></td></tr>
				<tr><td><label class="pull-left">Nomor Telepon</label></td><td>:</td><td><?php echo $user->phone ?></td></tr>
				<tr><td colspan="3"><h3>Data Pribadi</h3></td></tr>
				<tr><td><label class="pull-left">Nama Lengkap</label></td><td>:</td><td><?php echo $user->fullname ?></td></tr>
				<tr><td><label class="pull-left">Tempat/Tanggal Lahir</label></td><td>:</td><td><?php echo $user->birthday ?></td></tr>
				<tr><td><label class="pull-left">Jenis Kelamin</label></td><td>:</td><td><?php echo $user->birthday ?></td></tr>
				<tr><td><label class="pull-left">Agama</label></td><td>:</td><td><?php echo $user->birthday ?></td></tr>
				<tr><td><label class="pull-left">Alamat</label></td><td>:</td><td><?php echo $user->address ?></td></tr>
				<tr><td><label class="pull-left">Terdaftar</label></td><td>:</td><td></td></tr>
				<tr><td colspan="3"><h3>Aktifitas</h3></td></tr>
				<tr><td><label class="pull-left">Login Terakhir</label></td><td>:</td><td></td></tr>
			</table>
		</div>
	</div>
</div>
<div style="width: 28%;float: left;padding: 1px;border: 0px solid #333;height: 550px;">
		<h1>Pengaturan</h1>
		<a href="<?= base_url(); ?>user/edit/<?php echo $user->id ?>" type="button" class="button save">Edit</a>
		<a href="<?= base_url(); ?>user" type="button" class=" button back" value="Kembali">Kembali</a>				
</div>
</div>