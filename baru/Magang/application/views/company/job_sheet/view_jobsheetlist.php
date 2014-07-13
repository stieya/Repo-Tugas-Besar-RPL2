		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<?php if(isset($_GET['succes_h'])) : ?>
						<?php if($_GET['succes_h'] == 'TRUE' ) : ?>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								Daftar JobSheet Berhasil Dihapus
							</div>
						<?php endif;?>
						<?php if($_GET['succes_h'] == 'FALSE' ) : ?>
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								Daftar JobSheet Gagal Dihapus
							</div>
						<?php endif;?>
					<?php endif;?>

					<div class="pull-left">
						<h1>Daftar Job Sheet</h1>
					</div>
					<div class="pull-right">
						<ul class="stats">
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big"><?php echo $tanggal; ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<?php $i=1;$j=0; foreach ($jobsheets as $jobsheet) : ?>
				
				<?php if(($j%3) == 0) :?>
				<div class="row-fluid">
				<?php endif; ?>

					<div class="span4">

						<?php if($jobsheet->status == "Ongoing") : ?>
						<div class="box box-color satgreen box-bordered">
						<?php endif; ?>

						<?php if($jobsheet->status == "Unclaimed") : ?>
						<div class="box box-color box-bordered">
						<?php endif; ?>

						<?php if($jobsheet->status == "Finished") : ?>
						<div class="box box-color lime box-bordered ">
						<?php endif; ?>

						<?php if($jobsheet->status == "Hidden") : ?>
						<div class="box box-color box-bordered orange">
						<?php endif; ?>

							<div class="box-title">
								<h3>
									<i class="icon-tasks"></i>
									<?php if($jobsheet->status == 'Hidden')  echo substr($jobsheet->nama_job_sheet, 0,25).' (Hidden)'; else echo substr($jobsheet->nama_job_sheet, 0,25); ?>
								</h3>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">
										<div class="left">
											<h6> Bidang Khusus </h6>
											<h5> <?php if($jobsheet->id_jurusan == 0)  echo 'UMUM'; else echo $jobsheet->nama; ?> </h5>
										</div>
										<div class="right">
											<p>
												<a href="<?php echo site_url('company/jobsheet/hapus/').'/'.$jobsheet->id_job_sheet; ?>" class="btn btn-danger"><i class="icon-trash"></i></a>
												<a href="<?php echo site_url('company/jobsheet/').'/'.$jobsheet->id_job_sheet; ?>" class="btn btn-warning">Detail</a>
												<a href="<?php echo site_url('company/jobsheet/edit/').'/'.$jobsheet->id_job_sheet; ?>" class="btn btn-primary"><i class="icon-cog"></i></a>
											</p>
											<h6>
												Durasi : <?php echo $jobsheet->durasi*30; ?> Hari
											</h6>
										</div>
									</div>
									<div class="bottom">
										<?php echo substr($jobsheet->deskripsi_job_sheet, 0,100); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
		
				<?php if(($i%3) == 0) :?>
				</div>
				<?php endif; ?>

				<?php $i++;$j++; endforeach; ?>


				