<?php

namespace bboyyu51\cmddisable;

use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\command\Command;

class CmdUnregisterTask extends Task{
    public function __construct(array $commands){
        $this->cmds = $commands;
    }
    
    public function onRun(int $ticks){
        foreach($this->cmds as $cmdname){
            $cmd = Server::getInstance()->getCommandMap()->getCommand($cmdname);
            if($cmd instanceof Command){
                Server::getInstance()->getCommandMap()->unregister($cmd);
            }
        }
    }
}