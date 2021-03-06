<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Edit Layanan</h3>
			<div class="row">
				<div class="col-md-12">
					<!-- EDIT -->
					<div class="panel">
						<div class="panel-heading">
						</div>
						<div class="panel-body">
							<form action="<?php echo base_url('Layanan/updateLayanan'); ?>" method="POST">
							<input type="hidden" value="<?php echo $id_layanan; ?>" name="id_layanan">
							<?php if($list){
								foreach ($list as $value) {
							?>
							

							<div class="col-md-6">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $value['nama']; ?>" required="">
								</div>

								<div class="form-group">
									<label for="layanan_medis">Layanan Medis</label>
									<input id="layanan_medis" name="layanan_medis" type="text" class="form-control" placeholder="Layanan Medis" value="<?php echo $value['layanan_medis']; ?>" required="">
								</div>

								<div class="form-group">
									<label for="info_medis">Info Medis</label>
									<textarea id="info_medis" name="info_medis" class="form-control" placeholder="Info Medis"  required=""><?php echo $value['info_medis']; ?>
									</textarea>
								</div>
							</div>

							<?php
								}
							}
							?>
							<div class="col-md-12">
								<input class="btn btn-primary btn-lg" type="submit" value="Update">
							</div>
						</div>
						<!-- END EDIT -->
					</div>
				</div>
			</div>
		</div>
		<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->
