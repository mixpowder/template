<?php
namespace src\template\main;

use src\template\commands\commandloader;

class main{

    public function __construct() {
        if(!file_exists('addElement')){
            mkdir("addElement");
        }
        (new \src\template\commands\command())->commandLoader();
    }
    
    /*public function commandregister($command){
        $this->command = $command;
        var_dump($this->command);
    }*/
    
    public function command($commandname){
        if(isset($this->command[$commandname])){
            echo 'aa'."\n";
        }else{
            echo 'bb'."\n";
        }
    }
}