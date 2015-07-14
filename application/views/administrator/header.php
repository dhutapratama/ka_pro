<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Administrator</title>
		<link rel="stylesheet" href="<?php echo site_url("css/960.css"); ?>" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="<?php echo site_url("css/template.css"); ?>" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo site_url("css/colour.css"); ?>" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		
		<div id="header-secondary"><h2 id="head"><img src="<?php echo site_url("css/itlogo1024.png"); ?>" id="logo-ka" height="30px">ADMINISTRATOR</h2></div>

		<div id="header-primary"> 
			<ul id="navigation">
				<?php
				if($this->session->userdata("admin") == false)
				{ ?>
					<li>INFO : Harap melakukan login sebelum masuk sistem administrasi.</li>
				<?php } else { ?>
					<li><a href="<?php echo site_url("administrator/tiket"); ?>">Harga Tiket &amp; Stasiun</a></li>
					<li><a href="<?php echo site_url("administrator/isi_saldo"); ?>">Isi Saldo Member</a></li>
					<li><a href="<?php echo site_url("administrator/members"); ?>">Members</a></li>
					<li><a href="<?php echo site_url("administrator/admins"); ?>">User Administrator</a></li>
					<li><a href="<?php echo site_url("administrator/pending"); ?>">Tiket Tertunda</a></li>
					<li><a href="<?php echo site_url("administrator/report"); ?>">Report</a></li>
					<li><a href="<?php echo site_url("administrator/rekening"); ?>">Rekening</a></li>
					<li><a href="<?php echo site_url("administrator/do_logout"); ?>">Logout</a></li>
					<li style="float:right; color: #fff; font-size:20px;"><?php echo $this->session->userdata("username") ?></li>
				<?php } ?>
			</ul>
		</div>