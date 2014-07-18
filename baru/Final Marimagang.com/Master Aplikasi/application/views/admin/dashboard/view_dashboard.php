		<div id="main" >
			<div class="container-fluid">
				<div class="page-header">
					<div class="pull-left">
						<h1>Dashboard</h1>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Universitas
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Universitas</th>
											<th>Alamat</th>
											<th>Kota</th>
											<th>Kode Pos</th>
											<th>Telepon</th>
											<th>Website</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										foreach ($universitas as $univ) 
										{
											$i++;
									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td>
												<?php echo $univ->namaUniv; ?>
											</td>
											<td>
												<?php echo $univ->alamat; ?>
											</td>
											<td>
												<?php echo $univ->namaKota; ?>
											</td>
											<td>
												<?php echo $univ->kode_pos; ?>
											</td>
											<td>
												<?php echo $univ->telepon; ?>
											</td>
											<td>
												<a href="<?php echo $univ->website; ?>" target="_blank">
													<?php echo $univ->website; ?>
												</a>
											</td>
											<td>
												<a href="<?php echo base_url().'admin/ubah/universitas/'.$univ->id_universitas; ?>"><i class="icon-edit"></i></a>
												<a href="<?php echo base_url().'admin/dashboard/delete/universitas/'.$univ->id_universitas; ?>"><i class="icon-remove"></i></a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Kota
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Kota</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										foreach ($kota as $kot) 
										{
											$i++;
									?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
											<td>
												<?php echo $kot->nama; ?>
											</td>
											<td>
												<a href="<?php echo base_url().'admin/ubah/kota/'.$kot->id_kota; ?>"><i class="icon-edit"></i></a>
												<a href="<?php echo base_url().'admin/dashboard/delete/kota/'.$kot->id_kota; ?>"><i class="icon-remove"></i></a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Jurusan
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Jurusan</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										foreach ($jurusan as $jur) 
										{
											$i++;
									?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
											<td>
												<?php echo $jur->nama; ?>
											</td>
											<td>
												<a href="<?php echo base_url().'admin/ubah/jurusan/'.$jur->id_jurusan; ?>"><i class="icon-edit"></i></a>
												<a href="<?php echo base_url().'admin/dashboard/delete/jurusan/'.$jur->id_jurusan; ?>"><i class="icon-remove"></i></a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="icon-table"></i>
									Provinsi
								</h3>
							</div>
							<div class="box-content nopadding">
								<table class="table table-hover table-nomargin dataTable table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Provinsi</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									<?php
										$i=0;
										foreach ($provinsi as $prov) 
										{
											$i++;
									?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
											<td>
												<?php echo $prov->nama; ?>
											</td>
											<td>
												<a href="<?php echo base_url().'admin/ubah/provinsi/'.$prov->id_provinsi; ?>"><i class="icon-edit"></i></a>
												<a href="<?php echo base_url().'admin/dashboard/delete/provinsi/'.$prov->id_provinsi; ?>"><i class="icon-remove"></i></a>
											</td>
										</tr>
									<?php
										}
									?>
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