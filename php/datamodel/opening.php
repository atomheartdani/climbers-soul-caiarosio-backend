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

	function getAll()
	{
		$query = "SELECT o.* FROM openings o";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
}
?>
