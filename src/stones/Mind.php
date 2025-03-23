<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";
use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Mind extends Stone implements StoneInterface {

	public string $name;
	
	public function __construct()
	{
		$this->name = "mind";
	}

	public function use($variable): string {
		return strrev($variable);
	}	

}

?>