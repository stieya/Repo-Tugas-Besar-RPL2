		
		<div id="main" >
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php if($error) : ?>
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								Terdapat Kesalahan Dalam Pengisian Form Job Sheet
							</div>
						<?php endif; ?>
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Form Pembuatan Job Sheet</h3>
							</div>
							<div class="box-content nopadding">
								<div class="text-center">
									<?php echo validation_errors(); ?>	
								</div>
									<?php echo form_open('', 'class="form-horizontal form-striped"');?>
									<div class="control-group">
										<label for="password" class="control-label">Nama Job Sheet</label>
										<div class="controls">
											<input type="text" name="nama" id="nama" placeholder="Nama Job Sheet" value="<?php echo $jobsheet->nama_job_sheet; ?>" class="input-xlarge">
										</div>
									</div>
									<div class="control-group">
										<label for="textfield" class="control-label">Bidang Khusus</label>
										<div class="controls">
											<div class="input-xlarge"><select name="bidang" id="select" class='chosen-select'>
												<option value="0">Umum</option>
												<?php foreach ($jurusan as $bidang) : ?> 
												<?php if($bidang->id_jurusan == $jobsheet->id_jurusan) : ?>
												<option value="<?php echo $bidang->id_jurusan; ?>" selected="selected"><?php echo $bidang->nama; ?></option>
												<?php else : ?>
												<option value="<?php echo $bidang->id_jurusan; ?>"><?php echo $bidang->nama; ?></option>
												<?php endif; ?>
												<?php endforeach; ?>
											</select></div>
										</div>
									</div>
									<div class="control-group">
										<label for="textarea" class="control-label">Deskripsi Job Sheet</label>
										<div class="controls">
											<textarea name="deskripsi" id="textarea" rows="5" class="input-block-level"><?php echo $jobsheet->deskripsi_job_sheet; ?> </textarea>
										</div>
									</div>
									<div class="control-group">
										<label for="select" class="control-label">Durasi (Dalam Bulan)</label>
										<div class="controls">
											<select name="durasi" id="select" class='input-large'>
												<?php for ($i=0; $i < 12 ; $i++) : ?>
												<?php if($i+1 == $jobsheet->durasi) : ?>
												<option value="<?php echo $i+1; ?>" selected="selected"><?php echo $i+1; ?> Bulan</option>
												<?php else: ?>
												<option value="<?php echo $i+1; ?>"><?php echo $i+1; ?> Bulan</option>
												<?php endif; ?>
												
												<?php endfor; ?>											
											</select>
										</div>
									</div>
									<div class="form-actions">
										<button type="submit" class="btn btn-primary">Save changes</button>
										<button type="button" class="btn">Cancel</button>
									</div>
								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>