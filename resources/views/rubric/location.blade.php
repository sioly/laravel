@extends('layouts.app')

@section('content')

		

<?php
	if(Auth::check()){
		?>
		<div id="write"><a onclick="show('form')">Rédiger un article</a></div>
		<?php
	}
?>
<?php
	?><div id="articlelocation"><?php
		$article = DB::table('location')->paginate(18);
		foreach ($article as $a)
		{
			if($a->file != ""){
				echo '<div class="article col-md-4">'.'<img src="../upload/'.$a->file.'">'.'<a href="adlocation/'.$a->id.'">'.$a->title.'</a>'.'</div>';
			}else{
				echo '<div class="article col-md-4">'.'<img src="../upload/notimg.png">'.'<a href="adlocation/'.$a->id.'">'.$a->title.'</a>'.'</div>';
			}
		}
		echo $article->links();
	?></div><?php
?>

<div id="form" class="form">
	{{Form::open(array('url' => '/getlocation', 'files'=>true))}}
		<img src="../upload/close.png" alt="close" onclick="hide('form')"/>
		<label for="title">Titre</label><input type="text" name="title" placeholder="Entre 2 et 50 caractères" required pattern="[a-zA-Z èéçàù]{2,50}" onkeyup="veriftitle(this);"/><div id="titlerror"></div><br/>
		<label for="content">Description</label><textarea name="content" placeholder="Entre 10 et 1000 caractères" required pattern="[a-zA-Z0-9 èéçàù.;:?!-,@]{10,1000}" onkeyup="verifcontent(this);"></textarea><div id="contenterror"></div><br/>
		<label for="price">Prix</label><input type="text" name="price" required pattern="[0-9]+" onkeyup="verifprice(this);"/>
		<label for="time">Durée</label><select required="required" name="time" class="prix"><option value="/jours">Journalier</option><option value="/semaines">Hebdomadaire</option><option value="/mois">Mensuel</option><option value="/ans">Annuel</option></select><div id="priceoerror"></div><br/>
		<label for="reg">Régions</label>
		<select id="reg" name="reg" onchange="request(this);">
		<option value="none">Selection</option>
		<?php	
			try 
			{
			    $bdd = new PDO('mysql:host=localhost;dbname=laravel;charset=UTF8', 'root', '');
			}
			catch(Exception $e)
			{
			    die('Erreur : '.$e->getMessage());
			}

			$query = $bdd->query("SELECT * FROM regions ORDER BY nom");

			while ($back =$query->fetch()) {

				echo "\t\t\t\t<option value=\"" . $back["num_region"] . "\">" . $back["nom"] . "</option>\n";
			}
		?>		
		</select>
		<label for="dep">Département</label><select name="dep" required="true" id="dep"></select>
		<label for="category">Catégorie</label><select name="cat"><option value="animalerie">Animalerie</option><option value="auto">Auto, moto</option><option value="beaute">Beauté, parfums</option><option value="bebe">Bébé, puériculture</option><option value="bijoux">Bijoux, montres</option><option value="bricolage">Bricolage</option><option value="cd">CD, vinyles</option><option value="dvd">DVD, cinéma</option><option value="electromenager">Electroménager</option><option value="hight">Hight-tech</option><option value="immobilier">Immobilier</option><option value="informatique">Informatique</option><option value="instrument">Instruments de musique</option><option value="jardin">Jardin</option><option value="jeux">Jeux, jouets</option><option value="jeuxv">Jeux vidéo, consoles</option><option value="livre">Livre</option><option value="logiciel">Logiciel</option><option value="luminaire">Luminaires et éclairage</option><option value="sport">Sport et loisirs</option><option value="telephonie">Téléphonie, mobilité</option><option value="timbre">Timbres</option><option value="vetement">Vêtements, accessoires</option><option value="vin">Vin, gastronomie</option></select>
		<label>Choisissez un fichier</label><input type="file" name="file" />

		<input class="submit" type="submit" id="submit" onclick='go()' name="submit"/>
	{{Form::close()}}
</div>

@endsection