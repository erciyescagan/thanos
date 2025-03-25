<?php

namespace thanos\gauntlets;

require_once __DIR__ . "/../core/Gauntlet.php";
require_once __DIR__. "/../interfaces/GauntletInterface.php";

use thanos\core\Gauntlet;
use thanos\interfaces\GauntletInterface;

class InfinityGauntlet extends Gauntlet implements GauntletInterface {
	

	public string $name = "Infinity Gauntlet";

	public function snap($data): array
	{
		shuffle($data);
		$half = floor(count($data) / 2);
		return array_splice($data, 0, $half);
	}
}

?>