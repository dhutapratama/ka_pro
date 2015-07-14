
		
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
							</tr>
						</tbody>
					</table>
					
						<?php if($harga_tiket != 0) { ?>
					<form action="<?php echo site_url("reservasi/cetak_tiket/".$status_pemesanan); ?>" method="post">
						<input type="hidden" name="tanggal" value="<?php echo $this->input->post("tanggal"); ?>">
						<input type="hidden" name="stasiun_asal" value="<?php echo $this->input->post("stasiun_asal"); ?>">
						<input type="hidden" name="stasiun_tujuan" value="<?php echo $this->input->post("stasiun_tujuan"); ?>">
						<?php
							if ($this->session->userdata("id") == "") { ?>
								<div class="grid_6">
									<p>
										<label>Email</label>
										<u><?php echo $this->input->post("email"); ?></u>
									</p>
								</div>
						<?php } ?>

						<div class="grid_5">
							<p>
								<label>Tagihan</label>
								<u>Rp <?php echo number_format($harga_tiket*$this->input->post("penumpang"), 2, ',', '.'); ?></u>

							</p>
						</div>
						<?php if($this->session->userdata("id") != ""){?>
						<div class="grid_5">
							<p>
								<label>Lunas</label>
								<u>Saldo anda telah terpotong sebesar Rp <?php echo number_format($harga_tiket*$this->input->post("penumpang"), 2, ',', '.'); ?></u>
								
							</p>
						</div>
						<?php
						}
						for ($i=0; $i < $this->input->post("penumpang"); $i++) { 
						?>
						<div class="grid_12">
								<h4>Penumpang <?php echo $i+1; ?></h4>
						</div>
						<div class="grid_4">
							<p>
								<label>Nama</label>
								<u><?php echo $_POST["nama"][$i]; ?></u>
							</p>
						</div>

						<div class="grid_4">
							<p>
								<label>Nomor KTP</label>
								<u><?php echo $_POST["identitas"][$i]; ?></u>
							</p>
						</div>
						<div class="grid_3">
							<p>
								<label>Nomor Kursi</label>
								<u><?php echo $this->m_global->get_kursi_by_id($_POST["kursi"][$i]); ?></u>
							</p>
						</div>
						<?php
						} 
						if ($this->session->userdata("id") != "") { ?>
						<div class="grid_12">
							<p>
								<input type="submit" value="CETAK TIKET" id="fix-font">
							</p>
						</div>
						<?php
						} ?>
					</form>
					<?php } else {
						echo "<p>Rute tidak tersedia, Coba dengan rute yang lain!</p>";
					} ?>
					
					<?php if($this->session->userdata("id") == ""){ ?>
					<div style="background:#eee">
						<h4>Konfirmasi Pembayaran</h4>
						<form action="<?php echo site_url("reservasi/konfirmasi/".$status_pemesanan); ?>" method="post">
							<label>Nama Pengirim</label>
							<input type="text" name="nama_pengirim">
							<label>Nomor Rekening</label>
							<input type="text" name="no_rekening">
							<label>Rekening Tujuan</label>
							<select name="rekening_tujuan">
								<?php foreach ($rekening as $key => $value) { ?>
								<option value="<?php echo $value->id ?>"><?php echo $value->nama_bank ."( Rek. No. ".$value->no_rekening.")"; ?></option>
								<?php } ?>
							</select>
							<label>Jumlah Pembayaran</label>
							<input type="text" name="jumlah_pembayaran">
							<button type="submit">Konfirmasi Pembayaran</button>
						</form>
					</div>
					<?php } ?>
				</div>
			</div>
