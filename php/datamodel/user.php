<?php

class User {
	private $conn;

	// fields
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $email;
	public $isAdmin;
	public $updatePassword;
	public $password;

	public function __construct($db) {
		$this->conn = $db;
	}

	function getAll() {
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE 1=1 ORDER BY u.lastname, u.firstname';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function getAllById($ids) {
		$in = str_repeat('?,', count($ids) - 1) . '?';
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE u.id IN (' . $in . ')';
		$stmt = $this->conn->prepare($query);
		$stmt->execute($ids);
		return $stmt;
	}

	function insert($username, $firstname, $lastname, $email, $isAdmin, $defaultPassword) {
		$query = 'INSERT INTO ClimbersSoulUsers(`username`, `firstname`, `lastname`, `email`, `isAdmin`, `updatePassword`, `password`) VALUES (:username, :firstname, :lastname, :email, :isAdmin, 1, :defaultPassword)';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$isAdminInt = (int) $isAdmin;
		$stmt->bindParam(':isAdmin', $isAdminInt);
		$stmt->bindParam(':defaultPassword', $defaultPassword);
		$stmt->execute();
	}

	function update($id, $username, $firstname, $lastname, $email, $isAdmin, $updatePassword) {
		$query = 'UPDATE ClimbersSoulUsers SET `username`=:username,`firstname`=:firstname,`lastname`=:lastname,`email`=:email,`isAdmin`=:isAdmin,`updatePassword`=:updatePassword WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$isAdminInt = (int) $isAdmin;
		$stmt->bindParam(':isAdmin', $isAdminInt);
		$updatePasswordInt = (int) $updatePassword;
		$stmt->bindParam(':updatePassword', $updatePasswordInt);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function delete($id) {
		$query = 'DELETE FROM ClimbersSoulUsers WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function login($username) {
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE u.username = :username LIMIT 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt;
	}

	function updatePassword($id, $newPassword) {
		$query = 'UPDATE ClimbersSoulUsers SET `password` = :password, `updatePassword` = 0 WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':password', $newPassword);
		$stmt->execute();
	}
}
