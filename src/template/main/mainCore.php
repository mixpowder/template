<?php
namespace src\template\main;

use src\template\commands\commandLoader;

class mainCore{

    public function onLoad(){
        if(!file_exists('addElement')){
            mkdir("addElement");
        }
        (new commandLoader())->onLoad();
    }
    
    public function command(String $command){
        $tmp = explode(" ", $command);
        $commandName = $tmp[0];
        unset($tmp[0]);
        $args = array_values($tmp);
        if($this->getCommandLoader()->isExistsCommand($commandName)){
            $command = $this->getCommandLoader()->getCommand($commandName);
            if(method_exists($command, "commandExcute")){
                $command->commandExcute($commandName, $args);
            }
        }else{
            $this->sendMessage("That command is not found.");
        }
    }

    public static function getCommandLoader(){
        return commandLoader::getCommandLoaderInstance();
    }

    public function sendMessage($message){
        echo $message. "\n";
    }
}