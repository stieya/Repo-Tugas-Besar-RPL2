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
									Nilai Kinerja Dari <?php echo $employe->nama; ?>
								</h3>
							</div>
							<div class="box-content nopadding">
								<div class="text-center" >
								<?php echo validation_errors(); ?>
								</div >
								<?php echo form_open('', 'class="form-horizontal form-bordered"');?>
									<div class="control-group">
										<label class="control-label">Tingkat Disiplin</label>
										<div class="controls">
											<label class='radio'>
												<input type="radio" name="disiplin" value="20"> Sangat Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="disiplin" value="40"> Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="disiplin" value="60"> Cukup
											</label>
											<label class='radio'>
												<input type="radio" name="disiplin" value="80"> Bagus
											</label>
											<label class='radio'>
												<input type="radio" name="disiplin" value="100"> Sangat Bagus
											</label>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tingkat Kerajinan</label>
										<div class="controls">
											<label class='radio'>
												<input type="radio" name="rajin" value="20"> Sangat Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="rajin" value="40"> Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="rajin" value="60"> Cukup
											</label>
											<label class='radio'>
												<input type="radio" name="rajin" value="80"> Bagus
											</label>
											<label class='radio'>
												<input type="radio" name="rajin" value="100"> Sangat Bagus
											</label>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Tingkat Komunikasi</label>
										<div class="controls">
											<label class='radio'>
												<input type="radio" name="komunikasi" value="20"> Sangat Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="komunikasi" value="40"> Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="komunikasi" value="60"> Cukup
											</label>
											<label class='radio'>
												<input type="radio" name="komunikasi" value="80"> Bagus
											</label>
											<label class='radio'>
												<input type="radio" name="komunikasi" value="100"> Sangat Bagus
											</label>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tingkat Ketanggapan</label>
										<div class="controls">
											<label class='radio'>
												<input type="radio" name="tanggap" value="20"> Sangat Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="tanggap" value="40"> Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="tanggap" value="60"> Cukup
											</label>
											<label class='radio'>
												<input type="radio" name="tanggap" value="80"> Bagus
											</label>
											<label class='radio'>
												<input type="radio" name="tanggap" value="100"> Sangat Bagus
											</label>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Tingkat Kecermatan</label>
										<div class="controls">
											<label class='radio'>
												<input type="radio" name="cermat" value="20"> Sangat Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="cermat" value="40"> Buruk
											</label>
											<label class='radio'>
												<input type="radio" name="cermat" value="60"> Cukup
											</label>
											<label class='radio'>
												<input type="radio" name="cermat" value="80"> Bagus
											</label>
											<label class='radio'>
												<input type="radio" name="cermat" value="100"> Sangat Bagus
											</label>
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