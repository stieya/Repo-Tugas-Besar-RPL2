		<div id="main">
			<div class="container-fluid">
				<div class="row-fluid"
					<div class="span12">
						<div class="box ">
							<div class="box-title">
								<h3><i class="icon-bullhorn"></i>Feeds</h3>
								<div class="actions">
								</div>
							</div>
							<div class="box-content nopadding scrollable" data-height="400" data-visible="true">
								<table class="table table-nohead" id="randomFeed">
									<tbody>
										<?php if(count($notifikasi) > 0) : ?>
										<?php foreach($notifikasi as $res) : ?>
										<tr>
											<td><span class="label"><i class="icon-plus"></i></span> <?php  echo $res->body; ?></td>
										</tr>
										<?php endforeach; ?>
										
										<?php else : ?>
										<tr>
											<h3 class='text-center'> Belum Ada Notifikasi Untuk Anda</h3>
										</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>