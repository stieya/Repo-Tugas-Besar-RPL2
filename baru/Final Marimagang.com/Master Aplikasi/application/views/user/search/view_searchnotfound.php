				<script type="text/javascript">


				console.log('asdasdsad');
				$(document).ready(function(){
					
					$('#carijob').on('submit',function(){
						event.preventDefault();
						kota = $('#kota').val();
						jenis = $('#jenis').val();
						string = $('#string').val();

						if(kota == '' && jenis != '' && string == '' ){
							window.location.href = "<?php echo base_url(); ?>user/search/0/"+jenis;
						}

						if(kota == '' && jenis == 'pekerjaan' && string == '' ){
							window.location.href = "<?php echo base_url(); ?>user/search/0/"+jenis;
						}

						if(kota == '' && jenis == 'perusahaan' && string != ''){
							window.location.href = "<?php echo base_url(); ?>user/search/0/"+jenis+'/'+string;
						}

						if(kota == '' && jenis == 'pekerjaan' && string != '' ){
							window.location.href = "<?php echo base_url(); ?>user/search/0/"+jenis+'/'+string;
						}

						if(kota != '' && jenis == '' && string != ''){
							window.location.href = "<?php echo base_url(); ?>user/search/"+kota+'/none/'+string;
						}

						if(kota != '' && jenis != '' && string != ''){
							window.location.href = "<?php echo base_url(); ?>user/search/"+kota+'/'+jenis+'/'+string;
						}

						

						if(kota != '' && jenis != '' && string == ''){
							window.location.href = "<?php echo base_url(); ?>user/search/"+kota+'/'+jenis;
						}

						

						if(kota != '' && jenis == '' && string == ''){
							window.location.href = "<?php echo base_url(); ?>user/search/"+kota;
						}

						if(kota == '' && jenis == '' && string == ''){

							window.location.href = "<?php echo base_url(); ?>user/search/";
						}


					});

				});
				
				</script>

			<div id="main">
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							<div class="box-title">
								<h3>
									<i class="icon-picture"></i>
									Cari Job Sheet
								</h3>
							</div>
							<div class="box-content nopadding">
								<div class="highlight-toolbar">
									<div class="pull-left">
										<div class="btn-toolbar">
											<form id="carijob">
											<div class="btn-group">
												<select name="kota" id="kota" class='chosen-select' data-placeholder="Pilih Kota">
													<option value=""> Semua Daerah </option>
													<?php foreach($listkota as $res) : ?>
													
													<?php if($res['id_kota'] == $kota) :?>
													<option value="<?php echo $res['id_kota']; ?>" selected="selected"> <?php echo $res['nama']; ?> </option>
													<?php else : ?>
													<option value="<?php echo $res['id_kota']; ?>"> <?php echo $res['nama']; ?> </option>
													<?php endif; ?>

													<?php endforeach; ?>
												</select>
											</div>
											<div class="btn-group">
												<select name="jenis" id="jenis" class='chosen-select' data-placeholder="Pilih Jenis" data-nosearch="true">
													<option value=""> </option>
													<?php if($jenis == 'perusahaan') : ?>
													<option value="perusahaan" selected='selected'> Perusahaan </option>
													<?php else : ?>
													<option value="perusahaan"> Perusahaan </option>
													<?php endif; ?>

													<?php if($jenis == 'pekerjaan') : ?>
													<option value="pekerjaan" selected='selected'> Pekerjaan </option>
													<?php else : ?>
													<option value="pekerjaan"> Pekerjaan </option>
													<?php endif; ?>
													
												</select>
											</div>
											<div class="btn-group">
												<input type='text' name="string" id="string" value="<?php echo $string; ?>" placeholder="Masukkan Kata Pencarian">
											</div>
											<div class="btn-group">
												<input type="submit" class="btn" rel="tooltip" title="Apply filter" style='margin-top:-10px;' value="Cari">
											</div>
											</form>
										</div>
									</div>
								</div>
								<div class='span12 text-center'>
									<h1>DATA TIDAK DITEMUKAN</h1>
								</div>
							</div>
						</div>
					</div>
				</div>				