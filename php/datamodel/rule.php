<?php

class Rule {
	private $conn;

	// fields
	public $id;
	public $order;
	public $parentOrder;
	public $content;

	public function __construct($db) {
		$this->conn = $db;
	}

	function getAll() {
		$query = 'SELECT r.* FROM ClimbersSoulRules r ORDER BY r.id';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}
