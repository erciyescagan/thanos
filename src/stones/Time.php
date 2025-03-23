<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;
use DateTime;

final class Time extends Stone implements StoneInterface {

	public string $name;
	
	public function __construct()
	{
		$this->name = "time";
	}	
	
	public function use($variable): string {
		$dateTime = new DateTime();
		$dateTime = (array)$dateTime->modify($variable);
		return $dateTime["date"];
	}
}
?>
