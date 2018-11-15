<!DOCTYPE html>
<html lang="fr">
    <head>
    	<title>Accueil</title>
    	<link rel="stylesheet" type="text/css" href="Views/style.css">
    	<meta charset="UTF-8">
    </head>
    <body>
    	<?php getBlock('Views/header.php'); ?>
    	<h2>Films</h2>
    	<?php 
        	foreach ($data['Movies'] as $movie){
        	    echo ("<a href=\"movies\\".$movie['id']."\">".$movie['title']."</a><br>");
        	}
    	?>
    	<h2>Réalisateurs</h2>
    	<?php 
    	foreach ($data['Directors']  as $director){
        	    echo ("<a href=\"person.php?person=".$director['id']."\">".$director['firstname']." ".$director['lastname']."</a><br>");
        	}
    	?>
    	<h2>Acteurs</h2>
    	<?php 
    	foreach ($data['Actors']  as $actor){
        	    echo ("<a href=\"person.php?person=".$actor['id']."\">".$actor['firstname']." ".$actor['lastname']."</a><br>");
        	}
    	?>
    	<?php getBlock('Views/footer.php') ;?>
    </body>
</html>