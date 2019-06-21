<?php



function auto_loader($class_name){
    foreach(glob(__DIR__.'/*',GLOB_ONLYDIR) as $dir){
        if(file_exists("$dir/".$class_name.".php")){
            require_once "$dir/".$class_name.".php";
            break;
        }
    }
}

spl_autoload_register('auto_loader');


$db = new MySQLDB('mysql:host=localhost;dbname=sakila','root','');


$movieService = new MovieRepository($db);

$userService = new UserRepository($db);

$userRegister = new UserRegister($userService,$db);
