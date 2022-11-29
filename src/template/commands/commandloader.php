<?php
namespace src\template\commands;

use src\template\main\main;

class commandloader extends main{
    
    /** @var array */
    public $command = [];
    
    public function __construct() {
        foreach(array_diff(scandir("./addElement"),[".",".."]) as $file1){
            if(file_exists("./addElement/".$file1."/setting.yaml")){
                $config = yaml_parse(file_get_contents("./addElement/".$file1."/setting.yaml"));
                $path = "\\addElement\\".$config["main"];
                echo("Enabling and Loading ". $config["name"]."\n");
                if(method_exists(new $path,"onEnable")){
                    (new $path)->onEnable();
                }
                
            }
        }
    }
    
    public function loader(){
        
    }
}