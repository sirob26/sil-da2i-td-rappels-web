<?php 
    use Models\Movies;
    use Models\Director;
    use Models\Actor;
    
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
    include 'Models/Movies.php';
    include 'Models/Person.php';
    include 'Models/Actor.php';
    include 'Models/Director.php';
    $movies = new Movies();
    $directors = new Director();
    $actors = new Actor();
    $allMovies = $movies->getAllMovies();
    $allDirectors= $directors->getAllDirectors();
    $allActors = $actors->getAllActors();
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
        	foreach ($allMovies as $movie){
        	    echo ("<a href=\"movie.php?movie=".$movie['id']."\">".$movie['title']."</a><br>");
        	}
    	?>
    	<h2>Réalisateurs</h2>
    	<?php 
        	foreach ($allDirectors as $director){
        	    echo ("<a href=\"person.php?person=".$director['id']."\">".$director['firstname']." ".$director['lastname']."</a><br>");
        	}
    	?>
    	<h2>Acteurs</h2>
    	<?php 
        	foreach ($allActors as $actor){
        	    echo ("<a href=\"person.php?person=".$actor['id']."\">".$actor['firstname']." ".$actor['lastname']."</a><br>");
        	}
    	?>
    		
    
    	<?php getBlock('footer.php') ;?>
    </body>
</html>