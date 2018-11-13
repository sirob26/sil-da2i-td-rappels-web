<?php 
function getDataBase(){
    $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
    $result = new PDO($dsn, 'root', '');
    return $result;
}
function getBlock($file, $data = [])
{
    
   
    require_once $file;
}
$dbh = getDataBase();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    	<title>Accueil</title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    	<meta charset="UTF-8">
    </head>
    <body>
    	<?php getBlock('header.php'); ?>
    	<h2>Films</h2>
    	<?php 
        	$reponse = $dbh->query('SELECT * FROM movie ');
        	$data = $reponse->fetchAll();
        	foreach ($data as $row){
        	    echo ("<a href=\"movie.php?movie=".$row['id']."\">".$row['title']."</a><br>");
        	}
    	?>
    	<h2>Réalisateurs</h2>
    	<?php 
        	$reponse = $dbh->query('SELECT * FROM person WHERE id  IN (SELECT idPerson FROM moviehasperson WHERE role="director")');
        	$person = $reponse->fetchAll();
        	foreach ($person as $row){
        	    echo ("<a href=\"person.php?person=".$row['id']."\">".$row['firstname']." ".$row['lastname']."</a><br>");
        	}
    	?>
    	<h2>Acteurs</h2>
    	<?php 
        	$reponse = $dbh->query('SELECT * FROM person WHERE id  IN (SELECT idPerson FROM moviehasperson WHERE role="actor")');
        	$data = $reponse->fetchAll();
        	foreach ($data as $row){
        	    echo ("<a href=\"person.php?person=".$row['id']."\">".$row['firstname']." ".$row['lastname']."</a><br>");
        	}
    	?>
    		
    
    	<?php getBlock('footer.php') ;?>
    </body>
</html>