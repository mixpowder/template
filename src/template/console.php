<?php
namespace src\template;

use src\template\main\mainCore;

spl_autoload_register(function($name){
    $name = str_replace("\\",'/',$name);
    require $name . '.php';
});


$main = new mainCore();
$main->onLoad();
while(true){
    $stdin = trim(fgets(STDIN));
    if(!empty($stdin)){
        $main->command($stdin);
    }
    
}