<?php

namespace LunarMoon72\BanUI;

use pocketmine\plugin\PluginBase;

use pocketmine\{
	Player, Server
};
use pocketmine\command\{
	Command, CommandSender,
};

class Main extends PluginBase {
	public function onEnabled() : void {
		$this->getLogger()->info("§c[BanUI] is enabled. Made by LunarMoon72");
	}
	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
		switch($cmd->getName()){
			case "banui":
			if(!$sender->hasPermission("banui.cmd")){
				$sender->sendMessage("YOU LACK THE PERM LOL");
			} else {
				$this->mainUI($sender);
			}
			   if($sender instanceof Player){
			   	$this->mainUI($sender);
	         } else {
	         	$this->getLogger()->info("Must use INGAME!");
	         }
	         break;
		}
		return true;
	}
	public function banUI($player) {
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function(Player $player, $data){
			var_dump($data);
			switch($data){
				case 0:
				   $this->getServer()->sendMessage("/rca " . $player . " tempban " . $data[0] . " " . $data[1] . " " . $data[2]);
				   $player->sendMessage("§c[BanUI] Player has been banned for " . $data[1] . " days for " . $data[2]);
				break;
			}
		});
		$form->setTitle("§cType a Player to Ban Them");
		$form->addInput("Type Player Here!", "Ex: LunarMoon72", ".");
		$form->addSlider("Ban Time in Days:", 1, 30);
		$form->addInput("Reason for ban", "Ex: BHopping in Warzone", ".");
		$form->sendToPlayer($player);
		return $form;
	}
	public function mainUI($player){
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function(Player $player, $data){
			var_dump($data);
			switch($data){
				case 0:
				    $this->freezeUI($player);
				break;

				case 1:
				    $this->banUI($player);
				break;

				case 2:
				    $this->kickUI($player);
				break;
			}
		});
		$form->setTitle("§cPress an Option");
		$form->addButton("Freeze a Player");
		$form->addButton("Ban a Player");
		$form->addButton("Kick a Player");
		$form->sendToPlayer($player);
		return $form;
	}
	public function freezeUI($player){
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function(Player $player, $data){
			var_dump($data);
			switch($data){
				case 0:
				   $this->getServer()->sendMessage("/rca " . $player . " freeze " . $data[0]);
				   if($data[0] === null){
				   	$sender->sendMessage("§c[BanUI] Please put a Player!");
				   }
			}
		});
		$form->setTitle("§bType a Player to Freeze them!");
		$form->addInput("Type in a Player! Make sure to put the FULL USER.", "Ex: LunarMoon72", ".");
		$form->sendToPlayer($player);
		return $form;
	}
	public function kickUI($player){
		$form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createCustomForm(function(Player $player, $data){
			var_dump($data);
			switch($data){
				case 0:
				   $this->getServer()->sendMessage("/rca " . $player . " kick " . $data[0]);
				   if($data[0] === null){
				   	$sender->sendMessage("§c[BanUI] Please put a Player!");
				   }
			}
		});
		$form->setTitle("§bType a Player to Kick them!");
		$form->addInput("Type in a Player! Make sure to put the FULL USER.", "Ex: LunarMoon72", ".");
		$form->sendToPlayer($player);
		return $form;
	}
}
