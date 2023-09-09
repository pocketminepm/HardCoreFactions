<?php

namespace hcf\task;

use hcf\HCF;
use hcf\player\Session;

use pocketmine\Server;
use pocketmine\scheduler\Task;
use pocketmine\utils\TextFormat;

class ScoreboardTask extends Task
{

	public function __construct(HCF $pg, Session $player)
	{
		$this->plugin = $pg;
		$this->player = $player;
	}

    public function onRun(): void
    {
       $player = $this->player;
       if(!$player->isOnline()){
			$this->getHandler()->cancel();
			return;
		}
       if ($player->isOnline()) {
       $api = HCF::getScoreboard();
       $scoreboard = [];
       $scoreboard[] = TextFormat::colorize(" &l&bClaim&e&7: ");
       $api->newScoreboard($player, $player->getName(), TextFormat::colorize("  &l&bHCF  "));
        if($api->getObjectiveName($player) !== null){
            foreach($scoreboard as $line => $key){
                $api->remove($player);
                $api->newScoreboard($player, $player->getName(), TextFormat::colorize("  &l&bHCF  "));
            }
        }
        foreach($scoreboard as $line => $key){
            $api->setLine($player, $line + 1, $key);
        }
       }
    }
}