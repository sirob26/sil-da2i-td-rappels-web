<?php

class MovieController
{
    static function go(int $id){
        require 'Models\Movies.php';
        
        $id = $_GET['id'];
        $movies = new Movies();
        
        $thisMovie = [];
        $thisMovie['movie'] = $movies->getBaseInfo($id);
        $thisMovie['picture'] = $movies->getImg($id);
        $thisMovie['director'] = $movies->getDirector($id);
        $thisMovie['actors'] = $movies->getActors($id);
        
        getBlock('Views\movie.php', $thisMovie);
    }
}

