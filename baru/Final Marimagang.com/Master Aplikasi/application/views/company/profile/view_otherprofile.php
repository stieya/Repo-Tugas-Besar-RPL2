<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Profile <?php echo $user->nama_student; ?> </h1>
					</div>
					<div class="pull-right">
						
						<ul class="stats">
							<li class='blue'>
								<a href="<?php echo base_url().'company/message/'.$user->id_user;?>"><i class="icon-envelope"></i></a>
							</li>
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big"><?php echo $tanggal ;?></span>
								</div>
							</li>

						</ul>

					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Identitas 
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
												<?php if($user->foto_user != NULL) : ?>
												<img src="<?php echo base_url().$foto_user; ?>" class="img-responsive" style="width: 80px; height: 80px;"/>
												<?php else : ?>
												<img src="<?php echo base_url(); ?>img/no_image.png" class="img-responsive" style="width: 80px; height: 80px;"/>
												<?php endif; ?>
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
													<td><?php echo $user->nama_student;?></td>
													
												</tr>
												<tr>
													<td>Universitas</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $user->nama_universitas; ?></td>
													
												</tr>
												<tr>
													<td>Jurusan</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $user->nama_jurusan; ?></td>
												</tr>
												<tr>
													<td>Mulai Gabung</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $user->tanggal_masuk; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Kontak
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
										<div class="right">
										</div>
									</div>
									<div class="bottom">
										<table class="table table-hover table-nomargin">
											<tbody>
												<tr>
													<td>Email</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $user->email;?></td>
													
												</tr>
												<tr>
													<td>Nomor yang dapat dihubungi</td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'> </td>
													<td class='hidden-1024'>:</td>
													<td class='hidden-1024'> </td>
													<td><?php echo $user->no_telp; ?></td>
													
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>