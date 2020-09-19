
<?php

namespace ips;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerPreLoginEvent;
use pocketmine\{
    Server,
    Player
};
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{

    public function onEnable(){
           $this->getLogger()->info("§aSuccesfully loaded IPLogger!");
           $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function login(PlayerPreLoginEvent $ev){

           if (!file_exists($this->getDataFolder() . $ev->getPlayer()->getName() . ".yml') {
               @mkdir($this->getDataFolder()."users/");
               $c = new Config($this->getDataFolder() . "users/" . $ev->getPlayer()->getName(), Config::YAML);

               $c->set("IP", $ev->getPlayer()->getAddress());

               $c->save();
           }

    }

}
