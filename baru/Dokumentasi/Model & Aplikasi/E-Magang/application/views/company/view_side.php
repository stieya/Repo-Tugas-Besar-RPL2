<div class="container-fluid" id="content">
		<div id="left">
			<div class="subnav">
				<div class="subnav-title">
					<a href="#" class='toggle-subnav'><i class="icon-angle-down"></i><span>Profile</span></a>
				</div>
				<ul class="subnav-menu">
					<li>
						<div class="control-group">
								<div class="controls">
									<div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-new thumbnail" style="width: 80px; height: 80px;">
										<?php if(!is_null($info->perusahaan->foto_user)) : ?>
										<img src="<?php echo base_url().'images/company/'.$this->session->userdata('id_user').'/'.$info->perusahaan->foto_user;?>" class="img-responsive" style="width: 80px; height: 80px;"/>
									 	<?php else : ?>
									 	<img src="<?php echo base_url().'img/no_image.png'; ?>" class="img-responsive" style="width: 80px; height: 80px;"/>
									 	<?php endif; ?>
									</div>
									<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
								</div>
							</div>
						</div>

					</li>
					<li>
						<a ><?php echo $info->perusahaan->nama_perusahaan; ?></a>
					</li>
					<li>
						<a ><?php echo $info->perusahaan->email; ?></a>
					</li>
					<li>
						<a ><?php echo $info->perusahaan->telepon; ?></a>
					</li>
					<?php if(!is_null($info->perusahaan->website)) :?>
					<li>
						<a href="http://www.<?php echo $info->perusahaan->website; ?>" >www.<?php echo $info->perusahaan->website; ?></a>
					</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>