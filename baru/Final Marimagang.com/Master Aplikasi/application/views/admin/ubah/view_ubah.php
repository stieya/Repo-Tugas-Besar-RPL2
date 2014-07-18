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
									Ubah
								</h3>

							</div>
								<div class="text-center">
									<?php echo validation_errors(); ?>
								</div>
								<?php
									if ($hal == "universitas")
									{
								?>
							<div class="box-content nopadding">
									<?php echo form_open('admin/ubah/universitas/'.$hasil->id_universitas.'/update','class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="textfield" class="control-label">Nama Universitas</label>
										<div class="controls">
											<input type="text" name="nama" placeholder="Nama universitas" value="<?php echo $hasil->nama; ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Alamat</label>
										<div class="controls">
											<textarea name="alamat"><?php echo $hasil->alamat; ?></textarea>
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
												<option value="<?php echo $kot->id_kota; ?>"><?php echo $kot->nama;?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Kode Pos</label>
										<div class="controls">
											<input type="text" name="kode_pos" placeholder="Kode Pos" value="<?php echo $hasil->kode_pos; ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Telepon</label>
										<div class="controls">
											<input type="text" name="telepon" placeholder="Telepon" value="<?php echo $hasil->telepon; ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Website</label>
										<div class="controls">
											<input type="text" name="website" placeholder="Website" value="<?php echo $hasil->website; ?>">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								<?php echo form_close();?>
							</div>
							<?php
								}
								else if($hal == "kota")
								{
							?>
							<div class="box-content nopadding">
									<?php echo form_open('admin/ubah/kota/'.$hasil->id_kota.'/update','class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="textfield" class="control-label">Kota</label>
										<div class="controls">
											<input type="text" name="nama" placeholder="Nama Kota" value="<?php echo $hasil->nama; ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Provinsi</label>
										<div class="controls">
											<select name="id_provinsi">
												<?php 
													foreach ($provinsi as $pro) 
													{
												?>
												<option value="<?php echo $pro->id_provinsi; ?>"><?php echo $pro->nama;?></option>
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
							<?php
								}
								else if ($hal == "jurusan")
								{
							?>
							<div class="box-content nopadding">
									<?php echo form_open('admin/ubah/jurusan/'.$hasil->id_jurusan.'/update','class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="textfield" class="control-label">Jurusan</label>
										<div class="controls">
											<input type="text" name="nama" placeholder="Nama Jurusan" value="<?php echo $hasil->nama; ?>">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								<?php echo form_close();?>
							</div>
							<?php
								}
								else if ($hal == "provinsi")
								{
							?>
							<div class="box-content nopadding">
									<?php echo form_open('admin/ubah/provinsi/'.$hasil->id_provinsi.'/update','class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="textfield" class="control-label">Provinsi</label>
										<div class="controls">
											<input type="text" name="nama" placeholder="Nama Provinsi" value="<?php echo $hasil->nama; ?>">
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								<?php echo form_close();?>
							</div>
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>