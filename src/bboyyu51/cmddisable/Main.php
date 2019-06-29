<?php

namespace bboyyu51\cmddisable;

use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\command\Command;

class Main extends PluginBase{
    public function onEnable(){
        $config = new Config($this->getDataFolder() . "Config.yml", Config::YAML, [
            "Command" => [
                "examplecmd",
            ],
        ]);
        foreach($config->get("Command") as $cmdname){
            $cmd = Server::getInstance()->getCommandMap()->getCommand($cmdname);
            if($cmd instanceof Command){
                Server::getInstance()->getCommandMap()->unregister($cmd);
            }
        }
    }
}