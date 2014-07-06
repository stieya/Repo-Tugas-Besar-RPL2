		<div id="main" >
			<div class="container-fluid">				
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-edit"></i><?php echo $comment->jobsheet->nama_job_sheet ?></h3>
							</div>										
							<div class="box-content">
								
								<div class="search-info">							
									<p><?php echo $comment->jobsheet->deskripsi_job_sheet ?></p>
								</div>							
							</div>
						</div>					
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>Daftar Pekerjaan</h3>
							</div>
							<div class="box-content">
								
								<div class="search-info">							
									<div class="box-content">
										<div class="joblist">
											<div class="accordion" id="accordion2">
												<div class="accordion-group">
													<?php
														if ($comment->joblist->status == "Finished") 
														{
													?>
													<div class="accordion-heading finished">
													<?php
														}
														else
														{
													?>
													<div class="accordion-heading unfinished">
													<?php
														}
													?>
													<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#1">
														<?php echo $comment->joblist->head ?>
													</a>
													</div>
													<div id="1" class="accordion-body collapse in">
														<div class="accordion-inner">
															<div class="row-fluid">
																<div class="span12">
																	<div class="box">
																		<div class="box-title">
																			<h3> Deskripsi Tugas </h3>
																		</div>										
																		<div class="box-content">
																			
																			<div class="search-info">							
																				<p>
																				 	<?php echo $comment->joblist->body ?>
																				</p>
																			</div>							
																		</div>
																	</div>					
																</div>
															</div>
															<div class="row-fluid">
																<div class="span12">
																	<div class="box">
																		<div class="box-title">
																			<h3> File</h3>
																		</div>										
																		<div class="box-content">
																			
																			<div class="search-info">							
																				<p>
																					<b>File perusahaan</b>
																				</p>
																				<p>
																					<?php 
																						if (is_null($comment->joblist->file_perusahaan)) 
																						{
																							echo "Tidak ada file";
																						}
																						else
																						{
																					?>
																					<a href="<?php echo base_url().$comment->joblist->file_perusahaan ?>" class="btn">Download File </a>
																					<?php
																						}
																					?>
																				</p>
																			</div>
																			<div class="search-info">							
																				<p>
																					<b>File anda</b>
																				</p>
																				<p>
																					<?php 
																						if (is_null($comment->joblist->file_user)) 
																						{
																					?>
																					Tidak ada file <br />
																					<?php
																						echo form_open_multipart('user/jobsheet/upload/'.$comment->jobsheet->id_job_sheet.'/'.$comment->joblist->id_job_list.'/0/komen');
																					?>
																					<b>Tambah File anda</b><br /> 
																					<input class="file" type="file" accept="application/pdf" name="userfile" /><br />
																					<input class="btn" type="submit" value="Upload">
																					<?php echo form_close();?>
																					<?php
																						}
																						else
																						{
																					?>
																					<a href="<?php echo base_url().$comment->joblist->file_user ?>" class="btn">Download File </a> <br />
																					<?php
																						echo form_open_multipart('user/jobsheet/upload/'.$comment->jobsheet->id_job_sheet.'/'.$comment->joblist->id_job_list.'/'.$comment->joblist->id_student_job_list.'/komen');
																					?>
																					<b>Ubah File anda</b><br />
																					<input class="file" type="file" accept="application/pdf" name="userfile" /><br />
																					<input class="btn" type="submit" value="Upload">
																					<?php echo form_close();?>
																					<?php
																						}
																					?>
																				</p>
																			</div>							
																		</div>
																	</div>					
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>							
							</div>
						</div>					
					</div>
				</div>

		</div>	
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-comments"></i>
									Diskusi
								</h3>
							</div>
							<div class="box-content nopadding">
								<ul class="messages">
									<?php
										foreach ($comment->komentar as $komen)
										{
									?>
										<?php
											if ($komen->foto_user == "") 
											{
												$fotos = "img/no_image.png";
											}
											else
											{
												if ($komen->status_user == "STUDENT")
												{
													$fotos = $komen->foto_user;
												}
												else
												{
													$fotos = 'images/company/'.$komen->id_user.'/'.$komen->foto_user;
												}
											}
											if ($komen->status_user == "STUDENT")
											{
										?>
									<li class="left">
										<div class="image">
											<img src="<?php echo base_url().$fotos; ?>" alt="">
										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name"><?php echo $komen->nama_student ?></span>
											<p><?php echo $komen->isi_comment ?></p>
											<span class="time">
												<?php echo $komen->waktu_comment ?>
											</span>
										</div>
									</li>
										<?php
											}
											else
											{
										?>
									<li class="right">
										<div class="image">
											<img src="<?php echo base_url().$fotos; ?>" alt="">
										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name"><?php echo $komen->nama_perusahaan ?></span>
											<p><?php echo $komen->isi_comment ?></p>
											<span class="time">
												<?php echo $komen->waktu_comment ?>
											</span>
										</div>
									</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div class="box-content nopadding">
								<ul class="messages">
									<li class="left">
										<?php echo form_open('user/jobsheet/komen/'.$comment->jobsheet->id_job_sheet.'/'.$comment->joblist->id_job_list);?>
										<div class="text">
											<input type="text" name="isi_comment" placeholder="Tulis komentar disini..." class="input-block-level">
										</div>
										<div class="submit">
											<button type="submit"><i class="icon-share-alt"></i></button>
										</div>
										<?php echo form_close();?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
</div>
</div>
</body>
</html>