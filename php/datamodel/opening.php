<?php

class Opening
{
	private $conn;

	// fields
	public $id;
	public $date;
	public $from;
	public $to;
	public  $special;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function getNext($loadAll)
	{
		if($loadAll === TRUE) {
			$query = "SELECT o.* FROM openings o WHERE STR_TO_DATE(o.date, '%Y-%m-%d') >= CURDATE()";
		} else {
			$query = "SELECT o.* FROM openings o WHERE STR_TO_DATE(o.date, '%Y-%m-%d') >= CURDATE() LIMIT 50";
		}
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function insert($date, $from, $to, $special) {
		$query = "INSERT INTO openings (`date`, `from`, `to`, `special`) VALUES (:date, :from, :to, :special)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":date", $date);
		$stmt->bindParam(":from", $from);
		$stmt->bindParam(":to", $to);
		$stmt->bindParam(":special", $special);
		$stmt->execute();
	}

	function update($id, $date, $from, $to, $special) {
		$query = "UPDATE openings SET `date`=:date, `from`=:from, `to`=:to, `special`=:special WHERE `id`=:id";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":date", $date);
		$stmt->bindParam(":from", $from);
		$stmt->bindParam(":to", $to);
		$stmt->bindParam(":special", $special);
		$stmt->execute();
	}
}
