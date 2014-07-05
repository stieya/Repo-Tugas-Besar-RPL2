		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pesan Masuk</h1>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span10">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3>
									<i class="icon-envelope"></i>
									Mahasiswa
								</h3>
							</div>
							<div class="box-content nopadding">
								<div class="tab-content-inline">
									<div class="tab-pane active" id="inbox">
											<table class="table table-striped table-nomargin table-mail">
												<thead>
													<tr>
														<th>Pengirim</th>
														<th>Isi</th>
														<th class='table-date hidden-480'>Tanggal</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($daftar_pesan->msgStu as $psnStu) 
														{
													?>
													<tr>	
														<td class='table-fixed-medium'>
															<?php echo $psnStu->nama; ?>
														</td>
														<td>
															<a href="<?php echo base_url().'user/message/student/'.$psnStu->id_user_pengirim; ?>"><?php echo substr($psnStu->body,0,20); ?></a>
														</td>
														<td class='table-fixed-medium'>
															<?php echo $psnStu->tanggal; ?>
														</td>
													</tr>
												
													<?php
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
				<div class="row-fluid">
					<div class="span10">
						<div class="box box-bordered box-color">
							<div class="box-title">
								<h3>
									<i class="icon-envelope"></i>
									Perusahaan
								</h3>
							</div>
							<div class="box-content nopadding">
								<div class="tab-content-inline">
									<div class="tab-pane active" id="inbox">
											<table class="table table-striped table-nomargin table-mail">
												<thead>
													<tr>
														<th>Pengirim</th>
														<th>Isi</th>
														<th class='table-date hidden-480'>Tanggal</th>
													</tr>
												</thead>
												<tbody>
													<?php
														foreach ($daftar_pesan->msgCom as $psnCom) 
														{
													?>
													<tr>
														<td class='table-fixed-medium'>
															<?php echo $psnCom->nama; ?>
														</td>
														<td>
															<a href="<?php echo base_url().'user/message/company/'.$psnCom->id_user_pengirim; ?>"><?php echo substr($psnCom->body,0,20); ?></a>
														</td>
														<td class='table-fixed-medium'>
															<?php echo $psnCom->tanggal; ?>
														</td>
													</tr>
													<?php
														}
													?>
												</tbody>
											</table>
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