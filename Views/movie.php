<!DOCTYPE html>
<html lang="fr">
    <head>
    	<title><?php echo $data['movie']['title']?></title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    	<meta charset="UTF-8">
    </head>
    <body>
    	
    	<?php getBlock('header.php'); ?>
    
    	<main>
    		<h1><?php echo $data['movie']['title']?></h1>
    		<section>
    			<?php 
    			     getBlock('infoFilm.php',$data['movie']); 
        		?>
    			
    			<?php 
    			    getBlock('imageFilm.php', $data['picture']);
    		    ?>
    		</section>
    
    		<aside id="real">
    			<h2>Réalisateur</h2>
    			<?php 
    			     getBlock('directorFigure.php', $data['director']);
    		    ?>
    		</aside>
    
    		
    		<aside id="acteur">
    			<h2>Acteurs</h2>
    			<?php  
    			     getBlock('actorsFigure.php', $data['actors']);
    			?>
    			
    		</aside>
    	</main>
    
    	<?php getBlock('footer.php') ;?>
    </body>
</html>