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
							<div class="box-content">
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
							</div>
								<?php if($jenis == 'perusahaan') : ?>
								<div class="search-results">
									<ul>
										<?php foreach($search as $res ) : 
											if ($res->foto_user == "")
												{
													$fotos = "img/no_image.png";
												}
												else
												{
													$fotos = $res->foto_user;
												}

										?>

										<li>
											<div class="thumbnail">
												<img src="" alt="">
												<img src="<?php echo base_url().$fotos; ?>" style="width:50px;height:60px;" alt="">
											</div>
											<div class="search-info">
												<a href="<?php echo base_url().'user/company/'.$res->id_perusahaan.'/0/1/'; ?>"><?php echo $res->nama; ?></a>
												<p class="url"> www.<?php echo $res->website ; ?>/</p>
												<p>
													<?php echo $res->about; ?>
												</p>
											</div>
										</li>
										<?php endforeach; ?>
									</ul>
								</div>
							<?php endif; ?>

							<?php if($jenis == 'pekerjaan') : ?>
								<?php $i=1;$j=0; foreach($search as $res ) : ?>
								<?php if(($j%3) == 0) : ?>
								<div class="row-fluid">	
								<?php endif; ?>		
									<div class="span4" style="margin-left: 10px;">
										<div class="box box-color box-bordered">
											<div class="box-title">
												<h3>
													<i class="icon-tasks"></i>
													<?php echo $res->nama_job_sheet; ?>
												</h3>
											</div>
											<div class="box-content">
												<div class="statistic-big">
													<div class="top">
														<div class="left">
															<h6> Bidang Khusus </h6>
															<?php if($res->nama_jurusan == null) : ?>
															<h5> UMUM </h5>
															<?php else :?>
															<h5> <?php echo $res->nama_jurusan?> </h5>
															<?php endif; ?>
															
														</div>
														<div class="right">
															<p>
																<a href="<?php echo base_url().'user/jobsheet/detail/'.$res->id_job_sheet.'/0/1'; ?>" class="btn btn-warning">Detail</a>
															</p>
															<h6>
																Durasi : 120 Hari
															</h6>
														</div>
													</div>
													<div class="bottom">
														<?php echo $res->deskripsi_job_sheet; ?>								</div>
												</div>
											</div>
										</div>
									</div>
								<?php if(($i%3) == 9) : ?>
								</div>
								<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>
							</div>
						</div>
					</div>
				</div>				