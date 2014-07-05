		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Perusahaan</h1>
						
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Perusahaan
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
									<?php foreach($company as $perusahaan):?>
										<tr>
											<td class='hidden-480'><a href="<?php echo site_url();?>user/company/<?php echo $perusahaan->id_perusahaan;?>"><?php echo $perusahaan->nama;?></a></td>
										</tr>
									<?php endforeach;?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>	
</body>
</html>