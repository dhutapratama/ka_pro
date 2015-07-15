<?php 
$i = 0;
	foreach ($kursi as $rows_a) {
		$available = true;
		foreach ($kursi_booked as $rows_b) { 
			if ($rows_a->id == $rows_b->id_kursi) {
				$available = false;
			}
		}
		if ($available == true) {
			$slots[$i]['id']   = $rows_a->id;
			$slots[$i]['nama'] = $rows_a->nama_kursi;
			$i++;
		}
	}
?>
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
								<?php } ?>
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
							<label>Penumpang</label>
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
					<h2>Reservasi Tiket</h2>

					<table>
						<thead>
							<tr>
								<th>Tanggal</th>
								<th>Stasiun Asal</th>
								<th>Stasiun Tujuan</th>
								<th>Berangkat</th>
								<th>Sampai</th>
								<th>Harga Tiket</th>
								<th>Nama Kereta</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" class="pagination">
									*) Cek kembali rute perjalanan anda sebelum memesan
								</td>
							</tr>
						</tfoot>
						<tbody>
							<tr>
								<td><?php echo date('l, d M Y', $tanggal);?></td>
								<td><?php echo $stasiun_asal; ?></td>
								<td><?php echo $stasiun_tujuan; ?></td>
								<td><?php echo $jam_berangkat; ?></td>
								<td><?php echo $jam_sampai; ?></td>
								<td>Rp <?php echo number_format($harga_tiket, 2, ',', '.'); ?></td>
								<td><?php echo $nama_kereta; ?></td>
							</tr>
						</tbody>
					</table>
					<?php if (isset($saldo_tidak_cukup)) { ?>
						<h4>Saldo anda tidak mencukupi!</h4>
						<p>
							<label>Total Tagihan</label>
							Rp <?php echo number_format($harga_tiket*$this->input->get("penumpang"), 2, ',', '.'); ?>
						</p>
					<?php } else { ?>
					<img src="/images/kursi-kereta.png">
						<?php if($harga_tiket != 0) { ?>
					<form action="<?php echo site_url("reservasi/pesan"); ?>" method="post">
						<input type="hidden" name="tanggal" value="<?php echo $this->input->get("tanggal"); ?>">
						<input type="hidden" name="stasiun_asal" value="<?php echo $this->input->get("stasiun_asal"); ?>">
						<input type="hidden" name="stasiun_tujuan" value="<?php echo $this->input->get("stasiun_tujuan"); ?>">
						<input type="hidden" name="penumpang" value="<?php echo $this->input->get("penumpang"); ?>">
						
						<?php
							if ($this->session->userdata("id") == "") { ?>
									<?php if ($this->input->get("email") == "error") {
										echo '<p class="error">Harap isi email anda</p>';
									}?>
								<p>
									<label>Email</label>
									<input type="text" name="email">
									
								</p>
								<p>
									<label>Total Tagihan</label>
									Rp <?php echo number_format($harga_tiket*$this->input->get("penumpang"), 2, ',', '.'); ?>
								</p>
						<?php }
						?>

						<?php
						for ($i=1; $i <= $this->input->get("penumpang"); $i++) { ?>
						<p><h4 style="background:#eeeeee; text-align:center;">Penumpang <?php echo $i; ?></h4></p>
						<p>
							<label>Nama</label>
							<input type="text" name="nama[]" value="<?php echo $this->session->userdata("nama"); ?>">
						</p>
						<p>
							<label>Nomor KTP</label>
							<input type="text" name="identitas[]" value="<?php echo $this->session->userdata("identitas"); ?>">
						</p>
						<p>
							<label>Nomor Kursi</label>
							<p><?php echo $slots[$i-1]['nama']; ?></p>
							<input type="hidden" name="kursi[]" value="<?php echo $slots[$i-1]['id']; ?>">
						</p>
						<?php
						}
						?>
						<p>
							<input type="submit" value="Pesan" id="fix-font">
						</p>
					</form>
					<?php } else {
						echo "<p>Rute tidak tersedia, Coba dengan rute yang lain!</p>";
					} } ?>
				</div>
			</div>
