
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Report Kegiatan Transaksi</h2>
					<table>
						<thead>
							<tr>
								<th>Tanggal Transaksi</th>
								<th>Kredit</th>
								<th>Debit</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" class="pagination">
									*) LOG Saldo dan Transaksi
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php
							$trans = false;
							foreach ($transaksi as $rows) {
								$trans = true;
								?>

							<tr>
								<td><?php echo $rows->tanggal; ?></td>
								<td>Rp <?php echo number_format($rows->debit, 2, ',', '.'); ?></td>
								<td>Rp <?php echo number_format($rows->kredit, 2, ',', '.'); ?></td>
								<td><?php echo $rows->keterangan; ?></td>
								
							</tr>

							<?php
							}

							if ($trans == false) {
								echo '<tr><td colspan="4">Tidak ada transaksi</td></tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
