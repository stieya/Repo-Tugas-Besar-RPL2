		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Status Lembar Kerja
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Jumlah lembar kerja anda</td>
											<td class='hidden-480'><?php echo $dash->lowongan ?></td>
										</tr>
										<tr>
											<td>Jumlah daftar kerja anda</td>
											<td class='hidden-480'><?php echo $dash->list ?></td>
										</tr>
										<tr>
											<td>Jumlah daftar kerja yang belum selesai</td>
											<td class='hidden-480'><?php echo $dash->list_unfinish ?></td>
										</tr>
										<tr>
											<td>Jumlah daftar kerja yang sudah selesai</td>
											<td class='hidden-480'><?php echo $dash->list_finish ?></td>
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
											<td>Nama Anda </td>
											<td class='hidden-480'><?php echo $profil->profile->namaStudent?></td>
										</tr>
										<tr>
											<td>No Telp </td>
											<td class='hidden-480'><?php echo $profil->profile->tlpStudent?></td>
										</tr>
										<tr>
											<td>Email </td>
											<td class='hidden-480'><?php echo $profil->profile->emailStudent ?></td>
										</tr>
										<tr>
											<td>Universitas</td>
											<td class='hidden-480'><?php echo $profil->profile->namaUniv?></td>
										</tr>
										<tr>
											<td>Jurusan</td>
											<td class='hidden-480'><?php echo $profil->profile->jurusan?></td>
										</tr>
										<tr>
											<td>Kota</td>
											<td class='hidden-480'><?php echo $profil->profile->kotaStudent?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>