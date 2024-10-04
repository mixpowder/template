<?php
namespace src\template\commands;

class helpCommand extends commandLoader{

    public function commandExcute($commandName, $args){
        $this->sendMessage("Command list:");
        foreach($this->getCommandAll() as $key => $value) {
            $this->sendMessage("Name: {$key} \nDescription: {$value['description']}");
        }
    }

}