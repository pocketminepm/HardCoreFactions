<?php

namespace hcf\module;

use hcf\player\Session;

use pocketmine\Server;

final class CooldownModule {
  
  use SingletonTrait;
  
  private array $cooldown = [
    'CombatTag' => [],
    'PvPTimer' => []
    ];
  
  public function __construct() {
    self::setInstance($this);
    
  }
  
  public function inCooldown(string $type, string $player): bool
    {
        if (isset($this->cooldowns[$type]) && isset($this->cooldowns[$type][$player])) {
            return $this->cooldowns[$type][$player] > time();
        }
        return false;
    }

    public function getCooldown(string $type, string $player): int
    {
        return $this->cooldowns[$type][$player] - time();
    }

    public function addCooldown(string $type, string $player, int $time): void
    {
        $this->cooldowns[$type][$player] = time() + $time;
    }
}

?>