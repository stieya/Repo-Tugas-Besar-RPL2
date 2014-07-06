		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Pesan Masuk</h1>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box">
							
							<div class="box-content nopadding scrollable" data-height="400" data-start="bottom" data-visible="true">
								<ul class="messages withlist">
									<?php
										foreach ($detail_pesan->pesan as $d_pesan)
										{
									?>
									<?php
											if ($d_pesan->status_user == "STUDENT")
											{
									?>
									<li class="left">
										<div class="message">
											<span class="caret"></span>
											<span class="name"><?php echo $d_pesan->nama; ?></span>
											<p><?php echo $d_pesan->body; ?> </p>
											<span class="time">
												<?php echo $d_pesan->tanggal; ?>
											</span>
										</div>
									</li>
									<?php
											}
											else
											{
									?>
									<li class="right">
										<div class="image">
											<?php
												if ($d_pesan->foto_user == "")
												{
													$fotos = "img/no_image.png";
												}
												else
												{
													$fotos = 'images/company/'.$d_pesan->id_user.'/'.$d_pesan->foto_user;
												}
											?>
											<img src="<?php echo base_url().$fotos;?>" alt="">
										</div>
										<div class="message">
											<span class="caret"></span>
											<span class="name"><?php echo $d_pesan->nama; ?></span>
											<p><?php echo $d_pesan->body; ?> </p>
											<span class="time">
												<?php echo $d_pesan->tanggal; ?>
											</span>
										</div>
									</li>
									<?php
											}

										}
									?>
								</ul>
							</div>
							<ul class="messages">
								<li class="insert">
									<?php
										echo form_open_multipart('user/message/kirim/'.$detail_pesan->msg.'/'.$detail_pesan->pengirim);
									?>
										<div class="text">
											<input type="text" name="body" placeholder="Tulis pesan anda disini..." class="input-block-level">
										</div>
										<div class="submit">
											<button type="submit"><i class="icon-share-alt"></i></button>
										</div>
									<?php
										echo form_close();
									?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	
</body>
</html>