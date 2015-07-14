
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_4">
					<form action="<?php echo site_url("administrator/rekening/create"); ?>" method="post">
						<p>
							<label>Nama Bank</label>
							<input type="text" name="nama_bank">
						</p>
						<p>
							<label>Nomor Rekening</label>
							<input type="text" name="no_rekening">
						</p>
						<p>
							<label>Atas Nama Rekening</label>
							<input type="text" name="atas_nama">
						</p>
						<p align="right">
							<input type="submit" value="Simpan" id="fix-font" />
						</p>
					</form>
				</div>
				<div class="grid_12">
					<h2>Daftar Nomor Rekening</h2>
					
					<table>
						<thead>
							<tr>
								<th>Nama Bank</th>
								<th>Nomor Rekeing</th>
								<th>Atas Nama</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" class="pagination">
									*) ISI SALDO
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php 
							foreach ($rekening as $rows) { ?>

							<tr>
								<td><?php echo $rows->nama_bank; ?></td>
								<td><?php echo $rows->no_rekening; ?></td>
								<td><?php echo $rows->atas_nama; ?></td>
								<td><a href="<?php echo site_url("administrator/rekening/delete")."/".$rows->id; ?>">Hapus</a></td>
							</tr>

							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
