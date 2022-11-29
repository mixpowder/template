<?php
namespace src\template;
use src\template\main\main;

spl_autoload_register(function($name){
    $name = str_replace("\\",'/',$name);
    require $name . '.php';
});


$main = new main();
while(true){
    $stdin = trim(fgets(STDIN));
    if(!empty($stdin)){
        $main->command($stdin);
    }
    
}