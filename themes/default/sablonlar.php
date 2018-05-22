<?php 
	global $mysqli;
	require "header.php";
?> 
<section>
	
	<div class="page-title mt-3 mb-4">
		<h5 class="card-title">Tüm Şablonlar</h5>
	</div>

	<table class="table">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Başlık</th>
		  <th scope="col">Detay</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$sablonlar = $mysqli->query("SELECT * FROM sablonlar");
			if($sablonlar->num_rows > 0){
				while($s = $sablonlar->fetch_assoc()){
		?>
			<tr>
			  <th scope="row"><?=$s['id']?></th>
			  <td><?=$s['title']?></td>
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