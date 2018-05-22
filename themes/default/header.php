<!DOCTYPE HTML>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8">

	<!--SEO-->
	<title><?=!isset($title)?'Başlık Yok':$title?></title>
	<link rel="shortcut icon" href="resimler/favicon.ico" type="image/x-icon" />

	<!--CSS-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=TEMAYOLU?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=TEMAYOLU?>assets/css/fontawesome-all.min.css" />
	<link rel="stylesheet" href="<?=TEMAYOLU?>assets/css/datatables.min.css" />
	<link rel="stylesheet" href="<?=TEMAYOLU?>assets/css/style.css" />

	<!--JS-->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?=TEMAYOLU?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=TEMAYOLU?>assets/js/datatables.min.js"></script>
	<script type="text/javascript" src="<?=TEMAYOLU?>assets/js/script.js"></script>

</head>
<body>
	
	<header class="ust-kisim pt-3 pb-3">
		<center><a href="/">SEO MAİL</a></center>
	</header>
	
	<!--CONTAİNER-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2">
				<?php
					require "sidebar.php";
				?>
			</div>
			<div class="col-lg-10">