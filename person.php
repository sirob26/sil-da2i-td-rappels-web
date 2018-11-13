<?php
    use Models\Person;

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
    $id = $_GET['person'];
    
    include 'Models\Person.php';
    $person = new Person();
    $thisPerson = $person->getBaseInfo($id);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    	<title><?php echo $thisPerson['lastname']?></title>
    	<link rel="stylesheet" type="text/css" href="style.css">
    	<meta charset="UTF-8">
    </head>
    <body>
    	<?php getBlock('header.php'); ?>
        <section id="info_general">
        	<h2><?php echo $thisPerson['lastname']." ".$thisPerson['firstname']?></h2>
        	<p>Metier : 
        	<?php 
        	   $reponse = $dbh->query('SELECT role FROM movieHasPerson WHERE idPerson = '.$thisPerson['id']);
               $data = $reponse->fetchAll();
               foreach ($data as $row) {
                   if ($row['role']="actor") {
                       echo "Acteur";
                   }
                   else {
                       echo "Réalisateur";
                   }
               }
            ?>
            </p>
        	<p>Naissance : <?php echo $thisPerson['birthDate']?></p>
        </section>
        <?php 
            $reponse = $dbh->query('SELECT * FROM Picture WHERE id IN (SELECT idPicture FROM personhaspicture WHERE idPerson = '.$thisPerson['id'].')');
            $data = $reponse->fetch();
        ?>
        <figure>
        	<img src="<?php echo $data['path']?>" alt="<?php echo $data['legend']?>">
        	<figcaption><?php echo $data['legend']?></figcaption>
        </figure>
        
        <section>
        	Biographie
        	<p><?php echo $thisPerson['biography']?>
        </section>
        <?php include 'footer.php';?>
	</body>
</html>