<?php
namespace src\template\commands;

class command{
    public $command = [];
    
    
    public function registerCommand($class, $name, $description){
        $command[$name] = [$class, $name, $description];
    }
    
    public function commandLoader(){
        new commandloader();
    }
}