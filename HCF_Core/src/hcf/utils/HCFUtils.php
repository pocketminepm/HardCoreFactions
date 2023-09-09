<?php

namespace hcf\utils;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

final class HCFUtils {
  
  public static function broadcaste(String $message) : string {
    $text = TextFormat::colorize($message);
    return Server::getInstance()->broadcastMessage($text);
  }
  
  public static function hasCooldown(String $type) : string {
    $type = [];
    return $type;
  }
}
?>