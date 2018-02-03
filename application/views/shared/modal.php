<div class="modal fade over-flow-none table-responsive" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- <form accept-charset="UTF-8" action="transaction/create_layanan" enctype="multipart/form-data" method="post" data-remote="true"> -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Tambah Layanan </h4>
				</div>
				<div class="modal-body opa">
					
					<input type="hidden" name="diagnosis_id" value="<?php echo $price_diagnosis->diagnosis_id ?>" id="diagnosis_id">
				</div>
				<div class="modal-footer">
					<div class="modal-footnote pull-left"></div>
					<a type="button" class="btn btn-white modal-close" data-dismiss="modal" href="#">Close</a>
					<button type="button" class="btn btn-primary modal-save">Simpan</button>
				</div>
			<!-- </form> -->
		</div>
	</div>
</div>
