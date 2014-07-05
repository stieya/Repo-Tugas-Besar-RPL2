<!doctype html>
<html>
<head>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/bootstrap.min.css">
	<!-- Bootstrap responsive -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/bootstrap-responsive.min.css">
	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/jquery-ui/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
	<!-- PageGuide -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/pageguide/pageguide.css">
	<!-- Fullcalendar -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/fullcalendar/fullcalendar.css">
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/fullcalendar/fullcalendar.print.css" media="print">
	<!-- chosen -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/chosen/chosen.css">
	<!-- select2 -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/select2/select2.css">
	<!-- icheck -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/plugins/icheck/all.css">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/style.css">
	<!-- Color CSS -->
	<link rel="stylesheet" href="<?php echo site_url(); ?>css/themes.css">


	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<!-- Nice Scroll -->
	<script src="<?php echo base_url(); ?>js/plugins/nicescroll/jquery.nicescroll.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?php echo base_url(); ?>js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
	<script src="<?php echo base_url(); ?>js/plugins/jquery-ui/jquery.ui.sortable.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	
	<!-- Theme framework -->
	<script src="<?php echo base_url(); ?>js/eakroko.min.js"></script>
	<!-- Theme scripts -->
	<script src="<?php echo base_url(); ?>js/application.min.js"></script>
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo site_url(); ?>img/favicon.ico" />

	<link rel="stylesheet" href="<?php echo site_url(); ?>css/costum.css">

</head>

<body>
	<div id="navigation" style="height:40px;">
		<div class="container-fluid">
			<a href="<?php echo site_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Yuk</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
		</div>
	</div>
	
	<div class="modal-dialog text-center" style="width:40%;margin-left:30%;margin-top:120px;background:#95a5a6;" >
		<div class="modal-content">
			<div class="modal-head">
				<h3>Student Login</h3>
				<p>Gunakan Email Anda Untuk Dapat Memasuki YukMagang.com</p>
				<?php if($error) : ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						Kombinasi <strong>Password dan Email!</strong> Tidak Sesuai
				</div>
				<?php endif; ?>
			</div>
			<div class="modal-body">
			<?php echo validation_errors(); ?>
			<?php echo form_open(); ?>
				<table class="table">
					<tr>
						<td>Email</td>
						<td><?php echo form_input('email'); ?></td>
					</tr>
					<tr>
						<td>Password</td>
						<td> <?php echo form_password('password'); ?> </td>
					</tr>
					<tr>
						<td></td>
						<td> <input type="submit" value="Login" class="btn btn-primary" /> </td>
					</tr>
				</table>
			<?php echo form_close(); ?>
			</div>			 
			<div class="modal-footer" style="background:#7f8c8d">
				<a href="signup/"><button value="Daftar" class="btn btn-primary" />Register</button></a>
				&copy; YukMagang.com
			</div>
		</div>
	</div>	
</body>
</html>