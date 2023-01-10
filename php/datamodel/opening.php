<?php

class Opening {
	private $conn;

	// fields
	public $id;
	public $date;
	public $from;
	public $to;
	public $special;
	public $maxReservations;

	public function __construct($db) {
		$this->conn = $db;
	}

	function getNext($loadAll) {
		if ($loadAll === TRUE) {
			$query = 'SELECT o.* FROM openings o WHERE STR_TO_DATE(o.date, \'%Y-%m-%d\') >= CURDATE()';
		} else {
			$query = 'SELECT o.* FROM openings o WHERE STR_TO_DATE(o.date, \'%Y-%m-%d\') >= CURDATE() LIMIT 30';
		}
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function insert($date, $from, $to, $special, $maxReservations) {
		$query = 'INSERT INTO openings (`date`, `from`, `to`, `special`, `maxReservations`) VALUES (:date, :from, :to, :special, :maxReservations)';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':from', $from);
		$stmt->bindParam(':to', $to);
		$stmt->bindParam(':special', $special);
		$stmt->bindParam(':maxReservations', $maxReservations);
		$stmt->execute();
	}

	function update($id, $date, $from, $to, $special, $maxReservations) {
		$query = 'UPDATE openings SET `date`=:date, `from`=:from, `to`=:to, `special`=:special, `maxReservations`=:maxReservations WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':from', $from);
		$stmt->bindParam(':to', $to);
		$stmt->bindParam(':special', $special);
		$stmt->bindParam(':maxReservations', $maxReservations);
		$stmt->execute();
	}
}
