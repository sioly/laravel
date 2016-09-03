
<?php
 try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=mastermarketing', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
			$article = $bdd->query("SELECT * FROM location");
			while ($donnees = $article->fetch())
			{
				if($donnees['file'] != ""){
					echo '<div class="picture">'.'<img src="../public/upload/'.$donnees['file'], '"<br/><a href="">'.$donnees['title'].'</a></div>';
				}else{
					echo '<div class="picture">'.'<img src="../public/images/notimg.png', '"<br/><a href="">'.$donnees['title'].'</a></div>';
				}
			}
?>