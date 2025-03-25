<?php

namespace thanos\core;

require_once __DIR__ . "/Stone.php";
require_once __DIR__ . "/../interfaces/GauntletInterface.php";
require_once __DIR__ . "/../interfaces/StoneInterface.php";

use thanos\core\Stone;
use thanos\interfaces\GauntletInterface;
use Exception;

class Gauntlet {

	public array $implementedStones = [];
	private GauntletInterface $gauntletInterface;

	public function snap($data): array
	{		
		if ($this->checkGauntletAllSet() && $this->checkDataArrayIsNotNull($data)) {
			return $this->gauntletInterface->snap($data);
		} 

		return [];

		throw new Exception("Please set all stones if you want to use gauntlet!");


	}

	public function setGauntlet($gauntletInterface, $implementedStones): void
	{	
		$this->gauntletInterface = $gauntletInterface;
		$this->implementedStones = $implementedStones;
	}

 	private function checkGauntletAllSet(): bool
    {
        $requiredStones = ["mind", "power", "reality", "soul", "space", "time"];
        $existingStones = [];
		
		if (!empty($this->implementedStones)) {
		    $existingStones = array_map(fn($stone) => $stone->stone->name ?? null, $this->implementedStones);
		}

	    return empty(array_diff($requiredStones, $existingStones));
    }

	private function checkDataArrayIsNotNull($data): bool
	{	

		if (!empty($data)) {
			return true;
		}

		throw new Exception("Please define a valid data array!");
		return false;

	}
}

?>