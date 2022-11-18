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
}
?>
