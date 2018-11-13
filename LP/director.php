<?php 
function getBlock($file, $data = [])
{
    require $file;
}

function getDataBase(){
    $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
    $result = new PDO($dsn, 'root', '');
    return $result;
}

$dbh = getDataBase();
?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Matthew Vaughn</title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <?php getBlock('header.php'); ?>
    	<main>
    	<h1>Matthew Vaughn</h1>
    		
    	</main>
    	<article>
    		<h2>Ses acteurs favoris</h2>
    		<p>
    			<?php 
    			     $reponse = $dbh->query('SELECT * FROM picture WHERE id IN(SELECT idPicture FROM personHasPicture WHERE idPerson = 2)');
                     $person = $reponse->fetch();
               
    			echo ("<figure>
                	<img src=\"". $person['path']."\" alt=\"Acteur : ".$person['legend']."\">
                	<figcaption>".$person['legend']."</figcaption>
                </figure>");
    			
    			$reponse = $dbh->query('SELECT * FROM picture WHERE id IN(SELECT idPicture FROM personHasPicture WHERE idPerson = 3)');
    			$person = $reponse->fetch();
    			
    			echo ("<figure>
                	<img src=\"". $person['path']."\" alt=\"Acteur : ".$person['legend']."\">
                	<figcaption>".$person['legend']."</figcaption>
                </figure>");
    			?>
            </p>
    		<p>Acteur deux</p>
    	</article>
    <?php include 'footer.php';?>
    </body>
</html>