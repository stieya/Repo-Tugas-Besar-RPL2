<div id="navigation">
		<div class="container-fluid">
			<a href="<?php echo site_url(); ?>#" id="brand"><span style="background-color:#f1c40f;  padding:8px 8px; color:#fff;">Yuk</span> <span style="background-color:#7f8c8d; padding:8px 8px; color:#fff; margin-left:0px;">magang.com</span></a>
			<ul class='main-nav'>
				<?php
					$dashboard = '';
					$jobsheet = '';
					$company = '';
					if ($aktif == 'dashboard')
					{
						$dashboard = 'active';
					}
					else
					if ($aktif == 'jobsheet')
					{
						$jobsheet = 'active';	
					}
					else
					if ($aktif == 'company')
					{
						$company = 'active';	
					}
				?>
				<li class='<?php echo $dashboard; ?>'>
					<a href="<?php echo site_url(); ?>user/">
						<i class="icon-home"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class='<?php echo $jobsheet; ?>'>
					<a href="<?php echo site_url(); ?>user/jobsheet/">
						<i class="icon-edit"></i>
						<span>Lembar Kerja</span>
					</a>
				</li>
				<li class='<?php echo $company; ?>'>
					<a href="<?php echo site_url(); ?>user/company/">
						<i class="icon-edit"></i>
						<span>Perusahaan</span>
					</a>
				</li>

			</ul>
			<div class="user">
				<ul class="icon-nav">
				<li class='dropdown'>
						<a href="#" class='dropdown-toggle' data-toggle="dropdown"><i class="icon-envelope-alt"></i><span class="label label-lightred"><?php echo $pesan->count ?></span></a>
						<ul class="dropdown-menu pull-right message-ul">
							<li>
								<a class='more-messages'>Mahasiswa</a>
							</li>
							<?php
								foreach ($pesan->msgStu as $psnStu) 
								{	 
							?>
							<li>
								<a href="<?php echo base_url().'user/message/student/'.$psnStu->id_user_pengirim; ?>">
									<div class="details">
										<div class="name"><?php echo $psnStu->nama ?></div>
										<div class="message">
											<?php echo substr($psnStu->body,0,20) ?>...
										</div>
									</div>
								</a>
							</li>
							<?php
									
								} 
							?>
							<li>
								<a class='more-messages'>Perusahaan</a>
							</li>
							<?php
								foreach ($pesan->msgCom as $psnCom) 
								{	 
							?>
							<li>
								<a href="<?php echo base_url().'user/message/company/'.$psnCom->id_user_pengirim; ?>">
									<div class="details">
										<div class="name"><?php echo $psnCom->nama ?></div>
										<div class="message">
											<?php echo substr($psnCom->body,0,20) ?>...
										</div>
									</div>
								</a>
							</li>
							<?php
								} 
							?>
							<li>
								<a href="<?php echo site_url(); ?>user/message" class='more-messages'>Semua Pesan <i class="icon-arrow-right"></i></a>
							</li>
						</ul>
					</li>
				</ul>
				<div class="dropdown asdf">
					<?php
						if ($this->session->userdata['foto_user'] == "")
						{
							$fotos = "img/no_image.png";
						}
						else
						{
							$fotos = $this->session->userdata['foto_user'];
						}
					?>
					<a href="<?php echo site_url(); ?>#" class='dropdown-toggle' data-toggle="dropdown"><?php echo $this->session->userdata['email']; ?> <img width="20px" height="50px" src="<?php echo base_url().$fotos; ?>" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="<?php echo site_url(); ?>user/profile">Profile</a>
						</li>
						<li>
							<a href="<?php echo site_url(); ?>user/logout">Sign out</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
