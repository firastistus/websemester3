<head>
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
		background: #fcfcfc; /* For browsers that do not support gradients */
		background: -webkit-linear-gradient(left, #f4f4f4, #ccc); /* For Safari 5.1 to 6.0 */
		background: -o-linear-gradient(right, #f4f4f4, #ccc); /* For Opera 11.1 to 12.0 */
		background: -moz-linear-gradient(right, #f4f4f4, #ccc); /* For Firefox 3.6 to 15 */
		background: linear-gradient(to right, #f4f4f4 ,#cccw); /* Standard syntax */
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
	.form{width: 70%;
		height: 30px;
		padding: 7px;
		border: 1px solid #ccc;
		border-radius: 4px;
		margin: 5px;
		font-size: 15pt;
		color: #777777;
		font-family: calibri;
	}
	.t_right{
		width: 120px !important;
	}
	.button{
	display: inline-block;
	padding: 10px;
	margin-bottom: 0;
	font-size: 14px;
	font-weight: 400;
	border: 1px solid transparent;
	border-radius: 4px;
	float: right;
	}
	.save{
		color: #fff;
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
	.thead{
		background-color: #fafafa;
	}
	.section{
		background: #eee;
		border:solid 1px #ccc;
		width:100%;
		height:auto;
		padding: 40px;
		margin: 10% 0% 0% 0%;
	}
	.topbar{
		margin-top: -30px;
		height: 80px;
		width: 100%;
		padding:5px;
		background: #fcfcfc;
		overflow: hidden;

	}
	.f-small{
		margin: 5px;
		float: left;
		width: 50px relative;
	}
	</style>
</head>
<body id="grad">

<center>
<div class="section" style="width: 400px;border-radius:0.3em;">
	<img src="<?= base_url(); ?>assets/images/logo.png" style="width: 50%;">
	<br/>
	<br/>
	<!-- <form action="<?=base_url();?>welcome" method='post'> -->
	<?php echo form_open('sessions/user_login_process') ?>
		<?php if(isset($alert)){?>
			<div class="alert-dismissable alert-danger" style="color:red; margin-top:0px">
				<center><b><?php echo $alert ?></b></center>
			</div>
			<br>
		<?php } ?>
		<div class="">
			<input type="text" name="username" class="form" placeholder="Username">			
		</div>
		<div class=" log-status">
			<input type="password" name="encrypted_password" class="form" placeholder="Password">
		</div>
		<br/>
		<table style="border: 0;width: 80%">
		<tr>
		<td width="50%">
			<div style="float:left">
			<input  type="checkbox" value="Masuk" class="button save" >
			</div>
			<div style="float:left">
			<span style="color: #eeee"><a href="#" style="color: #333333">&nbsp;&nbsp;Remember Me !</a></span>
			</div>
		</td>
		<td width="50%">
			<div class=" log-status">
			<input  type="submit" value="Masuk" class="button save" >
			</div>
		</td>
		</tr></table>
		
		
	<?php echo form_close(); ?>
</div>
</center>
</body>