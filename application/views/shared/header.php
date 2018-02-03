<head>
	<meta charset="utf-8">
	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 14px/20px normal Tahoma, Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
		#grad {
		background: red; /* For browsers that do not support gradients */
		background: -webkit-linear-gradient(left, red , yellow); /* For Safari 5.1 to 6.0 */
		background: -o-linear-gradient(right, red, yellow); /* For Opera 11.1 to 12.0 */
		background: -moz-linear-gradient(right, red, yellow); /* For Firefox 3.6 to 15 */
		background: linear-gradient(to right, red , yellow); /* Standard syntax */
		}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	.section{
		width:100%;
		height:auto;
		padding: 5px;
		border: 0px solid #D0D0D0;
		margin-top: 0px;
		position: relative;
	}
	.topbar{margin:-20px}
	.topnav{margin:60px 50px 50px 50px;}
	.menu{width:500px;z-index: 9}
	.menu-list{width: auto;height:30px;padding:20px;background: #e8c30d;position: relative;}
		.menu-list:hover{background: #f4d641;}
		a.menu-link{color: #fff}
	ul{float: right;margin-right: 100px;list-style: none;display: inline-block;} 
	li{float: right; }
	}
	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.form{width: 100%;
		padding: 7px;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	.t_right{
		width: 120px !important;
	}
	.button{
		display: inline-block;
	padding: 6px 12px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: 400;
	border: 1px solid transparent;
	border-radius: 4px;
	}
	.save{
		color: #fff !important;
	background-color: #5cb85c;
	border-color: #4cae4c;
	}
	.back{
		color: #fff;
background-color: #d9534f;
border-color: #d43f3a;
	}
	.link{
background-color: #fff;
border-color: #ccc;
	}
	table{
		border: solid 1px #ccc;
	}
	td{
		padding: 10px;
	}
	thead{
		background-color: #f2f2f2;
		
	}
	table.normal td{padding: 5px;}
	th{
		padding: 10px;
	}
	.f-small{
		margin: 5px;
		float: left;
		width: 180px;
		height: 20px
	}
	.f-smaller{
		font-size: 10px;
		margin: 5px;
		float: left;
		width: 20px;
		height: 20px;
		padding: 3px !important;
	}
	a{text-decoration: none}
	tr:hover{
		background: #fcfcfc;
	}
	</style>
</head>
<div class="topbar">
	<!-- LOGO -->
	<div class="topbar-left">
		<div class="section">
			<div class="menu" style="float: right;">
				<ul>
				<li>	
					<a class="menu-link" href="<?= base_url(); ?>sessions/logout">
					<div class="menu-list">Keluar</a></div></a>					
				</li>
				<li>
					<a class="menu-link" href="<?= base_url(); ?>user/show/<?php echo $this->session->userdata['current_user'] ?>"><div class="menu-list">Pengaturan</div></a>
				</li>
				<li>
					<a class="menu-link" href="<?=base_url();?>user/index">
					<div class="menu-list">Data Penduduk</div></a>
				</li>
				</ul>
			</div>
			<div>
			<img src="<?= base_url(); ?>assets/images/logo.png" style='width: 290px;'>
			<a href="<?= base_url(); ?>user/index"></i><span></span></a>		
			</div>	
		</div>
	</div>
</div>