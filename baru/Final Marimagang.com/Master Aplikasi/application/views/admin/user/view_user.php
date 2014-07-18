		<div id='main'>
			<div class='container-fluid'>
				<div class='row-fluid'>
					<div class="span12">
						<div class="box ">
							<div class="box-title">
								<h3><i class="icon-user"></i>Daftar Mahasiswa</h3>
								<div class="actions">
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="550" data-visible="true">
								<table class="table ">
									<tbody>
										<?php foreach($users as $user) : ?>
										<?php if($user->block == '0') : ?>
										<tr style="background:#d1e5f8;" >
											<td style="width:10%;max-height:15px" class='img'>
											<?php if($user->foto_user != NULL ) : ?>
											<img src="<?php echo base_url().$user->foto_user; ?>" alt="">
											<?php else : ?>
											<img src="<?php echo base_url().'img/no_image.png'; ?>" alt="">
											<?php endif; ?>
											</td>
											<td style="width:60%" class='user'>
												<p> Nama : <?php echo $user->nama_user; ?> </p>
												<p> Status : Aktif </p>
												<p> Tanggal Daftar : <?php echo $user->tanggal_masuk; ?>
												<p> Universitas : <?php echo $user->nama_universitas;?> </p>																								
											</td>
											<td style="width:10%" class='icon'><a href="<?php echo base_url().'admin/user/block/'.$user->id_user;?>" class='btn'><i class="icon-ban-circle"></i> Block</a></td>
										</tr>
										<?php elseif($user->block == '1') : ?>
										<tr style="background:#e74c3c;" >
										
											<td style="width:10%;max-height:15px" class='img'><img src="<?php echo base_url().$user->foto_user; ?>" alt=""></td>
											<td style="width:60%" class='user'>
												<p> Nama : <?php echo $user->nama_user; ?> </p>
												<p> Status : Banned </p>
												<p> Tanggal Daftar : <?php echo $user->tanggal_masuk; ?>
												<p> Universitas : <?php echo $user->nama_universitas;?> </p>																								
											</td>
											<td style="width:10%" class='icon'><a href="<?php echo base_url().'admin/user/unblock/'.$user->id_user;?>" class='btn'><i class="icon-ban-circle"></i> Unblock</a></td>
										</tr>
										<?php endif; ?>
										<?php endforeach; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>