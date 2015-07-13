
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_4">
					<form action="<?php echo site_url("administrator/admins/create"); ?>" method="post">
						<p>
							<label>Username</label>
							<input type="text" name="username">
						</p>
						<p>
							<label>Password</label>
							<input type="password" name="password">
						</p>
						<p align="right">
							<input type="submit" value="Registrasikan" id="fix-font" />
						</p>
					</form>
				</div>
				<div class="grid_12">
					<h2>User Administrator</h2>
					<?php if (isset($notifikasi)) {
						if ($notifikasi == false) {
							echo '<p class="error">Anda tidak bisa menghapus user! Administrator setidaknya memiliki 1 akun.</p>';
						}
					}?>
					<table>
						<thead>
							<tr>
								<th>Username</th>
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
							foreach ($admins as $rows) {?>

							<tr>
								<td><?php echo $rows->username; ?></td>
								<td><a href="<?php echo site_url("administrator/admins/delete")."/".$rows->iduser; ?>">Hapus</a></td>
							</tr>

							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
