<?php
    use Models\Movies;
    function getDataBase(){
        $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
        $result = new PDO($dsn, 'root', '');
        return $result;
    }
    function getBlock($file, $data = [])
    {        
        require_once $file;
    }
    include 'Models\Movies.php';
    
    $dbh = getDataBase();
    $id = $_GET['movie'];
    $movies = new Movies();
    $thisMovie = $movies->getBaseInfo($id);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
    	<title><?php echo $thisMovie['title']?></title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    	<meta charset="UTF-8">
    </head>
    <body>
    	
    	<?php getBlock('header.php'); ?>
    
    	<main>
    		<h1><?php echo $thisMovie['title']?></h1>
    		<section>
    			<?php 
        			getBlock('infoFilm.php',$thisMovie); 
        		?>
    			
    			<?php 
        			$reponse = $dbh->query('SELECT * FROM picture WHERE id IN(SELECT idPicture FROM movieHasPicture WHERE idMovie ='.$id.' )');
        			$data = $reponse->fetchAll();
    			    getBlock('imageFilm.php', $data);
    			     
    		    ?>
    		</section>
    
    		<aside id="real">
    			<h2>Réalisateur</h2>
    			<?php 
    			     $reponse = $dbh->query('SELECT * FROM Picture WHERE id IN (SELECT idPicture FROM personhaspicture WHERE idPerson in (SELECT idPerson FROM moviehasperson WHERE role="director" AND idMovie ='.$id.') )');
    			     $data = $reponse->fetch();
    			     getBlock('directorFigure.php', $data);
    		    ?>
    		</aside>
    
    		
    		<aside id="acteur">
    			<h2>Acteurs</h2>
    			<?php  
    			     $reponse = $dbh->query('SELECT * FROM Picture WHERE id IN (SELECT idPicture FROM personhaspicture WHERE idPerson in (SELECT idPerson FROM moviehasperson WHERE role="actor" AND idMovie ='.$id.') )');
    			     $data = $reponse->fetchAll();
    			     getBlock('actorsFigure.php', $data);
    			?>
    			
    		</aside>
    	</main>
    
    	<?php getBlock('footer.php') ;?>
    </body>
</html>