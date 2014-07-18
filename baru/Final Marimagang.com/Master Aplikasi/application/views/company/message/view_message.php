<div id="main">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<div class="box box-bordered box-color">
					<div class="box-title">
						<h3>
							<i class="icon-envelope"></i>
							Conversation
						</h3>
					</div>
						<div class="tab-content">
							<div class="tab-pane active" id="inbox">
								<div class="highlight-toolbar">
									<table class="table table-striped table-nomargin table-mail">
										<thead>
											<tr>
												<th class='table-icon hidden-480'>Action </th>
												<th>Sender</th>
												<th>Subject</th>
												<th class='table-icon hidden-480'></th>
												<th class='table-date hidden-480'>Date</th>
											</tr>
										</thead>
										<tbody>
												<?php foreach($messages as $message) : ?>
												<tr>
													<td class='table-icon hidden-480'>
														<a href="<?php echo base_url().'company/message/'.$message->id_user;?>" class="btn btn-primary"> Baca</a>
													</td>
													<td class='table-fixed-medium'>
														<?php echo $message->nama ?>
													</td>
													<td>
														<?php echo substr($message->body,0,100) ; ?>
													</td>
													<td class='table-icon hidden-480'>
														<i class="icon-paper-clip"></i>
													</td>
													<td class='table-date hidden-480'>
														
													</td>
												</tr>
												<?php  endforeach; ?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>