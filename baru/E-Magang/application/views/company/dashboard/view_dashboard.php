		
		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
					<div class="pull-right">
						<ul class="stats">
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big"><?php echo $tanggal ?></span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Status JobSheet
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Nama Perusahaan </td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->nama; ?></td>
										</tr>
										<tr>
											<td>Jumlah Lowongan Magang</td>
											<td class='hidden-480'><?php echo $perusahaan->jumlah_job_sheet; ?></td>
										</tr>
										<tr>
											<td>Lowongan Magang Yang Belum Di Klaim</td>
											<td class='hidden-480'><?php echo $perusahaan->jumlah_job_sheet_belum_dikerjakan; ?></td>
										</tr>
										<tr>
											<td>Lowongan Magang Yang Sedang Dikerjakan</td>
											<td class='hidden-480'><?php echo $perusahaan->jumlah_job_sheet_dikerjakan; ?></td>
										</tr>
										<tr>
											<td>Lowongan Magang Yang Sudah Selesai</td>
											<td class='hidden-480'><?php echo $perusahaan->jumlah_job_sheet_dikerjakan; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Tentang Anda
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Nama Perusahaan </td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->nama; ?></td>
										</tr>
										<tr>
											<td>Mulai Bergabung</td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->tanggal_masuk ?></td>
										</tr>
										<tr>
											<td>Email </td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->email; ?></td>
										</tr>
										<tr>
											<td>No Telp </td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->telepon; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Profile Anda
								</h3>
							</div>
							<div class="box-content nopadding">
								<form action="#" class="form-horizontal form-bordered">
									<div class="control-group">
										<label for="textfield" class="control-label">Nama Perusahaan</label>
										<div class="controls">
											<span class="uneditable-input"><?php echo $perusahaan->perusahaan->nama; ?></span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Email</label>
										<div class="controls">
											<span class="uneditable-input"><?php echo $perusahaan->perusahaan->email; ?></span>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Foto Profile</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 80px; height: 80px;"><img src="http://www.placehold.it/80/EFEFEF/AAAAAA&text=no+image" /></div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>