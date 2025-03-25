<?php

namespace thanos\stones;

require_once __DIR__ . "/../interfaces/StoneInterface.php";
require_once __DIR__ . "/../core/Stone.php";

use thanos\interfaces\StoneInterface;
use thanos\core\Stone;
use DateTime;
use DateInterval;

final class Time extends Stone implements StoneInterface {

	public string $name;	
	private int $times = 0;
	private string $date;

	public function __construct()
	{
		$this->name = "time";
	}	
	
	public function use($times = null): self {
		$this->times += $times ?? 1;
		$interval = explode($this->text[0], $this->text)[1] * $this->times;
		$this->date = $this->calculateDate($interval, new dateTime());
		return $this;
	}

	public function getResult(): string
	{
		return $this->date;
	}

	private function calculateDate($interval, $dateTime): string {
	
		$symbol = str_split($this->text)[0];

		if ($symbol == "+") {
			$dateTime = $dateTime->add(new DateInterval("P" . abs($interval) . "D"));
		} else {
			$dateTime = $dateTime->sub(new DateInterval("P" . abs($interval) . "D"));
		}
		$dateTime = (array)$dateTime;
		return $dateTime["date"];
	}


}
?>
