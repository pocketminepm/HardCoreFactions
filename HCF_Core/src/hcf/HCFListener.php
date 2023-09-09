<?php

namespace hcf;

use hcf\player\Session;
use hcf\utils\HCFUtils;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\event\player\{PlayerCreationEvent, PlayerJoinEvent, PlayerQuitEvent};

final class HCFListener implements Listener {
  
   public function onCreateEvent(PlayerCreationEvent $event) : void {     
$event->setPlayerClass(Session::class);
   }
   
   public function onJoin(PlayerJoinEvent $event) : void {
     $player = $event->getPlayer();
     if ($player instanceof Session){
       if ($player->isTimer()){
         return;
       }
       $player->setTimer(true);
       HCFUtils::broadcaste("Hola " . $player->getName());
       }
   }
}