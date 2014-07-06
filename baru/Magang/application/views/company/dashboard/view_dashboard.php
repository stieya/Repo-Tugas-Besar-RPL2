		
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
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->nama_perusahaan; ?></td>
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
											<td class='hidden-480'><?php echo $perusahaan->jumlah_job_sheet_selesai; ?></td>
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
									Tentang <?php echo $perusahaan->perusahaan->nama_perusahaan; ?>
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
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
										<tr>
											<td>Kota Asal </td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->nama_kota; ?></td>
										</tr>
										<tr>
											<td>Kode Pos </td>
											<td class='hidden-480'><?php echo $perusahaan->perusahaan->kode_pos; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
	
					<div class="row-fluid">
						<div class="span12">
							<div class="box box-bordered">
								<div class="box-title">
									<h3>
										<i class="icon-user-md"></i> 
										tentang
									</h3>
								</div>
								<div class="box-content">
									<?php echo $perusahaan->perusahaan->about; ?>
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