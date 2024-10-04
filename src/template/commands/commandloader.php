<?php
namespace src\template\commands;

use src\template\main\mainCore;

class commandLoader extends mainCore{
    
    /** @var array */
    static public $command = [];

    static private $instance;
    
    public function onLoad(){
       if(empty(self::$instance))self::$instance = $this;
        foreach(array_diff(scandir("addElement"),[".",".."]) as $file1){
            if(file_exists("addElement\\".$file1."\\setting.yaml")){
                $config = yaml_parse(file_get_contents("addElement\\".$file1."\\setting.yaml"));
                $path = "addElement\\".$config["main"];
                echo("Enabling and Loading ". $config["name"]."\n");
                if(method_exists(new $path,"onEnable")){
                    (new $path)->onEnable();
                }
            }
        }
        $this->registerCommand("help", "help",new helpCommand());
    }
    
    public function registerCommand(String $command, $description, $class){
        self::$instance->command[$command]["class"] = $class;
        self::$instance->command[$command]["description"] = $description;
    }

    public function getCommand(String $commandName){
        return self::$instance->command[$commandName]["class"];
    }

    public function getCommandAll(){
        return self::$instance->command;
    }

    public function isExistsCommand(String $commandName){
        return (isset(self::$instance->command[$commandName]))? true : false;
    }

    public static function getCommandLoaderInstance(){
        return self::$instance;
    }
}