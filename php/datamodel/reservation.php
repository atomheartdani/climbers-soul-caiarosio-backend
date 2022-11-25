<?php

class Reservation
{
	private $conn;

	// fields
	public $id;
	public $openingId;
	public $userId;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function delete($openingId, $userId) {
		$query = "DELETE FROM reservations WHERE `openingId` = :openingId AND `userId` = :userId";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":openingId", $openingId);
		$stmt->bindParam(":userId", $userId);
		$stmt->execute();
	}

	function getAll()
	{
		$query = "SELECT r.* FROM reservations r";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function getAllByOpeningId($openingId)
	{
		$query = "SELECT r.* FROM reservations r WHERE r.openingId = :openingId";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':openingId', $openingId);
		$stmt->execute();
		return $stmt;
	}

	function insert($openingId, $userId) {
		$query = "INSERT INTO reservations (`openingId`, `userId`) VALUES (:openingId, :userId)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":openingId", $openingId);
		$stmt->bindParam(":userId", $userId);
		$stmt->execute();
	}
}
