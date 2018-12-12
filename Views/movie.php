<!DOCTYPE html>
<html lang="fr">
    <head>
    	<title><?php echo $data['movie']['title']?></title>
    	<?php getBlock('Views/head.php'); ?>
    </head>
    <body>
    	
    	<?php getBlock('Views/header.php'); ?>
    
    	<main>
    		<h1><?php echo $data['movie']['title']?></h1>
    		<section>
    			<?php 
    			     getBlock('Views/infoFilm.php',$data['movie']); 
        		?>
    			
    			<?php 
    			    getBlock('Views/imageFilm.php', $data['picture']);
    		    ?>
    		</section>
    
    		<aside id="real">
    			<h2>Réalisateur</h2>
    			<?php
    			     getBlock('Views/directorFigure.php', $data['director']);
    		    ?>
    		</aside>
    
    		
    		<aside id="acteur">
    			<h2>Acteurs</h2>
    			<?php  
    			     getBlock('Views/actorsFigure.php', $data['actors']);
    			?>
    			
    		</aside>
    	</main>
    
    	<?php getBlock('Views/footer.php') ;?>
    </body>
</html>