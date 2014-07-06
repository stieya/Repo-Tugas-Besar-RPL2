		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Daftar Lembar Kerja</h1>
					</div>
				</div>
				
				<?php
					$i=1;
					$j=0; 
					foreach($jobsheet as $js) 
					{ 
				?>
				<?php 
					if (($j%3) == 0) 
					{
				?>
				<div class="row-fluid">
				<?php
					}
				?>
					<div class="span4">
						<?php
							if ($js['status'] == "Ongoing")
							{
						?>
						<div class="box box-color satgreen box-bordered">
						<?php
							}
							else
							if ($js['status'] == "Unclaimed")
							{
						?>
						<div class="box box-color box-bordered">
						<?php
							}
							else
							if ($js['status'] == "Finished")
							{
						?>
						<div class="box box-color lime box-bordered ">
						<?php
							}
							else
							if ($js['status'] == "Hidden")
							{
						?>
						<div class="box box-color box-bordered orange">
						<?php
							}
						?>
							<div class="box-title">
								<h3>
									<i class="icon-tasks"></i>
									<?php echo $js['nama_job_sheet'] ?>
								</h3>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">
										<div class="left">
											<a href="<?php echo base_url().'user/profile/'.$js['id_perusahaan'] ?>"><h5> <?php echo $js['nama_perusahaan'] ?> </h5></a>
											<h5><?php
													if (is_null($js['nama_jurusan'])) 
													{
													 	echo 'Umum';
													} 
													else
													{
													echo $js['nama_jurusan'];
													} 
												?> 
											</h5>
										</div>
										<div class="right">
											<p>
												<a href="<?php echo 'detail/'.$js['id_job_sheet']; ?>" class="btn btn-warning">Detail</a>
											</p>
											<h6>
												Durasi : <?php echo $js['durasi'] ?> Hari
											</h6>
										</div>
									</div>
									<div class="bottom">
										<?php echo substr($js['deskripsi_job_sheet'],0,90) ?>...
									</div>
								</div>
							</div>
						</div>
					<?php
						if (($i%3) == 0) 
						{
					?>
					</div>
					<?php
						}
					?>

				</div>
				<?php 
					$i++;
					$j++;
					}
				?>
	</div>	
</div>
</body>
</html>