<?php

namespace hcf\module;

use hcf\HCF;

use hcf\HCFListener;

use pocketmine\event\Event;
use pocketmine\event\Listener;

/**
 * @package hcf\HCF.php
 * HCF.php
 **/
final class ListenersModule {
   
   /**
    * @priority HIGH
    * init
    **/
    public static function init() : void {
     ListenersModule::register(new HCFListener());
    }
    
    public static function register(Listener $listener) : void {
      HCF::getInstance()->getServer()->getPluginManager()->registerEvents($listener, HCF::getInstance());
    }
 }
?>