<?php 
	global $mysqli;
	require "header.php";
?> 
<section>
	
	<div class="page-title mt-3 mb-4">
		<h5 class="card-title">Tüm Mail Listesi</h5>
	</div>

	<table class="table">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Başlık</th>
		  <th scope="col">Kişi Sayısı</th>
		  <th scope="col">Detay</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$mailListesi = $mysqli->query("SELECT *,COUNT(A.id) AS TOPLAM FROM mailListesi AS M, aboneler AS A WHERE M.id = A.listID GROUP BY M.id");
			if($mailListesi->num_rows > 0){
				while($s = $mailListesi->fetch_assoc()){
		?>
			<tr>
			  <th scope="row"><?=$s['id']?></th>
			  <td><?=$s['baslik']?></td>
			  <td><?=$s['TOPLAM']?></td>
			  <td>
				<a href="#" class="btn btn-success">DETAY</a>
			  </td>
			</tr>
		<?php
				}
			}
		?>
	  </tbody>
	</table>
</section>
<?php 
	require "footer.php";
?>