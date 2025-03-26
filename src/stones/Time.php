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
	
	public function use(int $times = null): self {
		$this->times += $times ?? 1;
		$interval = $this->text * $this->times;
		$this->date = $this->calculateDate($interval, new dateTime());
		return $this;
	}

	public function getResult(): string
	{
		return $this->date;
	}

	private function calculateDate(int $interval, dateTime $dateTime): string {

		if ($this->text > 0) {
			$dateTime = $dateTime->add(new DateInterval("P" . abs($interval) . "D"));
		} else {
			$dateTime = $dateTime->sub(new DateInterval("P" . abs($interval) . "D"));
		}
		$dateTime = (array)$dateTime;
		return $dateTime["date"];
	}


}
?>
