<?php

namespace dokidia;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\entity\Effect;

use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;

use pocketmine\item\Item;
use pocketmine\lang\BaseLang;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\block\Block;
use pocketmine\math\Vector3;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

use jojoe77777\FormAPI;

use dokidia\raspi; 

use onebone\economyapi\EconomyAPI;

class raspi extends PluginBase implements Listener {

    /** @var raspi $instance */
    private static $instance;
	
	public $plugin;

	public function onEnable() : void{
	    self::$instance = $this;
        $this->getLogger()->info(TextFormat::GREEN . "DIA-Raspi 활성화 완료 - Made by 도끼다이아");

	}
	
	public static function getInstance() : self{
	    return self::$instance;
	}
 

       
    public function onCommand(CommandSender $o, Command $kmt, string $label, array $array) : bool{
        if($kmt->getName() == "온도"){
            $this->raspi($o);
        }
        return true;
    }
    
    // 튜토리얼 1페이지
    public function raspi($player){
        $temp = system("cat /sys/class/thermal/thermal_zone0/temp");
        $temp2 = $temp * 1/1000;
        $player->sendMessage("$temp2 C");
    }
    
   

}

?>
