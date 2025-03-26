<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";
use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Mind extends Stone implements StoneInterface {

	public string $name;

	protected string $text;
	
	public function __construct()
	{
		$this->name = "mind";
	}

	public function use(int $times = null): self {

		$times = $times ?? 1;
		
		for ($i=0; $i < $times ; $i++) { 
			$this->text =  strrev($this->text);
		}

		return $this;
	}	
}

?>