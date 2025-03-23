<?php

namespace thanos\core;

require_once __DIR__ . "/../stones/Mind.php";
require_once __DIR__ . "/../stones/Power.php";
require_once __DIR__ . "/../stones/Reality.php";
require_once __DIR__ . "/../stones/Soul.php";
require_once __DIR__ . "/../stones/Space.php";
require_once __DIR__ . "/../stones/Time.php";
require_once __DIR__ . "/../interfaces/StoneInterface.php";

use thanos\stones\Mind;
use thanos\stones\Power;
use thanos\stones\Reality;
use thanos\stones\Soul;
use thanos\stones\Space;
use thanos\stones\Time;
use thanos\interfaces\StoneInterface;
use Exception;

class Stone {

	public StoneInterface $stone;
	
	public function __construct(StoneInterface $stone) 
	{	

		$this->stone = $stone;
		$this->stone->addStone();
	}


	protected function addStone()
	{	
		//echo sprintf("%s stone has been implemented!\n", $this->name);
	}

	public function use($variable)
	{
		echo sprintf("%s stone has been used!\n", $this->stone->name);
		
		$value = $this->stone->use($variable);

		return $value;
	}


		
}

?>