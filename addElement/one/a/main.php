<?php
namespace addElement\one\a;

use src\template\main\mainCore;
use src\template\commands\commandLoader;

class main extends mainCore{

    public function onEnable(){
        $this->sendMessage("aaaaaaaaaaaaaaaaaaaaaaaaaaaa ");
        $this->getCommandLoader()->registerCommand("a", "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaas", $this);
    }

    public function commandExcute($commandName, $args){
        $this->sendMessage("sucsess");
        var_dump($args);
        var_dump($commandName);
    }

}