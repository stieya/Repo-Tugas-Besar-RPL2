		<div id="main">
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>User profile</h1>
					</div>
					<div class="pull-right">
						<ul class="stats">
							<li class='lightred'>
								<i class="icon-calendar"></i>
								<div class="details">
									<span class="big">February 22, 2013</span>
									<span>Wednesday, 13:56</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-user"></i>
									Edit User Profile
								</h3>
							</div>
							<div class="box-content nopadding">
								<div class="text-center" >
								<?php echo validation_errors(); ?>
								</div >
								<?php echo form_open_multipart('', 'class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label for="nama" class="control-label">Nama Perusahaan</label>
										<div class="controls">
											<input type="text" name="nama" id="nama" value="<?php echo $perusahaan->perusahaan->nama_perusahaan; ?>"placeholder="Nama Job Sheet" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Avatar</label>
										<div class="controls">
											<div class="fileupload fileupload-new" data-provides="fileupload">
												<div class="fileupload-new thumbnail" style="width: 80px; height: 80px;">
													<?php if(!is_null($perusahaan->perusahaan->foto_user) ) : ?>
													<img src="<?php echo base_url().'images/company/'.$this->session->userdata('id_user').'/'.$perusahaan->perusahaan->foto_user;?>" style="height:90px" />
													<?php else : ?>
													<img src="<?php echo base_url().'img/no_image.png'; ?>" />
													<?php endif; ?>
												</div>
												<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
												<div>
													<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input name="file"type="file" /></span>
													<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
												</div>
											</div>
										</div>
									</div>
									
									<div class="control-group">
										<label for="textfield" class="control-label">Website</label>
										<div class="controls">
											<div class="input-group">
  												<span class="input-group-addon">www.</span>
  												<input type="text" name="website" value="<?php echo $perusahaan->perusahaan->website; ?>">
											</div>
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">No Telepon</label>
										<div class="controls">
											<input type="text" name="telp" value="<?php echo $perusahaan->perusahaan->telepon; ?>">
										</div>
									</div>

									<div class="control-group">
										<label for="textfield" class="control-label">Kode Pos</label>
										<div class="controls">
											<input type="text" name="kode_pos" value="<?php echo $perusahaan->perusahaan->kode_pos; ?>">
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Alamat</label>
										<div class="controls">
											<textarea name="alamat" id="textarea" rows="5" class="input-block-level"><?php echo $perusahaan->perusahaan->alamat; ?> </textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Kota</label>
										<div class="controls">
											<select name="kota" id="select" class='input-large'>
												<?php foreach ($kota as $result) : ?>
												<option value='<?php echo $result->id_kota ?>' > <?php echo $result->nama?> </option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Tentang Perusahaan Anda</label>
										<div class="controls">
										
											<textarea name="about" id="textarea" rows="5" class="input-block-level"><?php echo $perusahaan->perusahaan->about; ?> </textarea>
										
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" class="btn btn-primary" value="Save changes">
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>