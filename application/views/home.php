
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_4">
					<form action="<?php echo site_url("reservasi"); ?>" method="get">
						<p>
							<label>Tanggal Keberangkatan</label>
							<select name="tanggal">
								<?php 
									$timestamp = time();
									
									for( $i = 1; $i <= 90; $i++) 
									{
								?>
								<option value="<?php echo $timestamp;?>"><?php echo date('l, d M Y', $timestamp);?></option>
								<?php 
										$timestamp = $timestamp + 3600 * 24;
									} ?>
							</select>
						</p>
						<p>
							<label>Stasiun Asal</label>
							<select name="stasiun_asal">
								<?php 
								foreach ($stasiun as $rows) {
								?>
								<option value="<?php echo $rows->id;?>"><?php echo $rows->nama_stasiun;?></option>
								<?php 
								} ?>
							</select>
						</p>
						<p>
							<label>Stasiun Tujuan</label>
							<select name="stasiun_tujuan">
								<?php 
								foreach ($stasiun as $rows) {
								?>
								<option value="<?php echo $rows->id;?>"><?php echo $rows->nama_stasiun;?></option>
								<?php 
								} ?>
							</select>
						</p>
						<p>
							<label>Jumlah Penumpang</label>
							<select name="penumpang">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</p>
						<p align="right">
							<input type="submit" value="Cari" id="fix-font" />
						</p>
					</form>
					
				</div>
				<div class="grid_12">
					<h2>Tugas Akhir Anda</h2>
					<p>
						Tugas akhir ini kami .....
					</p>
				</div>
			</div>
