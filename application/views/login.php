
		
			<div id="content" class="container_16 clearfix">
				<div class="grid_5" id="centered">
					<?php

						if (isset($login)) {
							if($login == false){ ?>
								<p class="error">Cek dulu username dan password anda!</p>
					<?php	}
						}
					?>
					<form action="<?php echo site_url("login/go"); ?>" method="post">
						<?php
						if($this->session->userdata("username") == "") {
						?>
						<p>
							<label>Username</label>
							<input type="text" name="username" />
						</p>
						<p>
							<label>Password</label>
							<input type="password" name="password" />
						</p>
						<p align="right">
							<input type="submit" value="Login" id="fix-font" />
						</p>
						<?php
						} else { ?>
							<h2>Hallo, <?php echo $this->session->userdata("nama"); ?>!</h2>
						<?php } ?>

					</form>
				</div>
			</div>

