
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Pesanan Tiket (Pending)</h2>
					<table>
						<thead>
							<tr>
								<th>Tanggal Reservasi</th>
								<th>Keberangkatan</th>
								<th>Nama Penumpang</th>
								<th>Tagihan</th>
								<th>Nama Pengirim</th>
								<th>No. Rekening</th>
								<th>Bank Tujuan</th>
								<th>Lunas</th>
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
							foreach ($tiket as $rows) {
								$tagihan = 0;
								if (strtotime($rows->tanggal_pesan)+3600 > time()) {
								?>

							<tr>
								<td><?php echo $rows->tanggal_pesan; ?></td>
								<td><?php echo $rows->tanggal_keberangkatan; ?></td>
								<td><?php echo $rows->nama_penumpang; ?></td>
								<!--<td><?php echo $rows->nama_stasiun_asal; ?></td>
								<td><?php echo $rows->nama_stasiun_tujuan; ?></td>-->
								<?php /*
									$get_tagihan = $this->m_admin->get_tagihan_by_session($rows->session);
									foreach ($get_tagihan as $key => $value) {
										$tagihan = $tagihan + $value->harga;
									}*/
								?>
								<td>Rp <?php echo number_format($tagihan, 2, ',', '.'); ?></td>
								<td><?php echo $rows->nama_pengirim; ?></td>
								<td><?php echo $rows->no_rekening; ?></td>
								<td><?php echo $this->m_admin->get_rekening_by_id($rows->id_rekening_tujuan)->nama_bank; ?></td>
								<td><a href="<?php echo base_url("administrator/pending/".$rows->session); ?>">Lunas</a></td>
							</tr>

							<?php
								} else {
									$this->m_admin->tiket_hangus($rows->session);
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
