<?php

$host="127.0.0.1";
$username="root";
$password="";


try {
    $conn=new PDO("mysql:dbname=oop_new;host={$host}",$username,$password);


} catch (\Throwable $th) {
    throw $th;
}



$user="mehdi0121";
$name="mehdi";
$statment=$conn->prepare("select * from users where username= ?username and name=?name");
$statment->bindParam(':username',$user);
$statment->execute();


var_dump($statment->fetchAll(PDO::FETCH_OBJ));









// class User{

//     public $id;
//     public $name;
//     public $username;
//     public $email;
//     public $is_admin=false;
//     public $is_Active=false;
//     public $password;

//     public $user=
//     [
//     [
//         'id'=>1,
//         'name'=>'mehdi',
//         'username'=>'mehdi0121',
//         'email'=>'mehdi',
//         'is_admin'=>true,
//         'is_Active'=>true,
//         'password'=>"test"
//     ]
//     ];


//     public function find(int $id)
//     {
//         # code...
//         $user=array_filter($this->user,function ($item) use($id) {
//           return $item['id']==$id;
//         });
//         return $user;
//     }

//     public function save()
//     {
//         # code...
//         array_push($this->user,[
//         'id'=>$this->id,
//         'name'=>$this->name,
//         'username'=>$this->username,
//         'email'=>$this->email,
//         'is_admin'=>$this->is_admin,
//         'is_Active'=>$this->is_Active,
//         'password'=>$this->password,
//         ]);

//     }


// }
// $user=new User();

// var_dump($user->find(1));


// $user->id=2;
// $user->name="mehdi";
// $user->username="mehdi0121";
// $user->email="mehdi@gmail.com";
// // $user->is_admin=;
// // $user->is_Active=;
// $user->password="test";

// $user->save();

//     var_dump($user->user);
// ?>