		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h5>
						Detil Lembar Kerja
					</h5>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color satgreen box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									<?php echo $ph->company->nama; ?>
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Lembar kerja</td>
											<td class='hidden-480'><?php echo $ph->jobsheet->nama_job_sheet; ?></td>
										</tr>
										<tr>
											<td>Deskripsi</td>
											<td class='hidden-480'><?php echo $ph->jobsheet->deskripsi_job_sheet;?></td>
										</tr>
										<tr>
											<td>Jurusan</td>
											<td class='hidden-480'><?php echo $ph->jobsheet->nama;?></td>
										</tr>
										<tr>
											<td>Durasi</td>
											<td class='hidden-480'><?php echo $ph->jobsheet->durasi;?> Hari</td>
										</tr>
										<?php
											if ($ph->app == null)
											{
										?>
										<?php
											echo form_open_multipart('user/company/upload/'.$ph->company->id_perusahaan.'/'.$ph->jobsheet->id_job_sheet);
										?>
										<tr>
											<td>Lamaran Anda</td>
											<td class='hidden-480'><input class="file" type="file" accept="application/pdf" name="userfile" /><br />
												Keterangan <br />
												<textarea name="comment" class="input-level"> </textarea>

											</td>
										</tr>
										<tr>
											<td>&nbsp</td>
											<td><input class="btn" type="submit" value="Upload"></td>
										</tr>
										<?php echo form_close();?>
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
</body>
</html>