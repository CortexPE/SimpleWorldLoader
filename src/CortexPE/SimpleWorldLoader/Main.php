<?php

namespace CortexPE\SimpleWorldLoader;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{

   public function onEnable(){
	   $this->getServer()->getPluginManager()->registerEvents($this, $this);
	   $this->saveDefaultConfig();
       $this->reloadConfig();
       $this->worlds = $this->getConfig()->get("worlds");
	   $this->getLogger()->notice(TextFormat::GREEN . "Loading Worlds: " . TextFormat::AQUA . implode(", ", $this->worlds));
	   foreach($this->worlds as $w)
	   {
    	$this->getServer()->loadLevel($w);
	   }
   }
}
