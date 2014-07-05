<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo site_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Yuk</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
			<ul class='main-nav'>
				<?php
					$dashboard = '';
					$jobsheet = '';
					if ($aktif == 'dashboard')
					{
						$dashboard = 'active';
					}
				?>
				<li class='<?php echo $dashboard; ?>'>
					<a href="<?php echo site_url(); ?>user/">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class=''>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Tambah</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url().'admin/tambah/universitas'; ?>">Universitas</a>
						</li>
						<li>
							<a href="<?php echo base_url().'admin/tambah/kota'; ?>">Kota</a>
						</li>
						<li>
							<a href="<?php echo base_url().'admin/tambah/jurusan'; ?>">Jurusan</a>
						</li>
					</ul>
				</li>

			</ul>
			<div class="user">
				
				<div class="dropdown asdf">
					<a href="<?php echo site_url(); ?>#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $this->session->userdata['email']; ?> <img width="20px" height="50px" src="<?php echo base_url().$this->session->userdata['foto_user']; ?>" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo site_url(); ?>admin/profile">Profile</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>admin/logout">Sign out</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
