
		<div id="main" >
			<div class="container-fluid">				
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3><i class="icon-tasks"></i> <?php echo $job_list->head; ?></h3>
								<div class="actions">
									<a href="#" class="btn btn-large "><i class="icon-trash"></i></a>
								</div>

							</div>										
							<div class="box-content">
								
								<div class="search-info">							
									<p><?php echo $job_list->body; ?></p>
								</div>							
							</div>
						</div>					
					</div>
				</div>

				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3> File Job List Ini</h3>
							</div>										
							<div class="action">
								
							</div>
							<div class="box-content">
								
								<div class="search-info">	
									<?php if($job_list->file_perusahaan != null) : ?>						
									<div class="box-content">
										<a href="<?php echo base_url().'files/company/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$job_list->file_perusahaan;?>"class="btn-block btn-primary btn btn-large "> Download File </a>
									</div>
									<?php else : ?>
									<div class="box-content text-center">
										
										<h3> Belum Terdapat File Untuk Job List ini</h3>
										
										
									</div>
									<?php endif; ?>
								</div>							
							</div>
						</div>					
					</div>
				</div>
				<?php if(count($pekerja->studentjobsheet) > 0) : ?>
			
				
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Informasi Pekerja
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">
										<div class="left">
											<div class="fileupload-new thumbnail" style="width: 80px; height: 80px;">
												<img src="<?php echo base_url().'img/no_image.png'; ?>" class="img-responsive" style="width: 80px; height: 80px;"/>
											</div>
										</div>
										<div class="right">
										</div>
									</div>
									<div class="bottom">
										<table class="table table-hover table-nomargin">
											<tbody>
												<tr>
													<td>Nama</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><a href="<?php echo base_url().'company/profile/'.$pekerja->studentjobsheet->id_user; ?>"><?php echo $pekerja->studentjobsheet->nama_student; ?></a></td>
													
												</tr>
												<tr>
													<td>Universitas</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $pekerja->studentjobsheet->nama_kampus; ?></td>
													
												</tr>
												<tr>
													<td>NIM</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $pekerja->studentjobsheet->nim; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php if(isset($pekerja->studentjoblist[1]->file_user['1'])) : ?>
					<div class="span6">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class=" icon-file-alt"></i>
									File Untuk Job List ini
								</h3>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<?php foreach($pekerja->studentjoblist as $job) : ?>
									<div class="top">										
										<div class="left">
												<a href="<?php echo base_url().$job->file_user; ?>" class="btn-block btn btn-primary">Download File </a>
											
										</div>
									</div>
									<div class="bottom">
									<h6> Keterangan File Ini </h6>
									<p> <?php echo $job->keterangan;?> </p>
									</div>
									<?php endforeach; ?>
								</div>

							</div>
						</div>
					</div>
					<?php else : ?>
					<div class="span6">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class=" icon-file-alt"></i>
									File Untuk Job List ini
								</h3>
							</div>
							<div class="box-content">
								<div class="statistic-big">
									<div class="top">										
										<h4 class="text-center">
											Belum ada file yang diupload untuk job list ini
										</h4>
									</div>
									<div class="bottom">
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				
				<?php else : ?>
				<div class="row-fluid">
					<div class="span12">
						<div class="box ">
							<div class="box-title">
								<h3 class="text-center">
									<i class="icon-warning-sign"></i> 
									Belum ada yang mengerjakan joblist ini
								</h3>
							</div>
							<div class="top">
								<div class="left">
								</div>
								<div class="right">
								</div>
								<div class="bottom">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>

				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-comments"></i>
									Diskusi Untuk Job List <?php echo $job_list->head; ?>
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
									<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="600" data-start="bottom">
								<ul class="messages">
									<?php if(count($comments) > 0) : ?>
									<?php foreach($comments as $comment) : ?>
									<?php if($comment->status_user == "COMPANY") : ?>

									<li class="left">
										<div class="image">
											<?php if($comment->foto_user != NULL) : ?>
											<img src="<?php echo base_url().'images/company/'.$this->session->userdata('id_user').'/'.$comment->foto_user;?>" alt="">
											<?php else : ?>
											<img src="<?php echo base_url(); ?>img/no_image.png" alt="">
											<?php endif; ?>
										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name" style="font-weight:bold;"><?php echo $comment->nama_perusahaan;?></span>
											<p><?php echo $comment->isi_comment; ?> </p>
											<span class="time">
												
											</span>
										</div>
									</li>

									<?php elseif($comment->status_user == "STUDENT") :?>
									
									<li class="right">
										<div class="image">
											<?php if($comment->foto_user != NULL) : ?>
											<img src="<?php echo base_url().'images/student/'.$this->session->userdata('id_user').'/'.$comment->foto_user;?>" alt="">
											<?php else : ?>
											<img src="<?php echo base_url(); ?>img/no_image.png" alt="">
											<?php endif; ?>
										</div>
										<div class="message">
											<span class="caret"></span>
											<a href="<?php echo base_url().'company/profile/'.$comment->id_user;?>"><span class="name" style="font-weight:bold;"><?php echo $comment->nama_student; ?></span></a>
											<p><?php echo $comment->isi_comment; ?></p>
											<span class="time">
												
											</span>
										</div>
									</li>

									<?php endif; ?>
									<?php endforeach; ?>	
									<?php else : ?>
									<li>
										<h4 class="text-center">Belum terdapat diskusi untuk joblist ini </h4>
									</li>
									<?php endif; ?>
									

									
									<li class="insert">
										<?php echo form_open(); ?>
											<div class="text">
												<input type="text" name="comment" placeholder="Write here..." class="input-block-level">
											</div>
											<div class="submit">
												<input type="submit" value="Submit" class="btn btn-primary" style="margin-top:20px;">
											</div>
										<?php echo form_close(); ?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				