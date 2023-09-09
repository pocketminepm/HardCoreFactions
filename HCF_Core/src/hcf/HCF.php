<?php

namespace hcf;

use hcf\module\ListenersModule;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\SingletonTrait;

/**
 * @package hcf\HCF.php
 * HCF.php
 **/
class HCF extends PluginBase {
  
  use SingletonTrait;
  
  protected function onLoad() : void {
    self::setInstance($this);
  }
  
  protected function onEnable() : void {
    ListenersModule::init();
  }
  
  protected function onDisable() : void {
    
  }
}

?>