
		
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
					<h2>Kereta Api Indonesia</h2>
					<p>
						PT Kereta Api Indonesia (Persero) (disingkat KAI atau PT KAI) adalah Badan Usaha Milik Negara Indonesia yang menyelenggarakan jasa angkutan kereta api. Layanan PT Kereta Api Indonesia meliputi angkutan penumpang dan barang. Pada akhir Maret 2007, DPR mengesahkan revisi UU No. 13/1992 yang menegaskan bahwa investor swasta maupun pemerintah daerah diberi kesempatan untuk mengelola jasa angkutan kereta api di Indonesia. Pada tanggal 14 Agustus 2008 PT Kereta Api Indonesia melakukan pemisahan Divisi Jabodetabek menjadi PT KAI Commuter Jabodetabek (KCJ) untuk mengelola kereta api penglaju di daerah Jakarta dan sekitarnya. selama tahun 2008 jumlah penumpang melebihi 197 juta.
					</p>
					<p>
						Pemberlakuan UU Perkeretaapian No. 23/2007 secara hukum mengakhiri monopoli PT Kereta Api Indonesia dalam mengoperasikan kereta api di Indonesia.
					</p>
					<p>
						Pada tanggal 28 September 2011, bertepatan dengan peringatan ulang tahunnya yang ke-66, KAI meluncurkan logo baru. Pada 29 Oktober 2014 PT KAI ini dipimpin oleh Edi Sukmoro yang sebelumnya menjabat sebagai Direktur pengelolaan aset nonproduksi Railways di PT KAI (Persero), menggantikan Direktur sebelumnya Ignasius Jonan.
					</p>
				</div>
			</div>
