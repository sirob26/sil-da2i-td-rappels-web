<?php

class DB
{
    private $request;
    private $pdo;
    
    private function connect(){
        $dsn = 'mysql:host=localhost;dbname=LP_dev;charset=utf8';
        $this->pdo = new PDO($dsn, 'root', '');
    }
    
    private function prepare(String $request, array $array){
        $bind = $this->pdo->prepare($request);
        $i = 0;
        foreach ($array as $line) {
            $i+=1;
            $bind->bindValue($i, $line);
        }
        $bind->execute();
        return $bind;
    }
    
    private function my_query($request){
        return $this->pdo->query($request);
    }
    
    
    public function getOne(string $table, int $id) {
        $this->connect();
        $array = array($id);
        $result = $this->prepare('SELECT * FROM '.$table. ' WHERE id=?', $array);
        $data = $result->fetch();
        return $data;
    }
    
    public function getAll(String $table){
        $this->connect();
        $result = $this->my_query('SELECT * FROM '.$table);
        $data = $result->fetchAll();
        return $data;
    }
    
    public function getImgFrom(string $table, int $id){
        $this->connect();
        $array = array($id);
        $result = $this->prepare('SELECT * FROM picture WHERE id IN(SELECT idPicture FROM '.$table.' WHERE idMovie =?)', $array);
        $data = $result->fetchAll();
        return $data;
    }
    
    public function getPersonFromMovie(string $role, int $id){
        $this->connect();
        $array = array($role, $id);
        $result = $this->prepare('SELECT * FROM picture WHERE id IN (SELECT idPicture FROM personhaspicture WHERE idPerson in (SELECT idPerson FROM moviehasperson WHERE role=? AND idMovie=?))', $array);

        $data = $result->fetchAll();
        return $data;
    }
}

