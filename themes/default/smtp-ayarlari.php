<?php 
	global $mysqli;
	
	//DB KAYIT
	$z = ['sunucu','sunucuport','kullaniciadi','parola'];
	if($this->postKontrol($z)){
		
		foreach($post as $p => $d){
			$mysqli->query("UPDATE ayarlar SET val = '".$d."' WHERE var = '".$p."'");
		}
		
	}
	//DB KAYIT
	
	//BİLGİ
	$bilgi = $mysqli->query("SELECT * FROM ayarlar WHERE var = 'sunucu' OR var = 'port' OR var = 'kullanici' OR var = 'parola'");
	$i = [];
	while($b = $bilgi->fetch_assoc()){
		$i[$b['var']] = $b['val'];
	}
	$sunucu 	= $i['sunucu'];
	$post	 	= $i['port'];
	$kullanici 	= $i['kullanici'];
	$parola 	= $i['parola'];
	//BİLGİ
	require "header.php";
?> 
<section>
	
	<div class="page-title mt-3 mb-4">
		<h5 class="card-title">SMTP AYARLARI</h5>
	</div>
	
	<form action="" method="post">
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="sunucu">Sunucu</label>
					<input type="text" class="form-control" name="sunucu" id="sunucu" aria-describedby="sunucu" placeholder="ÖR: mail.hayatikodla.net" value="<?=$sunucu?>">
					<small id="emailHelp" class="form-text text-muted">SMTP Sunucu domain veya IP'si</small>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="port">Sunucu Port</label>
					<input type="text" class="form-control" name="port" id="port" aria-describedby="port" placeholder="ÖR: 587" value="<?=$port?>">
					<small id="emailHelp" class="form-text text-muted">SMTP Sunucu Port</small>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="kullanici">Kullanıcı Adı</label>
					<input type="text" class="form-control" name="kullanici" id="kullanici" aria-describedby="kullanici" placeholder="ÖR: info@hayatikodla.net" value="<?=$kullanici?>">
					<small id="emailHelp" class="form-text text-muted">SMTP Kullanıcı veya Maili</small>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="parola">Parola</label>
					<input type="text" class="form-control" name="parola" id="parola" aria-describedby="parola" placeholder="ÖR: 123456789" value="<?=$parola?>">
					<small id="emailHelp" class="form-text text-muted">SMTP Kullanıcı Parolası</small>
				</div>
			</div>
		</div>
		<button type="submit" class="btn btn-primary">Kayıt Et</button>
	</form>

	
</section>
<?php 
	require "footer.php";
?>