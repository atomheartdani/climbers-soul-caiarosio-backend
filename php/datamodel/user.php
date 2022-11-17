<?php
class User
{
	private $conn;

	// fields
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $email;
	public $isAdmin;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function getAll()
	{
		$query = "SELECT a.* FROM users a ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function getAllById($ids)
	{
    $in = str_repeat('?,', count($ids) - 1) . '?';
		$query = "SELECT a.* FROM users a WHERE a.id IN ($in)";
		$stmt = $this->conn->prepare($query);
		$stmt->execute($ids);
		return $stmt;
	}
}
?>
