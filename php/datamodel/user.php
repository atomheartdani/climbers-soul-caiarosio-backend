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
	public $password;

	public function __construct($db)
	{
		$this->conn = $db;
	}

	function getAllById($ids)
	{
		$in = str_repeat('?,', count($ids) - 1) . '?';
		$query = "SELECT u.* FROM users u WHERE u.id IN ($in)";
		$stmt = $this->conn->prepare($query);
		$stmt->execute($ids);
		return $stmt;
	}

	function login($username)
	{
		$query = "SELECT u.* FROM users u WHERE u.username = :username LIMIT 1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(":username", $username);
		$stmt->execute();
		return $stmt;
	}
}
