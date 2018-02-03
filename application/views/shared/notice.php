<style type="text/css">
	.notice-notice{
		background-color: #7EE09E;
		padding: 10px;
		color: #0e7139;
	}
</style>

<?php if (isset($this->session->userdata['message'])){ ?>
	<div class="col-md-12">
		<div class="notice notice-dismissable notice-notice">
			<button type="button" class="close" data-dismiss="notice">×</button>
			<b><?php echo $this->session->userdata['message'] ?></b>
		</div>
	</div>
<?php } ?>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>

<script type="text/javascript">
	$(".close").on("click", function(){
		$(this).parent().parent().remove();
		$.ajax({
			type: "GET",
			url: "/mytrex/sessions/remove_message/",
			dataType: "script",
			data: {}
		});
	})
</script>