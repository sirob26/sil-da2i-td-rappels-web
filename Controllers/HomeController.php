<?php

class HomeController
{
    public static function go(){
        require 'Models/Movies.php';
        require 'Models/Person.php';
        require 'Models/Actor.php';
        require 'Models/Director.php';
        
        $movieObject = new Movies();
        $directorObject = new Director();
        $actorObject = new Actor();
        
        $allMovies = $movieObject->getAllMovies();
        $allDirectors= $directorObject->getAllDirectors();
        $allActors = $actorObject->getAllActors();
        
        $return = [];
        $return['Actors'] = $allActors;
        $return['Directors' ] = $allDirectors;
        $return['Movies'] = $allMovies;
        
        getBlock('Views\home.php', $return);
    }
}

