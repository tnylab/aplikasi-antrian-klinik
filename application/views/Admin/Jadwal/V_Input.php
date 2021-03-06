<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h3 class="page-title">Input Jadwal</h3>
			<div class="row">
				<div class="col-md-12">
					<!-- INPUTS -->
					<div class="panel">
						<div class="panel-heading">
						</div>
						<div class="panel-body">
							<form action="<?php echo base_url('Jadwal/insertJadwal'); ?>" method="POST">
							<div class="col-md-3">
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="id_dokter">Dokter</label>
									<select id="id_dokter" name="id_dokter"  class="form-control">
									<?php 
									if($dokter){
									foreach ($dokter as $value) { ?>
										<option value="<?php echo $value['id_dok']; ?>"><?php echo $value['nama_dokter']; ?></option>
									<?php }} ?>
									</select>
								</div>

								<div class="form-group">
									<label for="bagian">Bagian</label>
									<input id="bagian" name="bagian" type="text" class="form-control" placeholder="Bagian" required="">
								</div>

								<div class="form-group">
									<label for="hari">Hari</label>
									<select id="hari" name="hari"  class="form-control">
										<option value="Senin">Senin</option>
										<option value="Selasa">Selasa</option>
										<option value="Rabu">Rabu</option>
										<option value="Kamis">Kamis</option>
										<option value="Jumat">Jumat</option>
										<option value="Sabtu">Sabtu</option>
										<option value="Minggu">Minggu</option>
									</select>
								</div>

								<div class="form-group">
									<div class="col-md-2">
										<label for=time_awal>Jam</label>
									</div>

									
									<div class="col-md-4">
										<input id="time_awal" name="time_awal" type="time" class="form-control" placeholder="Bagian" required="">
									</div>

									<div class="col-md-2 text-center">
										s/d
									</div>
									
									<div class="col-md-4">
										<input id="time_akhir" name="time_akhir" type="time" class="form-control" placeholder="Bagian" required="">
									</div>
									
								</div>
							</div>
							<div style="padding: 20px;" class="col-md-12 text-center">
								<input class="btn btn-success btn-lg" type="submit" value="Input">
							</div>
						</div>
					</div>
					<!-- END INPUTS -->
				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
