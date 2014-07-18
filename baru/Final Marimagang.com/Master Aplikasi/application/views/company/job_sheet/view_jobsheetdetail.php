		<div id="main" >
			<div class="container-fluid">				
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-edit"></i> <?php echo $jobsheets->jobsheetdetail->nama_job_sheet; ?></h3>
								<div class="actions">
									<?php if($jobsheets->jobsheetdetail->status == "Ongoing") : ?>
									<a href="<?php echo base_url().'company/jobsheet/finish/'.$jobsheets->jobsheetdetail->id_job_sheet;?>" class="btn btn-large "><i class="icon-check"> Selesai </i><?php ?></a>
									<?php endif; ?>

								</div>

							</div>										
							<div class="box-content">
								
								<div class="search-info">							
									<p><?php echo $jobsheets->jobsheetdetail->deskripsi_job_sheet; ?></p>
								</div>							
							</div>
						</div>					
					</div>
				</div>
							
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3> Job List</h3>
							</div>										
							<div class="action">
								<a href="<?php echo base_url().'/company/joblist/newjoblist/'.$jobsheets->jobsheetdetail->id_job_sheet;?>"class="btn-block btn-primary btn btn-large ">Tambah Job List </a>
							</div>
							<div class="box-content">
								
								<div class="search-info">							
									<div class="box-content">
										<div class="joblist">
											<div class="accordion" id="accordion2">
												<?php $i = 1;foreach ($jobsheets->jobsheetlist as $list) : ?>
												<div class="accordion-group">	
													<?php if($list->status == 'Finished') : ?>
													<div class="accordion-heading finished">
													<?php else : ?>
													<div class="accordion-heading unfinished">
													<?php endif; ?>


														<a class="accordion-toggle <?php if($i==1) echo 'collapsed'; ?> " data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $i; ?>">
															#<?php echo $i; ?> <?php echo $list->head; ?>
														</a>
													</div>
													<div id="<?php echo $i; ?>" class="accordion-body collapse in">
														<div class="accordion-inner">
															<div class="row-fluid">
																<div class="span12">
																	<div class="box">
																		<div class="box-title">
																			<h3> Deskripsi Tugas </h3>
																			<div class="actions">
																				<a href="<?php echo site_url().'company/jobsheet/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$list->id_job_list;?>" class="btn  "><i class="icon-tasks"></i> Detail</a>
																				<a href="<?php echo site_url().'company/joblist/hapus/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$list->id_job_list;?>" onclick="return confirm('Apa Anda Yakin Ingin Menghapus Job List ini ? ')" class="btn btn-danger"><i class="icon-trash"></i> Hapus </a>
																				<a href="<?php echo site_url().'company/joblist/edit/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$list->id_job_list;?>" class="btn btn-warning  "><i class="icon-cog"></i> Ubah</a>
																				<?php if($list->status =='Finished') : ?>
																				<a href="<?php echo site_url().'company/joblist/uncheck/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$list->id_job_list;?>" class="btn  "><i class="icon-check-empty"></i> Belum Selesai</a>
																				<?php else : ?>
																				<a href="<?php echo site_url().'company/joblist/check/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$list->id_job_list;?>" class="btn "><i class="icon-check"></i> Selesai</a>
																				<?php endif; ?>

																			</div>

																		</div>										
																		<div class="box-content">
																			
																			<div class="search-info">							
																				<p>
																				 	<?php echo $list->body; ?>
																				</p>
																			</div>							
																		</div>
																	</div>					
																</div>
															</div>
															<?php if($list->file_perusahaan != NULL ) :?>
															<div class="row-fluid">
																<div class="span12">
																	<div class="box">
																		<div class="box-title">
																			<h3> File</h3>
																		</div>										
																		<div class="box-content">
																			
																			<div class="search-info">							
																				<p>
																					File yang berkaitan dengan tugas ini
																				</p>
																				<p>
																					<a target="_blank" href="<?php echo site_url().'files/company/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$list->file_perusahaan; ?>"class="btn-block btn btn-large">Download File </a>
																				</p>
																			</div>							
																		</div>
																	</div>					
																</div>
															</div>
															<?php endif; ?>

														</div>
													</div>
												</div>
												<?php $i++;endforeach; ?>

											</div>
										</div>
									</div>
								</div>							
							</div>
						</div>					
					</div>
				</div>
				<?php if(count($pekerja) == 0 ) : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-comments"></i>
									Pelamar Job Sheet
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content nopadding">
								
								<?php  if(count($application) > 0) : ?>
								<?php foreach($application as $app) :?>
								<ul class="messages">
									<li class="left">
										<div class="image">
											<?php if($app->foto_user != NULL) : ?>
											<img src="<?php echo base_url().$app->foto_user;?>" alt="">
											<?php else : ?>
											<img src="<?php echo base_url(); ?>img/no_image.png" alt="">
											<?php endif; ?>

										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name"><a href="<?php echo base_url().'company/profile/'.$app->id_student; ?>"> <?php echo $app->nama; ?></a></span>
											<span class="pull-right"><a href='<?php echo base_url().'company/jobsheet/accept/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$app->id_student;?>' class="btn btn-primary"> Terima Pelajar</a></span>
											<p><?php echo $app->comment; ?> </p>
											<?php if($app->application_file != NULL) : ?>
											<p>
												<h5> File Pengantar </h5>
											</p>
											<p>
												<a target="_blank" href="<?php echo base_url().$app->application_file; ?>" class="btn-block btn btn-primary">Download File </a>
											</p>
											<?php endif; ?>
											<span class="time">
												12 minutes ago
											</span>
										</div>
									</li>
								</ul>
								<?php endforeach; ?>
								<?php else: ?>   
								<h4 class="text-center"> Belum ada yang mengajukan untuk mengerjakan proyek ini </h4>
								<?php endif; ?>
								
									<!--
									<li class="insert">
										digunakaan bagi user untuk mealkukan pengajuan
										<form id="message-form" method="POST" action="#">
											<div class="text">
												<input type="text" name="text" placeholder="Write here..." class="input-block-level">
											</div>
											<div class="submit">
												<button type="submit"><i class="icon-share-alt"></i></button>
											</div>
										</form>
									</li>
									-->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<?php else : ?>	
				<?php if($jobsheets->jobsheetdetail->status == 'Finished' ) : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-comments"></i>
									Sudah Selesai
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php else : ?>

				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-comments"></i>
									Job Sheet Sedang Dikerjakan
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php  endif; ?>
				<?php endif; ?>