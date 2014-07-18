		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Perusahaan</h1>
						
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
							<div class="search-results">
									<ul>
										<?php
											if (count($company) < 1) 
											{
												echo "Tidak ada perusahaan yang pernah bekerja sama dengan anda";
											}
										?>
										<?php
											foreach($company as $perusahaan ) 
											{
												if ($perusahaan->foto_user == "")
												{
													$fotos = "img/no_image.png";
												}
												else
												{
													$fotos = 'images/company/'.$perusahaan->id_user.'/'.$perusahaan->foto_user;
												}
										?>
										<li>
											<div class="thumbnail">
												<img src="" alt="">
												<img src="<?php echo base_url().$fotos; ?>" style="width:50px;height:60px;" alt="">
											</div>
											<div class="search-info">
												<a href="<?php echo $perusahaan->id_perusahaan; ?>"><?php echo $perusahaan->nama; ?></a>
												<p class="url"> www.<?php echo $perusahaan->website ; ?>/</p>
												<p>
													<?php
														echo $perusahaan->about;
													?>
												</p>
											</div>
										</li>
										<?php
											}
										?>
									</ul>
								</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>	
</body>
</html>