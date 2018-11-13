<?php 
function getBlock($file, $data = [])
{
    require $file;
}
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
    		<?php getBlock('matthewVaughn.php'); ?>
    		
    		<?php getBlock('matthewVaughnFilmographie.php'); ?>
    
    	</main>
    <?php include 'footer.php';?>
    </body>
</html>