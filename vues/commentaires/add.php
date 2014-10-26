<h2>Example Comment</h2>
<form method="post" action="index.php?s=5">
	
	<div>
		<label for="sContenuCommentaire">Add Comment</label>
		<textarea name="sContenuCommentaire"></textarea>
	</div>
	<!--Estas dos vars deben ser tomadas del parrafo
		y de la session respectivamente		
	-->
	<input name="idUtilisateur" value="2" type='text'>
	
	<input name="idParagraphe" value="12" type='text'>
	
	<input type="submit" value="Save">
</form>