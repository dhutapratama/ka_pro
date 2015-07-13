
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_16">
					<h2>Daftar Member</h2>
					<table>
						<thead>
							<tr>
								<th>Nama</th>
								<th>Identitas</th>
								<th>Username</th>
								<th>Saldo</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="5" class="pagination">
									*) Daftar Member
								</td>
							</tr>
						</tfoot>
						<tbody>
							<?php
							foreach ($users as $rows) {?>

							<tr>
								<td><?php echo $rows->nama; ?></td>
								<td><?php echo $rows->identitas; ?></td>
								<td><?php echo $rows->username; ?></td>
								<td>Rp <?php echo number_format($rows->saldo, 2, ',', '.'); ?></td>
								<td><a href="<?php echo site_url("administrator/members")."/".$rows->id; ?>">Hapus</a></td>
							</tr>

							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
