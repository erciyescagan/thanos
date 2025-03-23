<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Soul extends Stone implements StoneInterface {

	public string $name;
	
	public function __construct()
	{
		$this->name = "soul";	
	}

	public function use($variable): string 
	{
		return implode(" | ", array_fill(0, rand(0,100), $variable));

	}
}

?>
