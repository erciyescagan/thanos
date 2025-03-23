<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Space extends Stone implements StoneInterface {

	public string $name;
	
	public function __construct() 
	{
		$this->name = "space";
	}

	public function use($variable): string {
		return implode(str_repeat(" ", rand(1, 100)), str_split($variable));
	}
}

?>
