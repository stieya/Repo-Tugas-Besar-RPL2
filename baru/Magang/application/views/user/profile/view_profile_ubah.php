		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
				</div>
				<div class="row-fluid">
					<div class="span8">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Ubah Profil
								</h3>

							</div>
								<div class="text-center">
									<?php echo validation_errors(); ?>
								</div>
								
							<div class="box-content nopadding">
									<?php echo form_open('','class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="textfield" class="control-label">Nama</label>
										<div class="controls">
											<input type="text" name="nama" placeholder="Nama anda" value="<?php echo $profil->nama ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">E-Mail</label>
										<div class="controls">
											<input type="text" name="email" placeholder="E-Mail anda" value="<?php echo $profil->email ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Password</label>
										<div class="controls">
											<input type="password" name="password" >
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Konfimasi Password</label>
										<div class="controls">
											<input type="password" name="konfirmasi_password" >
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Kota</label>
										<div class="controls">
											<select name="id_kota">
												<?php 
													foreach ($kota as $kot) 
													{
												?>
												<option value="<?php echo $kot['id_kota']?>"><?php echo $kot['nama']?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Alamat</label>
										<div class="controls">
											<textarea name="alamat">
												<?php echo $profil->alamat ?>
											</textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Kode Pos</label>
										<div class="controls">
											<input type="text" name="kode_pos" placeholder="Kode pos anda" value="<?php echo $profil->kode_pos ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Telepon</label>
										<div class="controls">
											<input type="text" name="telepon" placeholder="Telepon anda" value="<?php echo $profil->telepon ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Universitas</label>
										<div class="controls">
											<select name="id_universitas">
												<?php 
													foreach ($universitas as $univ) 
													{
												?>
												<option value="<?php echo $univ['id_universitas']?>"><?php echo $univ['nama']?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">NIM</label>
										<div class="controls">
											<input type="text" name="nim" placeholder="NIM anda" value="<?php echo $profil->nim ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Jurusan</label>
										<div class="controls">
											<select name="id_jurusan">
												<?php 
													foreach ($jurusan as $jur) 
													{
												?>
												<option value="<?php echo $jur['id_jurusan']?>"><?php echo $jur['nama']?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								<?php echo form_close();?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>