
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
									<?php if($job_list->file_perusahaan != NULL) : ?>						
									<div class="box-content">
										<a href="<?php echo base_url().'files/company/'.$jobsheets->jobsheetdetail->id_job_sheet.'/'.$job_list->file_perusahaan;?>"class="btn-block btn-primary btn btn-large "> Download File </a>
									</div>
									<?php else : ?>
									<div class="box-content">
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
													<td><?php echo $pekerja->studentjobsheet->nama_student; ?></td>
													
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
					<?php if(!is_null($pekerja->studentjoblist->file_user)) : ?>
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
										<div class="left">
											Tanggal Upload : 13-10-1993
										</div>
										<div class="right">
											
												<a href="" class="btn-block btn btn-primary">Download File </a>
											
										</div>
									</div>
									<div class="bottom">
									<h6> Keterangan File Ini </h6>
									<p> asdasdasdasdasdasdasdasdsa </p>
									</div>
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
									<li class="left">
										<div class="image">
											<img src="img/demo/user-1.jpg" alt="">
										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name">Jane Doe</span>
											<p>Lorem ipsum aute ut ullamco et nisi ad. </p>
											<span class="time">
												12 minutes ago
											</span>
										</div>
									</li>
									<li class="right">
										<div class="image">
											<img src="<?php echo base_url().'images/company/'.$this->session->userdata('id_perusahaan').'/'.$chat->perusahaan->foto_user; ?>" alt="" style="height:50px;width:50px;">
										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name">John Doe</span>
											<p>Lorem ipsum aute ut ullamco et nisi ad. Lorem ipsum adipisicing nisi Excepteur eiusmod ex culpa laboris. Lorem ipsum est ut...</p>
											<span class="time">
												12 minutes ago
											</span>
										</div>
									</li>

									<li class="insert">
										<form id="message-form" method="POST" action="#">
											<div class="text">
												<input type="text" name="text" placeholder="Write here..." class="input-block-level">
											</div>
											<div class="submit">
												<button type="submit"><i class="icon-share-alt"></i></button>
											</div>
										</form>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				