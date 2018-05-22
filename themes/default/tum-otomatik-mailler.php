<?php 
	global $mysqli;
	require "header.php";
?> 
<section>
	
	<div class="page-title mt-3 mb-4">
		<h5 class="card-title">Tüm Yollanan Mailler</h5>
	</div>

	<table class="table">
	  <thead class="thead-dark">
		<tr>
		  <th scope="col">#</th>
		  <th scope="col">Başlık</th>
		  <th scope="col">Kısa Açıklama</th>
		  <th scope="col">Detay</th>
		</tr>
	  </thead>
	  <tbody>
		<?php 
			$sent = $mysqli->query("SELECT * FROM mailler WHERE tur='oto'");
			if($sent->num_rows > 0){
				while($s = $sent->fetch_assoc()){
		?>
			<tr>
			  <th scope="row"><?=$s['id']?></th>
			  <td><?=$s['title']?></td>
			  <td><?=$s['shortTitle']?></td>
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