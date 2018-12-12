<?php
    foreach ($data as $row) {
        echo ("
            <figure>
                <a href=\"person.php?person=\"><img src=\"..\\". $row['path']."\" alt=\"Acteur : ".$row['legend']."\"></a>
                <figcaption>".$row['legend']."</figcaption>
            </figure>
        ");
    }
?>