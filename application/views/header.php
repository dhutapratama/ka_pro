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
		
		<div id="header-secondary"><h2 id="head"><img src="<?php echo site_url("css/itlogo1024.png"); ?>" id="logo-ka" height="30px"></img>Reservasi Tiket Kereta Api Online</h2></div>

		<div id="header-primary"> 
			<ul id="navigation">
				<li><a href="<?php echo site_url(""); ?>">Pesan Tiket</a></li>
				<?php
				if($this->session->userdata("nama") == "")
				{ ?>
				<li><a href="<?php echo site_url("login"); ?>">Login</a></li>
				<li><a href="<?php echo site_url("registrasi"); ?>">Registrasi</a></li>
				<?php } else { ?>
					<li><a href="<?php echo site_url("member/transaksi"); ?>">Histori Transaksi</a></li>
					<li><a href="<?php echo site_url("login/do_logout"); ?>">Logout</a></li>
					<li style="float:right; color: #fff; font-size:20px;">Saldo anda : Rp <?php echo $this->m_global->saldo(); ?></li>
				<?php } ?>
			</ul>
		</div>