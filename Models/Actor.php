<?php
namespace Models;

class Actor extends Person
{
    private function getDataBase(){
        $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
        $result = new PDO($dsn, 'root', '');
        return $result;
    }
    
    public function getAllActors(){
        $reponse = getDataBase()->query('SELECT  * FROM person WHERE id IN (SELECT DISTINCT idPerson FROM moviehasperson WHERE role = "actor")');
        $data = $reponse->fetchAll();
        return $data;
    }
}

