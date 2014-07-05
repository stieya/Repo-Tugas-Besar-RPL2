		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Profil</h1>
						<?php
						if ($profil->hal != "student") 
						{
						?>
						<ul class="stats">
							<li class='blue'>
								<a href="<?php echo base_url().'user/message/company/'.$profil->profile->id_perusahaan; ?>"><i class="icon-envelope"></i></a>
							</li>
						</ul>
						<?php
						}
						?>
					</div>
				</div>
				<?php
					if ($profil->hal == "student") 
					{
				?>
				<a href="profile/edit/"><button type="submit" class="btn btn-primary">Ubah</button></a>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Profil Anda
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<?php
												if ($this->session->userdata['foto_user'] == "")
												{
													$fotos = "img/no_image.png";
												}
												else
												{
													$fotos = $this->session->userdata['foto_user'];
												}
											?>
											<td><img width="100" height="150" src="<?php echo base_url().$fotos ?>" /></td>
											<?php
												echo form_open_multipart('user/profile/foto');
											?>
											<td class='hidden-480'><input class="file" type="file" accept="image/*" name="userfile" /><br />
												<input class="btn" type="submit" value="Upload">
											</td>
											<?php echo form_close();?>
										</tr>
										<tr>
											<td>Nama Anda </td>
											<td class='hidden-480'><?php echo $profil->profile->namaStudent ?></td>
										</tr>
										<tr>
											<td>Kota </td>
											<td class='hidden-480'><?php echo $profil->profile->kotaStudent ?></td>
										</tr>
										<tr>
											<td>Alamat </td>
											<td class='hidden-480'><?php echo $profil->profile->alamatStudent ?></td>
										</tr>
										<tr>
											<td>Kode Pos </td>
											<td class='hidden-480'><?php echo $profil->profile->kpStudent ?></td>
										</tr>
										<tr>
											<td>Telepon</td>
											<td class='hidden-480'><?php echo $profil->profile->tlpStudent ?></td>
										</tr>
										<tr>
											<td>Email </td>
											<td class='hidden-480'><?php echo $profil->profile->emailStudent ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Universitas
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>NIM </td>
											<td class='hidden-480'><?php echo $profil->profile->nim ?></td>
										</tr>
										<tr>
											<td>Jurusan </td>
											<td class='hidden-480'><?php echo $profil->profile->jurusan ?></td>
										</tr>
										<tr>
											<td>Universitas </td>
											<td class='hidden-480'><?php echo $profil->profile->namaUniv ?></td>
										</tr>
										<tr>
											<td>Kota </td>
											<td class='hidden-480'><?php echo $profil->kota->kotaUniv ?></td>
										</tr>
										<tr>
											<td>Alamat</td>
											<td class='hidden-480'><?php echo $profil->profile->alamatUniv ?></td>
										</tr>
										<tr>
											<td>Kode Pos</td>
											<td class='hidden-480'><?php echo $profil->profile->kpUniv ?></td>
										</tr>
										<tr>
											<td>Telepon</td>
											<td class='hidden-480'><?php echo $profil->profile->tlpUniv ?></td>
										</tr>
										<tr>
											<td>Website</td>
											<td class='hidden-480'><a href="<?php echo $profil->profile->webUniv ?>" target="_blank"><?php echo $profil->profile->webUniv ?></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
					else
					{
				?>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Profil Perusahaan
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Perusahaan </td>
											<td class='hidden-480'><?php echo $profil->profile->nama_perusahaan ?></td>
										</tr>
										<tr>
											<td>Kota </td>
											<td class='hidden-480'><?php echo $profil->profile->nama_kota ?></td>
										</tr>
										<tr>
											<td>Alamat </td>
											<td class='hidden-480'><?php echo $profil->profile->alamat ?></td>
										</tr>
										<tr>
											<td>Kode Pos </td>
											<td class='hidden-480'><?php echo $profil->profile->kode_pos ?></td>
										</tr>
										<tr>
											<td>Telepon</td>
											<td class='hidden-480'><?php echo $profil->profile->telepon ?></td>
										</tr>
										<tr>
											<td>Website </td>
											<td class='hidden-480'><?php echo $profil->profile->website ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>	
</body>
</html>