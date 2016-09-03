
<?php
 try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=laravel', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
			$article = $bdd->query("SELECT * FROM sale where price=''");
			while ($a = $article->fetch())
			{
				if($a['file'] != ""){
					echo '<div class="article col-md-4">'.'<img src="../upload/'.$a['file'].'">'.'<a href="adgift/'.$a['id'].'">'.$a['title'].'</a>'.'</div>';
				}else{
					echo '<div class="article col-md-4">'.'<img src="../upload/notimg.png">'.'<a href="adgift/'.$a['id'].'">'.$a['title'].'</a>'.'</div>';
				}
			}
?>