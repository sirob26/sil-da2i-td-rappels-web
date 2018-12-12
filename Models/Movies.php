<?php

class Movies
{
    
    private $db;
    function __construct(){
        require 'Classes\DB.php';
        $this->db = new DB();
    }
    
    public function getAllMovies(){
        return $this->db->getAll("movie");
    }
    
    public function getBaseInfo(int $id){
        return $this->db->getOne("movie", $id);
    }
    
    public function getImg(int $id){
        return $this->db->getImgFrom("moviehaspicture", $id);
    }
    
    public function getDirector(int $id){
        return $this->db->getPersonFromMovie("director", $id);
       
    }
    
    public function getActors(int $id) {
        return $this->db->getPersonFromMovie("actor", $id);
    }
    
}

