<?php
foreach ($data as $row) {
    echo ("<figure>
    	<a href=\"person.php?person=\"></a><img src=\"..\\". $row['path']."\" alt=\"Acteur : ".$row['legend']."\">
    	<figcaption>".$row['legend']."</figcaption>
    </figure>");
    
}

?>