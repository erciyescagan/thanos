<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Reality extends Stone implements StoneInterface {

	public string $name;
	
	public function __construct() 
	{
		$this->name = "reality";
	}

	public function use($variable): string
	{
		return str_shuffle($variable);
	}
}


?>
