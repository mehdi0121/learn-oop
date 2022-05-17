<?php


class DB{

    protected $pdo="";
    public $table;
    public function __construct(){

        try {
            $this->pdo=new Pdo("mysql:host=localhost;dbname=oop_new","root","");
        } catch (\Throwable $th) {
            throw $th;
        }

    }


    public function create($data)
    {
        # code...
        $names=join(',',array_keys($data));
        $values=':'.join(',:',array_keys($data));
        $statement=$this->pdo->prepare("INSERT INTO $this->table ($names) values ($values)");
        return $statement->execute($data);

    }








}