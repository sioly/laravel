<?php
header("Content-Type: text/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo "<list>";

$loc = (isset($_POST["localisation"])) ? htmlentities($_POST["localisation"]) : NULL;

if ($loc) {
try 
{
    $bdd = new PDO('mysql:host=localhost;dbname=laravel;charset=UTF8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
	
	$query = $bdd->query("SELECT * FROM departements WHERE num_region=" . mysql_real_escape_string($loc) . " ORDER BY nom");
	while ($back = $query->fetch()) {
		echo '<item id=\''. $back['nom'] . '\' name=\'' . $back['nom'] . '\' />';
	}
}

echo "</list>";

?>