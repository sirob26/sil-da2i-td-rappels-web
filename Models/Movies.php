<?php
namespace Models;

class Movies
{
    private function getDataBase(){
        $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
        $result = new PDO($dsn, 'root', '');
        return $result;
    }
    
    public function getAllMovies(){
        $reponse = getDataBase()->query('SELECT * FROM movie');
        $data = $reponse->fetchAll();
        return $data;
    }
    
    public function getBaseInfo(int $id){
        $reponse = getDataBase()->query('SELECT  * FROM movie WHERE id ='.$id);
        $data = $reponse->fetch();
        return $data;
    }
}

