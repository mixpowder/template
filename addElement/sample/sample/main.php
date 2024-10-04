<?php
namespace addElement\sample\sample;

use src\template\main\mainCore;
use src\template\commands\commandLoader;

class main extends mainCore{

    public function onEnable(){
        $this->getCommandLoader()->registerCommand("sample", "test", $this);
    }

    public function commandExcute($commandName, $args){
        $this->sendMessage("sucsess");
        var_dump($args);
        var_dump($commandName);
    }

}