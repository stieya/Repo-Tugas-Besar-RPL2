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
	<!-- Touch enable for jquery UI -->
	<script src="<?php echo base_url(); ?>js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
	<!-- slimScroll -->
	<script src="<?php echo base_url(); ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
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
		<div id="main" style="margin-left:20px;">
			<div class="container-fluid">
				<div class="page-header">
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Daftarkan Perusahaan Anda
								</h3>

							</div>
								<div class="text-center">
									<?php echo validation_errors(); ?>
								</div>
								
							<div class="box-content nopadding">
									<?php echo form_open('','class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="textfield" class="control-label">Email</label>
										<div class="controls">
											<input type="text" name="email" value="" placeholder="E-Mail Anda">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Nama Perusahaan</label>
										<div class="controls">
											<input type="text" name="nama" placeholder="Nama Perusahaan">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Alamat Perusahaan</label>
										<div class="controls">
											<input type="text" name="alamat" placeholder="Alamat Perusahaan">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Kode Pos Perusahaan</label>
										<div class="controls">
											<input type="text" name="kode_pos" placeholder="Kode Pos Perusahaan">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Telepon</label>
										<div class="controls">
											<input type="text" name="telepon" placeholder="Telepon Perusahaan">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Kota Asal</label>
										<div class="controls">
											<div class="input-xlarge"><select name="kota" id="select" class='chosen-select'>
												<?php foreach ($kota as $result) : ?> 
												<option value="<?php echo $result->id_kota; ?>"><?php echo $result->nama; ?></option>
												<?php endforeach; ?>
											</select></div>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Password</label>
										<div class="controls">
											<input type="password" name="password" >
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Konfimasi Password</label>
										<div class="controls">
											<input type="password" name="konfirmasi_password" >
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Daftar</button>
									</div>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>