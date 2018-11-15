<article class="not_phone">
    <h2>Images du films</h2>
    <?php 
        foreach ($data as $row) {
            echo ("<figure>
            	<img src=\"". $row['path']."\" alt=\"".$row['legend']."\">
            	<figcaption>".$row['legend']."</figcaption>
                 </figure>");
        }
    ?>
</article>