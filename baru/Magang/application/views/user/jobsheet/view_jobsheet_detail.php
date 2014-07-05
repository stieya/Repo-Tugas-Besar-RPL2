		<div id="main" >
			<div class="container-fluid">				
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-edit"></i><?php echo $js->jobsheet->nama_job_sheet ?></h3>
							</div>										
							<div class="box-content">
								
								<div class="search-info">							
									<p><?php echo $js->jobsheet->deskripsi_job_sheet ?></p>
								</div>							
							</div>
						</div>					
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>Lamaran Anda</h3>
							</div>										
							<div class="box-content">
								<?php
									if (count($js->app) < 1)
									{
								?>
								<?php
									echo form_open_multipart('user/jobsheet/upload/'.$js->jobsheet->id_job_sheet.'/'.'0'.'/'.'0'.'/detail');
								?>
								<div class="text">
									<input class="file" type="file" accept="application/pdf" name="userfile" /><br />											
								</div>
								<div class="text">
									<br />
									Keterangan
								</div>
								<div class="text">
									<textarea name="comment" class="input-level"> </textarea>
								</div>
								<div class="submit">
									<input class="btn" type="submit" value="Upload">
								</div>
								<?php echo form_close();?>
								<?php
									}
									else
									{
								?>
								<div class="text">
									Keterangan :
									<?php
									if (is_null($js->app->comment))
									{
										echo "Tidak ada keterangan";
									}
									else
									{
										echo $js->app->comment;
									}
									?>

								</div>
								<br />
								<div class="text">
									<a href="<?php echo base_url().$js->app->application_file ?>" class="btn">Download File </a>
								</div>
								<?php
									}
								?>						
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
												<?php
													$i = 1;
													foreach ($js->joblist as $jl)
													{
												?>
												<div class="accordion-group">
													<?php
														if ($jl->status == "Finished") 
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
													<a class="accordion-toggle <?php if($i==1) echo 'collapsed'; ?> " data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $i; ?>">
														<?php echo $jl->head ?>
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
																				<a href="<?php echo $js->jobsheet->id_job_sheet.'/'.$jl->id_job_list ?>" class="btn btn-large "><i class="icon-tasks"></i></a>
																			</div>
																		</div>										
																		<div class="box-content">
																			
																			<div class="search-info">							
																				<p>
																				 	<?php echo $jl->body ?>
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
																						if (is_null($jl->file_perusahaan)) 
																						{
																							echo "Tidak ada file";
																						}
																						else
																						{
																					?>
																					<a href="<?php echo base_url().$jl->file_perusahaan ?>" class="btn">Download File </a>
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
																						if (is_null($jl->file_user)) 
																						{
																					?>
																					Tidak ada file <br />
																					<?php
																						}
																						else
																						{
																					?>
																					<a href="<?php echo base_url().$jl->file_user ?>" class="btn">Download File </a> <br />
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
												<?php
													$i++;
													}
												?>
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
</body>
</html>