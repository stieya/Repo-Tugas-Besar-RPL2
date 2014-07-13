<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo site_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Mari</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
			<ul class='main-nav'>
				<?php if($halaman == 'dashboard') : ?>
				<li class='active'>
					<a href="<?php echo site_url(); ?>company">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<?php else : ?>
				<li class=''>
					<a href="<?php echo site_url(); ?>company">
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

				<?php if($halaman == 'message') : ?>
				<li class="active">
				<?php else : ?>
				<li>
				<?php endif; ?>
					<a href="<?php echo site_url(); ?>#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Message</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li >
							<a href="<?php echo site_url(); ?>company/message/">Daftar Pesan</a>
						</li>
					</ul>
				</li>
			</ul>
			<div class="user">
				<ul class="icon-nav">
				
					<li class='dropdown'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-bullhorn"></i><span class="label label-lightred"><?php echo count($sum_notifikasi); ?></span></a>
						<ul class="dropdown-menu pull-right message-ul">
							<?php foreach($notifikasi as $res) : ?>
							<li>
								<a href="#">
									<span class="label"><i class="icon-plus"></i></span> <?php echo $res->body; ?>
								</a>
							</li>
							<?php endforeach; ?>
							
							<li>
								<a href="components-messages.html" class='more-messages'>See All Notification <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>

					<div class="dropdown asdf">
						<a href="<?php echo site_url(); ?>#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $this->session->userdata['email']; ?> 
							<?php if(!is_null($info->perusahaan->foto_user)) : ?>
							<img src="<?php echo base_url().'images/company/'.$this->session->userdata('id_user').'/'.$info->perusahaan->foto_user; ?>" alt="" style="width:27px;height:27px;">
							<?php else : ?>
							<img src="<?php echo base_url(); ?>img/no_image.png" alt="" style="width:27px;height:27px;">
							<?php  endif; ?>
							
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="<?php echo site_url(); ?>company/profile/edit">Edit profile</a>
							</li>
							<li>
								<a href="<?php echo site_url(); ?>company/logout">Sign out</a>
							</li>
						</ul>
					</div>
				</ul>
			</div>
		</div>
	</div>
