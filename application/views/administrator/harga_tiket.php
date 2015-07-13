
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_4">
					<form action="<?php echo site_url("administrator/tiket/update_harga"); ?>" method="post">
						<p>
							<label>Stasiun Asal</label>
							<select name="stasiun_asal">
								<?php 
								foreach ($stasiun as $rows) {
								?>
								<option value="<?php echo $rows->id;?>"><?php echo $rows->nama_stasiun; ?></option>
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
								<option value="<?php echo $rows->id; ?>"><?php echo $rows->nama_stasiun;?></option>
								<?php 
								} ?>
							</select>
						</p>
						<p>
							<label>Harga</label>
							<input type="text" name="harga" value="0">
						</p>
						<p>
							<label>Nama Kereta</label>
							<input type="text" name="nama_kereta" value="">
						</p>
						<p>
							<label>Berangkat</label>
							<input type="text" name="berangkat" value="00.00">
						</p>
						<p>
							<label>Sampai</label>
							<input type="text" name="sampai" value="00.00">
						</p>
						<p align="right">
							<input type="submit" value="Update" id="fix-font" />
						</p>
					</form>

					<form action="<?php echo site_url("administrator/tiket/add_stasiun"); ?>" method="post">
						<p>
							<label>Nama Stasiun</label>
							<input type="text" name="nama_stasiun" value="">
						</p>
						<p align="right">
							<input type="submit" value="Tambah" id="fix-font" />
						</p>
					</form>
					
					<form action="<?php echo site_url("administrator/tiket/hapus_stasiun"); ?>" method="post">
						<p>
							<label>Nama Stasiun</label>
							<select name="stasiun">
								<?php 
								foreach ($stasiun as $rows) {
								?>
								<option value="<?php echo $rows->id;?>"><?php echo $rows->nama_stasiun; ?></option>
								<?php 
								} ?>
							</select>
						</p>
						<p align="right">
							<input type="submit" value="Hapus" id="fix-font" />
						</p>
					</form>
				</div>
				<div class="grid_12">
					<h2>Harga Tiket</h2>
					<table>
						<thead>
							<tr>
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
									*) Jika harga tiket Rp 0 maka jurusan kereta tidak aktif
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php 
							foreach ($stasiun as $rows_a) {
								foreach ($stasiun as $rows_b) {
									if($rows_a->id != $rows_b->id) { 
										$harga_tiket = $this->m_admin->get_harga_tiket($rows_a->id, $rows_b->id);
										$nama_kereta = $this->m_admin->get_nama_kereta($rows_a->id, $rows_b->id);
										$jam_berangkat = $this->m_admin->get_berangkat($rows_a->id, $rows_b->id);
										$jam_sampai = $this->m_admin->get_sampai($rows_a->id, $rows_b->id);

										if ($harga_tiket != 0) {
										?>

							<tr>
								<td><?php echo $rows_a->nama_stasiun; ?></td>
								<td><?php echo $rows_b->nama_stasiun; ?></td>
								<td><?php echo $jam_berangkat; ?></td>
								<td><?php echo $jam_sampai; ?></td>
								<td>Rp <?php echo number_format($harga_tiket, 2, ',', '.'); ?></td>
								<td><?php echo $nama_kereta; ?></td>
							</tr>

							<?php 		}
									}
								}	
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
