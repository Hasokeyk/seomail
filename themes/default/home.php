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
	<link rel="stylesheet" href="<?=TEMAYOLU?>assets/css/style.css" />

	<!--JS-->
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?=TEMAYOLU?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=TEMAYOLU?>assets/js/script.js"></script>

</head>
<body>
	
	<header class="ust-kisim pt-3 pb-3">
		<center>SEO MAİL</center>
	</header>

	<section class="sidebar">
		<ul>
			<li>
				<strong><i class="fas fa-envelope"></i> Mailing</strong>
				<ul>
					<li><a href="#">Yollanan Mailler</a></li>
					<li><a href="#">Yeni Mail Yolla</a></li>
				</ul>
			</li>
			<li>
				<strong><i class="fas fa-file-image"></i> Mail Şablonları</strong>
				<ul>
					<li><a href="#">Şablonlar</a></li>
					<li><a href="#">Yeni Şablon</a></li>
				</ul>
			</li>
			<li>
				<strong><i class="fas fa-users"></i> Mail Listesi</strong>
				<ul>
					<li><a href="#">Tüm Liste</a></li>
					<li><a href="#">Yeni Liste Ekle</a></li>
				</ul>
			</li>
			<li>
				<strong><i class="fas fa-retweet"></i> Otomatik Mailing</strong>
				<ul>
					<li><a href="#">Tüm Liste</a></li>
					<li><a href="#">Yeni Oto. Mailing</a></li>
				</ul>
			</li>
			<li>
				<strong><i class="fas fa-cog"></i> Ayarlar</strong>
				<ul>
					<li><a href="#">SMTP Ayarları</a></li>
					<li><a href="#">Üyeler</a></li>
					<li><a href="#">Üye Ekle</a></li>
				</ul>
			</li>
		</ul>
	</section>

</body>
</html>