<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;

final class Power extends Stone implements StoneInterface {

	public string $name;
	protected string $text = "";
	private array $letterPos = [];
		
	public function __construct()
	{
		$this->name = "power";
		
	}
	
	public function use(int $times = null): self
	{
		$times = $times ?? 1;
		for ($i=0; $i < $times; $i++) { 
			if (!empty($this->text)) {
	    		$this->ifTextIsNull();
			} else {
				$this->ifTextIsNotNull($this->text);
			}
		}

   	 	return $this;
	}

	private function ifTextIsNull(): void {
		$pos = $this->getRandomPosition($this->text);
		if ($this->text[$pos] != " ") {
			$this->text = substr($this->text, 0, $pos) . "*" . substr($this->text, $pos + 1);	
			$this->letterPos[] = $pos;

		} else {
			$this->ifTextIsNull();
		}

	}

	private function ifTextIsNotNull(string $text): void {
		$pos = $this->getRandomPosition($text);
		if ($text[$pos] != " ") {
	   		$this->text = substr($this->text, 0, $pos) . "*" . substr($this->text, $pos + 1);	
			$this->letterPos[] = $pos;
		} else {
			$this->ifTextIsNotNull($text);
		}
	}
	private function getRandomPosition(string $text): int {
	    do {
	        $pos = rand(0, strlen($text) - 1);
	    } while (in_array($pos, $this->letterPos));

	    $this->letterPos[] = $pos;
	    return $pos;
	}
}


?>
