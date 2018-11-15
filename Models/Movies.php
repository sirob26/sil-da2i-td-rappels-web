<?php

class Movies
{
    private function getDataBase(){
        $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
        $result = new PDO($dsn, 'root', '');
        return $result;
    }
    
    public function getAllMovies(){
        $reponse = $this->getDataBase()->query('SELECT * FROM movie');
        $data = $reponse->fetchAll();
        return $data;
    }
    
    public function getBaseInfo(int $id){
        $reponse = $this->getDataBase()->query('SELECT  * FROM movie WHERE id ='.$id);
        $data = $reponse->fetch();
        return $data;
    }
    
    public function getImg(int $id){
        $reponse = $this->getDataBase()->query('SELECT * FROM picture WHERE id IN(SELECT idPicture FROM movieHasPicture WHERE idMovie ='.$id.' )');
        $data = $reponse->fetchAll();
        return $data;
    }
    
    public function getDirector(int $id){
        $reponse = $this->getDataBase()->query('SELECT * FROM Picture WHERE id IN (SELECT idPicture FROM personhaspicture WHERE idPerson in (SELECT idPerson FROM moviehasperson WHERE role="director" AND idMovie ='.$id.') )');
        $data = $reponse->fetch();
        return $data;
    }
    
    public function getActors($id) {
        $reponse = $this->getDataBase()->query('SELECT * FROM Picture WHERE id IN (SELECT idPicture FROM personhaspicture WHERE idPerson in (SELECT idPerson FROM moviehasperson WHERE role="actor" AND idMovie ='.$id.') )');
        $data = $reponse->fetchAll();
        return $data;
    }
    
}

