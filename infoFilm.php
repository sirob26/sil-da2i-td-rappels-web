<article id="info_general">
    <div>
        <h2>Info général</h2>
        
        <ul>
            <li>Date de sortie : <time datetime="11-10-2017"><?php echo $data['releaseDate'];?></time></li>
        	<li>Note : <meter value="<?php echo $data['rating'];?>" min="0" max="5"> </meter></li>
        </ul>
        
	</div>
    
    <div>
        <h2>Synopsis</h2>
        
        <p>
            <?php echo $data['synopsis'];?>
        </p>
    </div>
</article>