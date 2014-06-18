<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo site_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Yuk</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
			<ul class='main-nav'>
				<?php if($halaman == 'dashboard') : ?>
				<li class='active'>
					<a href="<?php echo site_url(); ?>index.html">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<?php else : ?>
				<li class=''>
					<a href="<?php echo site_url(); ?>index.html">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<?php endif; ?>
				
				<?php if($halaman == 'jobsheetlist' || $halaman == 'jobsheet' || $halaman == 'newjobsheet') : ?>
				<li class='active'>
					<a href="<?php echo site_url(); ?>#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Job Sheet</span>
						<span class="caret"></span>
					</a>
				<?php else : ?>				
				<li>
					<a href="<?php echo site_url(); ?>#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Job Sheet</span>
						<span class="caret"></span>
					</a>
				<?php endif; ?>

					<ul class="dropdown-menu">
						<?php if($halaman == 'newjobsheet') : ?>
						<li class="active">
							<a href="<?php echo site_url(); ?>company/jobsheet/newjobsheet/">Buat Baru</a>
						</li>
						<?php else :?>
						<li>
							<a href="<?php echo site_url(); ?>company/jobsheet/newjobsheet/">Buat Baru</a>
						</li>	
						<?php endif;?>

						<?php if($halaman == 'jobsheetlist') : ?>
						<li class="active">
							<a href="<?php echo site_url(); ?>company/jobsheet">Daftar</a>
						</li>
						<?php else :?>
						<li>
							<a href="<?php echo site_url(); ?>company/jobsheet">Daftar</a>
						</li>
						<?php endif;?>
						
					</ul>
				</li>
				<li>
					<a href="<?php echo site_url(); ?>#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Message</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li >
							<a href="<?php echo site_url(); ?>company/jobsheet/newjobsheet/">Daftar Pesan</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="user">
				<div class="dropdown asdf">
					<a href="<?php echo site_url(); ?>#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $this->session->userdata['email']; ?> <img src="<?php echo base_url(); ?>img/demo/user-avatar.jpg" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo site_url(); ?>company/profile/edit">Edit profile</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>company/logout">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
