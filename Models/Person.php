<?php
namespace Models;

class Person
{
    public function getBaseInfo(int $id){
        $reponse = getDataBase()->query('SELECT  * FROM person WHERE id ='.$id);
        $data = $reponse->fetch();
        return $data;
    }
}

