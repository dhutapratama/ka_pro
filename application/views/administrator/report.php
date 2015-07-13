
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Report Pemesanan Tiket</h2>
					<table>
						<thead>
							<tr>
								<th>Tanggal Reservasi</th>
								<th>Tanggal Keberangkatan</th>
								<th>Nama Penumpang</th>
								<th>Identitas</th>
								<th>Stasiun Asal</th>
								<th>Stasiun Tujuan</th>
								<th>Cetak Tiket</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" class="pagination">
									*) Report Pemesanan Tiket
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach ($tiket as $rows) {?>

							<tr>
								<td><?php echo $rows->tanggal_pesan; ?></td>
								<td><?php echo $rows->tanggal_keberangkatan; ?></td>
								<td><?php echo $rows->nama_penumpang; ?></td>
								<td><?php echo $rows->identitas; ?></td>
								<td><?php echo $rows->nama_stasiun_asal; ?></td>
								<td><?php echo $rows->nama_stasiun_tujuan; ?></td>
								<!--<td>Rp <?php echo number_format($rows->harga, 2, ',', '.'); ?></td>-->
								<td><a href="<?php echo site_url("reservasi/cetak_tiket/".$rows->session); ?>">Cetak</a></td>
								
							</tr>

							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
