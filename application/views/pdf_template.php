<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Reservasi tiket KA Online</title>
		<link rel="stylesheet" href="<?php echo site_url("css/960.css"); ?>" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="<?php echo site_url("css/template.css"); ?>" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo site_url("css/colour.css"); ?>" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		<div id="foot">
			<div id=""><h2 id=""><img src="<?php echo site_url("css/itlogo1024.png"); ?>" id="logo-ka" height="30px"></img>Reservasi Tiket Kereta Api Online</h2></div>

			<div id="header-primary" style="text-align:center; width:80%;">
			------ <?php echo date("D, d-m-Y H:i:s");?> -----
			</div>
		
		<?php
			$harga_tiket = 0;
			foreach ($tiket as $key => $value) {
				$harga_tiket = $harga_tiket + $value->harga;
			}
		?>
			<table style="width:80%;">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th>Stasiun Asal</th>
						<th>Stasiun Tujuan</th>
						<th>Berangkat</th>
						<th>Sampai</th>
						<th>Harga Tiket</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $tiket[0]->tanggal_keberangkatan; ?></td>
						<td><?php echo $tiket[0]->nama_stasiun_asal; ?></td>
						<td><?php echo $tiket[0]->nama_stasiun_tujuan; ?></td>
						<td><?php echo $tiket[0]->jam_berangkat; ?></td>
						<td><?php echo $tiket[0]->jam_sampai; ?></td>
						<td>Rp <?php echo number_format($tiket[0]->harga, 2, ',', '.'); ?></td>
						<td>Rp <?php echo number_format($harga_tiket, 2, ',', '.'); ?></td>
					</tr>
				</tbody>
			</table>

			<form action="" method="post">
				<table style="width:80%;">
					<?php
						foreach ($tiket as $key => $value) {
					?>

					<tr>
						<td>
							<p>
								<label>Nama</label>
								<u><?php echo $value->nama_penumpang; ?></u>
							</p>
						</td>
						<td>
							<p>
								<label>Nomor Identitas</label>
								<u><?php echo $value->identitas; ?></u>
							</p>
						</td>
						<td>
							<p>
								<label>Kursi</label>
								<u><?php echo $value->nama_kursi; ?></u>
							</p>
						</td>
					</tr>
					<?php } ?> 
				</table>
			</form>
			<p><?php if ($value->id_user == 0) {
				echo "LUNAS";
			} else {
				echo "Saldo anda telah terpotong sebesar Rp ".number_format($harga_tiket, 2, ',', '.')." | Sisa saldo anda : Rp ".number_format($this->m_global->saldo($value->id_user), 2, ',', '.');
			}?></p>
		</div>
		<div id="foot">
					<a href="#">Copyright 2015 Namamu</a>
				
		</div>
	</body>
</html>