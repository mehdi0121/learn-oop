<?php

include "CustomeError.php";

$error=new CustomeError();


    if($_SERVER['REQUEST_METHOD']=="POST"){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];



        if(trim($name)=='')
            $error->set('name','فیلد نام خالی است');
        if(trim($username)=='')
            $error->set('username','فیلد نام کاربری خالی است');
        if(trim($email)=='')
            $error->set('email','فیلد ایمیل خالی است');
        if(trim($password)=='')
            $error->set('password','فیلد پسورد خالی است');


            if($error->count()<=0){

                try {
                    $conn=new Pdo("mysql:host=localhost;dbname=oop_new","root","");
                } catch (\Throwable $e) {
                    throw $e;
                }
                $password=md5($_POST['password']);
                $CreateNewUserST=$conn->prepare("INSERT INTO users (name,username,email,password) values (:name,:username,:email,:password)");
                $CreateNewUserST->execute(compact('name','username','email','password'));
                if($CreateNewUserST->execute()){
                    echo "You have been successfuly registerd in our site now pleas login";
                    header("location:./login.php");
                    die();
                }

            }









        // $findeIfExistsST=$conn->prepare('SELECT * from users WHERE email=:email or username=:username');
        // $findeIfExistsST->bindParam(':username',$username);
        // $findeIfExistsST->bindParam(':email',$email);
        // $findeIfExistsST->execute();

        // if(!empty($findeIfExistsST->fetchAll())){
        //    echo "username or email exists";
        //    die();
        // }



    }



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class=" bg-gray-700">
<div class="container mx-auto space-y-4">
    <div class="sm:mx-auto sm:w-full sm:max-w-md mt-10">
        <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-white">
            Register your account
        </h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Name
                    </label>
                    <div class="mt-1">
                        <input id="name" name="name" type="text" autocomplete="name"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($error->has('name')): ?>
                            <span class="text-red-500 text-sm"><?= $error->first('name') ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <div class="mt-1">
                        <input id="username" name="username" type="text" autocomplete="username"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($error->has('username')): ?>
                            <span class="text-red-500 text-sm"><?= $error->first('username') ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email address
                    </label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($error->has('email')): ?>
                            <span class="text-red-500 text-sm"><?= $error->first('email') ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password"  class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php if($error->has('password')): ?>
                            <span class="text-red-500 text-sm"><?= $error->first('password') ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Register
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
</body>
</html>