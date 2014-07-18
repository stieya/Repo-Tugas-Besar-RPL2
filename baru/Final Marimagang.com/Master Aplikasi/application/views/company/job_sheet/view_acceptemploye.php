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
			<a href="<?php echo base_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Yuk</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
		</div>
	</div>
	
	<div class="modal-dialog text-center" style="width:40%;margin-left:30%;margin-top:120px;background:#95a5a6;" >
		<div class="modal-content">
			<div class="modal-head">
				<h3>Pelamar Telah Diterima</h3>
				</p>
			</div>
			<div class="modal-body text-center">
				<p>
					JobSheet ini sekarang berada dalam status sedang dikerjakan.
				</p>
				<p>
					<a href="">Kembali Ke Halaman Sebelumnya</a>
				</p>
			</div>			 
			<div class="modal-footer" style="background:#7f8c8d">
				&copy; YukMagang.com
			</div>
		</div>
	</div>	
		
	<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
			window.location.href = '<?php echo base_url(); ?>company/dashboard';
		},4000);
	});
	
	</script>
</body>
</html>