<div class="topnav">
<div>
    	<form class="form-horizontal" action="<?php echo base_url() ?>user/index" method="get">
    	<h3 style="text-align:left">Filter Data</h3>
			<div class="col-sm-2">
				<input type="text" name="username" placeholder="Username..." class="form f-small">
			</div>
			<div class="col-sm-2">
				<input type="text" name="phone" placeholder="Nomor Telepon..." class="form f-small">
			</div>
			<div class="col-lg-3">
				<div class="form-group input-group" style="margin:0">
					<span class="input-group-btn">
						<!-- <button type="reset" class="btn btn-white reset"><i class="fa fa-refresh"></i></button> -->
						<!-- <button type="button" class="btn btn-primary filters"><i class="fa fa-search"></i></button> -->
						<?php echo form_submit(array('class' => 'button f-small save', 'value' => 'Cari', 'style' => 'height:37px;width:50px')); ?>
					</span>
				</div>
			</div>
		</form>
		<div class="col-sm-3" style="float: right !important;">
			<a href="<?php echo base_url() ?>user/add" style='color: #fff'><div class='button f-small save' style="width: 100px !important;margin-right: 30px; ">+ Tambah Data</a>
		</div>
			<div><br/><br/></div>	
<br/><br/>
</div>
<br><br>
<h1>
</div>