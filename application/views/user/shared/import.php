<div class="col-sm-12">
    <div class="card-box">
    <h4 class="m-t-0 header-title"><b>Import Data Penduduk</b></h4>
    		<div class="clearfix"></div>	
		<form class="form-horizontal" action="<?php echo base_url() ?>user/upload" method="post" enctype="multipart/form-data">
			<div class="col-sm-8">
				<input type="file" name="users" placeholder="Pilih File" class="form-control">
			</div>
			<div class="col-sm-4">
			<button type="submit" class="btn btn-white waves-effect waves-light pull-right"><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Import File</span></button>
			</div>
		</form>
			<div class="clearfix"></div>	
	</div>
</div>