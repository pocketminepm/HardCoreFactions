<?php

namespace hcf;

use hcf\player\Session;
use hcf\utils\HCFUtils;
use hcf\module\CooldownModule;
use hcf\task\ScoreboardTask;

use pocketmine\event\Event;
use pocketmine\event\Listener;
use pocketmine\Server;
use pocketmine\player\Player;

use pocketmine\event\player\{PlayerCreationEvent, PlayerJoinEvent, PlayerQuitEvent};
use pocketmine\event\entity\{EntityDamageEvent};

final class HCFListener implements Listener {
  
   public function onCreateEvent(PlayerCreationEvent $event) : void {     
$event->setPlayerClass(Session::class);
   }
   
   public function onJoin(PlayerJoinEvent $event) : void {
     $player = $event->getPlayer();
     if ($player instanceof Session){
       HCF::getInstance()->getScheduler()->scheduleRepeatingTask(new ScoreboardTask($player, 30), 20);
       if($player->isTimer()){
       return;
          } else {
            $player->setTimer(true);
            $type = 'PvPTimer';
            CooldownModule::getInstance()->addCooldown($type, $player->getName(), 600);
          }
      
       }
   }
   
   public function onAttacked(EntityDamageEvent $event) : void {
     $entity = $event->getEntity();
     $type = 'PvPTimer';
     if (CooldownModule::getInstance()->inCooldown($type, $entity->getName())) {
     $cooldown = (CooldownModule::getInstance()->getCooldown($type, $entity->getName()));
     $event->cancel();
     }
   }
}