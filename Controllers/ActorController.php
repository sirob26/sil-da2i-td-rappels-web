<?php

class ActorController
{
    static function go(int $id){
        require 'Models\Actor.php';
        
        $actor = new Actor();
        
        $thisActor = [];
        $thisActor['movie'] = $movies->getBaseInfo($id);
        $thisActor['picture'] = $movies->getImg($id);
        $thisActor['director'] = $movies->getDirector($id);
        $thisActor['actors'] = $movies->getActors($id);
        
        getBlock('Views\movie.php', $thisActor);
    }
}

