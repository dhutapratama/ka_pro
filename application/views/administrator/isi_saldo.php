
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_4">
					<form action="<?php echo site_url("administrator/isi_saldo/do"); ?>" method="post">
						<p>
							<label>Pilih User</label>
							<select name="user">
								<?php 
								foreach ($users as $rows) {
								?>
								<option value="<?php echo $rows->id;?>"><?php echo $rows->nama; ?></option>
								<?php 
								} ?>
							</select>
						</p>
						<p>
							<label>Saldo</label>
							<select name="tambah_saldo">
								<option value="10000">Rp 10.000,00</option>
								<option value="20000">Rp 20.000,00</option>
								<option value="25000">Rp 25.000,00</option>
								<option value="30000">Rp 30.000,00</option>
								<option value="50000">Rp 50.000,00</option>
							</select>
						</p>
						<p align="right">
							<input type="submit" value="Update" id="fix-font" />
						</p>
					</form>
				</div>
				<div class="grid_12">
					<h2>Isi Saldo Member</h2>
					<table>
						<thead>
							<tr>
								<th>Nama</th>
								<th>Username</th>
								<th>Saldo</th>
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
							foreach ($users as $rows) {?>

							<tr>
								<td><?php echo $rows->nama; ?></td>
								<td><?php echo $rows->username; ?></td>
								<td>Rp <?php echo number_format($rows->saldo, 2, ',', '.'); ?></td>
							</tr>

							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
