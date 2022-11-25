<?php

class Rule {
	private $conn;

	// fields
	public $id;
	public $order;
	public $content;
	public $parentId;

	public function __construct($db) {
		$this->conn = $db;
	}

	function getAll() {
		$query = 'SELECT r.* FROM rules r';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}
