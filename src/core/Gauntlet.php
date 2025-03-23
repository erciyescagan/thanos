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

	public function snap($data)
	{		
		if ($this->checkGauntletAllSet() && $this->checkDataArrayIsNotNull($data)) {
			return $this->gauntletInterface->snap($data);
		} 

		throw new Exception("Please set all stones if you want to use gauntlet!");


	}

	public function setGauntlet($gauntletInterface, $implementedStones): void
	{	
		$this->gauntletInterface = $gauntletInterface;
		$this->implementedStones = $implementedStones;
	
		echo sprintf("%s has been set!!\n", $this->gauntletInterface->name);
	}

 	private function checkGauntletAllSet(): bool
    {
        $requiredStones = ["mind", "power", "reality", "soul", "space", "time"];
        $existingStones = [];
	
	    $existingStones = array_map(fn($stone) => $stone->stone->name ?? null, $this->implementedStones);

	    return empty(array_diff($requiredStones, $existingStones));
    }

	private function checkDataArrayIsNotNull($data) 
	{	

		if (!empty($data)) {
			return true;
		}

		throw new Exception("Please define a valid data array!");
	}

	private function isMultidimensionalArray(array $array): bool 
	{
		return count(array_filter($array, 'is_array')) > 0;
	}
}

?>