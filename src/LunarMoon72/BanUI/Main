<?php

namespace LunarMoon72\BanUI;

use pocketmine\plugin\PluginBase;

use jojoe77777\FormAPI\CustomForm;

use pocketmine\Server;
use pocketmine\Player;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

use pocketmine\utils\TextFormat as C;

class Main extends PluginBase {
	public function onEnabled() : void{
		$this->getLogger()->info("Plugin has been enabled");
	}
	public function onDisabled() : void {
		$this->getLogger()->info("Plugin Disabled");
	}
	public function onCommand(CommandSender $sender, Command $cmd, String $label, Array $args) : bool {
		switch($cmd->getName()){
			case "banui":
			$sender->mainUI($sender);
			if(!$sender instanceof Player){
				$this->getLogger()->info("Must be a Player!");
			}
		}
		return true;
	}
	public function mainUI($player){
		$form = new CustomForm(function(Player $player, int $data){
			if($data === null){
				return true;
			}
			var_dump($data);
			switch($data){
				case 0:
				    $player->kickUI($player);
				break;

				case 1:
				    $player->banUI($player);
				break;

			}
		});

		$form->setTitle("Select an Option");
		$form->addLabel("Press an option to be transported to next ui!");
		$form->addButton(C::BLUE . "Kick a Player");
		$form->addButton(C::RED . "Ban a Player");
	}
		public function banUI($player){
		$form = new CustomForm(function(Player $player, int $data){
			if($data === null){
				return true;
			}
			var_dump($data);
			switch($data){
				case 0:
				    $this->getServer()->dispatchCommand($player, "tempban " . $data[1] . " " . $data[0]);
				break;
			}
		});

		$form->setTitle("Type a Player to Ban them");
		$form->addLabel(C::RED . "TYEP A PLAYER TO BAN THEM");
		$form->addSlider("Amount of days the player will be banned", 1, 30);
		$form->addInput("Type a Player here!");
	}
	public function kickUI($player){
		$form = new CustomForm(function(Player $player, int $data){
			if($data === null){
				return true;
			}
			var_dump($data);
			switch($data){
				case 0:
				    $this->getServer()->dispatchCommand($player, "kick " . $data[1]);
				break;
			}
		});

		$form->setTitle("Type a Player to Ban them");
		$form->addLabel(C::RED . "TYEP A PLAYER TO KICK THEM");
		$form->addInput("Type a Player here!");
	}
}
