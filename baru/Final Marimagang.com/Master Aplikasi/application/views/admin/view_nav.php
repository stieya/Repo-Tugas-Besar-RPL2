<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo site_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Mari</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
			<ul class='main-nav'>
				<?php
					$dashboard = '';
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
						<li>
							<a href="<?php echo base_url().'admin/tambah/provinsi'; ?>">Provinsi</a>
						</li>
					</ul>
				</li>
				<li class=''>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Mahasiswa</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url().'admin/user'; ?>">Daftar Mahasiswa</a>
						</li>
					</ul>
				</li>
				<li class=''>
					<a href="#" data-toggle="dropdown" class='dropdown-toggle'>
						<i class="icon-edit"></i>
						<span>Perusahaan</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url().'admin/company'; ?>">Perusahaan</a>
						</li>
					</ul>
				</li>

			</ul>
			<div class="user">
				
				<div class="dropdown asdf">
					<a href="<?php echo site_url(); ?>#" class='dropdown-toggle' data-toggle="dropdown">ADMIN</a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo site_url(); ?>admin/logout">Sign out</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
