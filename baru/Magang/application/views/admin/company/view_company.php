		<div id='main'>
			<div class='container-fluid'>
				<div class='row-fluid'>
					<div class="span12">
						<div class="box ">
							<div class="box-title">
								<h3><i class="icon-user"></i>Daftar Perusahaan</h3>
								<div class="actions">
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="300" data-visible="true">
								<table class="table ">
									<tbody>
										<?php foreach($users as $user) : ?>
										<?php if($user->block == '0') : ?>
										<tr style="background:#d1e5f8;" >
											<td style="width:10%;max-height:15px" class='img'><img src="../images/company/1/455116.jpg" alt=""></td>
											<td style="width:60%" class='user'>
												<p> Email : <?php echo $user->email;?> </p>
												<p> Nama : <?php echo $user->nama; ?> </p>
												<p> Status : Aktif </p>
												<p> Tanggal Daftar : <?php echo $user->tanggal_masuk; ?>
												<p>Tentang </p>
												<p> <?php echo substr($user->about, 0,400); ?>
											</td>
											<td style="width:10%" class='icon'><a href="#" class='btn'><i class="icon-search"></i> Lihat</a></td>
											<td style="width:10%" class='icon'><a href="<?php echo base_url().'admin/company/block/'.$user->id_user;?>" class='btn'><i class="icon-ban-circle"></i> Block</a></td>
										</tr>
										<?php elseif($user->block == '1') : ?>
										<tr style="background:#e74c3c;" >
											<td style="width:10%;max-height:15px" class='img'><img src="../images/company/1/455116.jpg" alt=""></td>
											<td style="width:60%" class='user'>
												<p> Email : <?php echo $user->email;?> </p>
												<p> Nama : <?php echo $user->nama; ?> </p>
												<p> Status : Banned </p>
												<p> Tanggal Daftar : <?php echo $user->tanggal_masuk; ?>
												<p>Tentang </p>
												<p> <?php echo substr($user->about, 0,400); ?>
											</td>
											<td style="width:10%" class='icon'><a href="#" class='btn'><i class="icon-search"></i> Lihat</a></td>
											<td style="width:10%" class='icon'><a href="<?php echo base_url().'admin/company/unblock/'.$user->id_user;?>" class='btn'><i class="icon-ban-circle"></i> UnBlock</a></td>
										</tr>
										<?php endif; ?>
										<?php endforeach; ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>