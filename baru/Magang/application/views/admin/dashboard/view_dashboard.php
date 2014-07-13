		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-reorder"></i>
									Status Lembar Kerja
								</h3>
								<div class="actions">
									<a href="#" class="btn btn-mini content-slideUp"><i class="icon-angle-down"></i></a>
								</div>
							</div>
							<div class="box-content">
								<table class="table table-hover">
									<tbody>
										<tr>
											<td>Jumlah User</td>
											<td class='hidden-480'><?php echo count($info->users); ?></td>
										</tr>
										<tr>
											<td>Jumlah Pengunjung Hari Ini</td>
											<td class='hidden-480'>2</td>
										</tr>
										<tr>
											<td>Jumlah Hits</td>
											<td class='hidden-480'>3</td>
										</tr>
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