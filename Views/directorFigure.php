<?php
foreach ($data as $row) {
    echo ("<figure>
            <a href=\"person.php?person=\"><img src=\"..\\". $row['path']."\" alt=\"Directeur : ".$row['legend']."\"></a>
            <figcaption>".$row['legend']."</figcaption>
        </figure>");
}
?>