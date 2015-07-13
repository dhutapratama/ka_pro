
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_5" id="centered">
					<?php
						if (isset($registrasi)) {
							if($registrasi == false){
								echo validation_errors('<p class="error">', '</p>');
							} else { ?>
							<p class="success">Pendaftaran Sukses! Silahkan melakukan login.</p>
					<?php	}
						} ?>
					<form action="<?php echo site_url("registrasi/go"); ?>" method="post">						<p>PENDAFTARAN AKUN</p>
						<p>
							<label>Username</label>
							<input type="text" name="username" />
						</p>
						<p>
							<label>Password</label>
							<input type="password" name="password" />
						</p>

						<p>IDENTITAS PRIBADI</p>
						<p>
							<label>Nama</label>
							<input type="text" name="nama" />
						</p>
						<p>
							<label>Nomor Identitas (KTP/SIM/KK)</label>
							<input type="text" name="identitas" />
						</p>
						<p align="right">
							<input type="submit" value="Daftarkan" id="fix-font" />
						</p>
					</form>
				</div>
			</div>

