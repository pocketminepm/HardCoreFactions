<?php

namespace hcf\player;

use pocketmine\player\Player;
use pocketmine\network\mcpe\NetworkSession;
use pocketmine\player\PlayerInfo;

class Session extends Plugin {
  
  private bool $pvptimer = false;
  
  public function __construct(Server $server, NetworkSession $session, PlayerInfo $playerInfo, bool $authenticated, Location $spawnLocation, ?CompoundTag $namedtag)
    {
        parent::__construct($server, $session, $playerInfo, $authenticated, $spawnLocation, $namedtag);
    }
    
   public function setTimer(bool $timer = false) : void {
		$this->pvptimer = $timer;
	}
	
	public function isTimer() : bool {
		return $this->pvptimer;
	}
}