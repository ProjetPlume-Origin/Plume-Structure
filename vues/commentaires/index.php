<pre>
	<?php 
	//print_r($data) 
	// sContenuCommentaire 	sDateCommentaire Descending 1 	sTitreOuvrage 	idParagraphe 
	?>
</pre>

<div>
	<h2>All Comments</h2>
	
	<table border="1" cellpadding="1" cellspacing="0">
		<tr>
			<th>sContenuCommentaire</th>
			<th>sDateCommentaire</th>
			<th>sTitreOuvrage</th>
			<th>idParagraphe</th>
			<th> - Act / Des - </th>
		</tr>
	
		<?php
		foreach ($data as $row) {
				
			$cid = $row['idCommentaire'];
			
			$status   = 0;
			$textLink = "Activer";
			
			if ($row['active'] == 0) {
				$status   = 1;
				$textLink = "Desactiver";
			}
			
			
		?>
			<tr>
				<td><?php echo $row['sContenuCommentaire'] ?></td>
				<td><?php echo $row['sDateCommentaire'] ?></td>
				<td><?php echo $row['sTitreOuvrage'] ?></td>
				<td><?php echo $row['idParagraphe'] ?></td>
				<td>
					<?php 
					echo "<a href='index.php?s=7&cid=$cid&st=$status'>$textLink</a>";
					?>
				</td>
			</tr>
		<?php
		}
		?>
		
	</table>
</div>