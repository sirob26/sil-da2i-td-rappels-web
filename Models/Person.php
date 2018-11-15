<?php

class Person
{
    public function getBaseInfo(int $id){
        $reponse = $this->getDataBase()->query('SELECT  * FROM person WHERE id ='.$id);
        $data = $reponse->fetch();
        return $data;
    }
}

