<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Website Firas Widyatama</title>
	
</head>
<body class="fixed-left">
	<header id="topnav">
		<?php $this->load->view('shared/header'); ?>
			<?php $this->load->view('shared/breadcum')?>
	</header>
	<div class="section">
	<center>
			<?php if($middle) echo $middle; ?>
	</center>	
	</div>
	<div>
		<?php $this->load->view('shared/footer'); ?>
	</div>
</body>
</html>