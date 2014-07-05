<div id="main">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="box">
					<div class="box-title">
						<h3>
							<i class="icon-comments"></i>
							Percakapan Dengan <?php echo $nama_user->nama; ?>
						</h3>
						<div class="actions">
							<a href="#" class="btn btn-mini content-refresh"><i class="icon-refresh"></i></a>
							<a href="#" class="btn btn-mini content-remove"><i class="icon-remove"></i></a>
							<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
						</div>
					</div>
					<div class="box-content nopadding scrollable" data-height="400" data-start="top" data-visible="true">
						<ul class="messages">
							<li class="insert">
								<?php echo form_open('','id=message-form'); ?>
									<div class="text">
										<input type="text" name="message" placeholder="Write here..." class="input-block-level">
									</div>
									<div class="submit">
										<button type="submit"><i class="icon-share-alt"></i></button>
									</div>
								<?php echo form_close();?>
							</li>
							<?php if(count($messages) > 0) : ?>
							<?php foreach($messages as $message) : ?>
							<?php if($message->id_user_pengirim != $this->session->userdata('id_user')) : ?>
							<li class="left">
								<div class="image">
									<?php if($message->foto_user != NULL) : ?>
									<img src="<?php echo base_url().'images/student/'.$message->id_user_pengirim.'/'.$message->foto_user; ?>" alt="">
									<?php else : ?>
									<img src="<?php echo base_url().'img/no_image.png'; ?>" alt="">
									<?php endif; ?>
								</div>
								<div class="message">
									<span class="caret"></span>
									<span class="name"><b><?php echo $message->nama_student ; ?></b></span>
									<p><?php echo $message->body; ?> </p>
									<span class="time">
										12 minutes ago
									</span>
								</div>
							</li>
							<?php else : ?>
							<li class="right">
								<div class="image">
									<?php if($message->foto_user != NULL) : ?>
									<img src="<?php echo base_url().'images/company/'.$this->session->userdata('id_user').'/'.$message->foto_user; ?>" alt="">
									<?php else : ?>
									<img src="<?php echo base_url().'img/no_image.png'; ?>" alt="">
									<?php endif; ?>
								</div>
								<div class="message">
									<span class="caret"></span>
									<span class="name"><b><?php echo $message->nama_perusahaan; ?></b></span>
									<p><?php echo $message->body; ?></p>
									<span class="time">
										12 minutes ago
									</span>
								</div>
							</li>
							<?php endif; ?>
							<?php endforeach; ?>
							<?php endif; ?>
							
							
						</ul>
					</div>
				</div>
			</div>