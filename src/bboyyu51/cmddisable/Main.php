<?php

namespace bboyyu51\cmddisable;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase{
    public function onEnable(){
        $config = new Config($this->getDataFolder() . "Config.yml", Config::YAML, [
            "Command" => [
                "examplecmd",
            ],
        ]);
        $task = new CmdUnregisterTask($config->get("Command"));
        $this->getScheduler()->scheduleDelayedTask($task, 30);
    }
}