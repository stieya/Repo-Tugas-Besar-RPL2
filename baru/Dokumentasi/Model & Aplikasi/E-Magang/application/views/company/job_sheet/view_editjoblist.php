		<div id="main" >
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<?php if($error) : ?>
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								Terdapat Kesalahan Dalam Pengisian Form Job List
							</div>
						<?php endif; ?>
						<div class="box box-bordered">
							<div class="box-title">
								<h3><i class="icon-th-list"></i> Form Mengubah Job List Untuk <?php echo $jobsheets->jobsheetdetail->nama_job_sheet ?></h3>
							</div>
							<div class="box-content nopadding">
								<div class="text-center">
									<?php echo validation_errors(); ?>	
								</div>
									<?php echo form_open_multipart('', 'class="form-horizontal form-striped"');?>
									<div class="control-group">
										<label for="nama" class="control-label">Nama Job List</label>
										<div class="controls">
											<input type="text" name="nama" id="nama" value="<?php echo $joblist->head; ?>"placeholder="Nama Job Sheet" class="input-xlarge">
										</div>
									</div>
									<?php if($joblist->file_perusahaan == NULL ) : ?>
									<div class="control-group">
										<label for="file" class="control-label">File Yg Dibutuhkan</label>
										<div class="controls">
											<input type="file" name="file" id="file" class="input-block-level">
											<span class="help-block">Only .rar/.zip (Max Size: 10MB)</span>
										</div>
									</div>
									<?php else : ?>
									<div class="control-group">
										<label for="file" class="control-label">Ganti File</label>
										<div class="controls">
											<span class="help-block">File Sekarang</span>
											<span class="uneditable-input"><?php echo $joblist->file_perusahaan; ?></span>
											<span class="help-block">Ganti File</span>
										</div>
										<div class="controls">
											<input type="file" name="file" id="file" class="input-block-level">
											<span class="help-block">Only .rar/.zip/.pdf (Max Size: 10MB)</span>
										</div>
									</div>
									<?php endif; ?>
									<div class="control-group">
										<label for="textarea" class="control-label">Deskripsi Job Sheet</label>
										<div class="controls">
											<textarea name="deskripsi" id="textarea" rows="5" class="input-block-level"><?php echo $joblist->body; ?> </textarea>
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