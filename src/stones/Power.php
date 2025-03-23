<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Power extends Stone implements StoneInterface {

	public string $name;
		
	public function __construct()
	{
		$this->name = "power";
		
	}
	
	public function use($variable): string 
	{
	    $effects = ["⚡", "🔥", "💥", "💣", "🔊"];
	    $pos = rand(1, strlen($variable) - 2); 
   	 	return substr($variable, 0, $pos) . $effects[array_rand($effects)] . substr($variable, $pos + 1);

	}

}


?>
