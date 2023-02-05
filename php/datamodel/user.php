<?php

class User {
	private $conn;

	// fields
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $email;
	public $tosConsent;
	public $isCaiArosio;
	public $updatePassword;
	public $password;
	public $canManageOpenings;
	public $canManageUsers;
	public $deletedOn;

	public function __construct($db) {
		$this->conn = $db;
	}

	function count($filter) {
		$query = 'SELECT COUNT(*) FROM ClimbersSoulUsers u WHERE u.deletedOn IS NULL AND ' . $filter;
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->fetch();
	}

	function getAll($filter, $pageIndex, $pageSize) {
		$offset = $pageIndex * $pageSize;
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE u.deletedOn IS NULL AND ' . $filter . ' ORDER BY lastname, firstname LIMIT :offset, :pageSize';
		$stmt = $this->conn->prepare($query);
		$offsetInt = (int) $offset;
		$stmt->bindParam(':offset', $offsetInt, PDO::PARAM_INT);
		$pageSizeInt = (int) $pageSize;
		$stmt->bindParam(':pageSize', $pageSizeInt, PDO::PARAM_INT);
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

	function getByUsername($username) {
		$query = 'SELECT 1 FROM ClimbersSoulUsers u WHERE UPPER(u.username) = UPPER(:username)';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt;
	}

	function insert($username, $firstname, $lastname, $email, $tosConsent, $isCaiArosio, $defaultPassword, $canManageOpenings, $canManageUsers) {
		$query = 'INSERT INTO ClimbersSoulUsers(`username`, `firstname`, `lastname`, `email`, `tosConsent`, `isCaiArosio`, `updatePassword`, `password`, `canManageOpenings`, `canManageUsers`) VALUES (:username, :firstname, :lastname, :email, :tosConsent, :isCaiArosio, 1, :defaultPassword, :canManageOpenings, :canManageUsers)';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':tosConsent', $tosConsent);
		$stmt->bindParam(':isCaiArosio', $isCaiArosio);
		$stmt->bindParam(':defaultPassword', $defaultPassword);
		$stmt->bindParam(':canManageOpenings', $canManageOpenings);
		$stmt->bindParam(':canManageUsers', $canManageUsers);
		$stmt->execute();
	}

	function update($id, $username, $firstname, $lastname, $email, $tosConsent, $isCaiArosio, $canManageOpenings, $canManageUsers) {
		$query = 'UPDATE ClimbersSoulUsers SET `username`=:username, `firstname`=:firstname, `lastname`=:lastname, `email`=:email, `tosConsent`=:tosConsent, `isCaiArosio`=:isCaiArosio, `canManageOpenings`=:canManageOpenings, `canManageUsers`=:canManageUsers WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':tosConsent', $tosConsent);
		$stmt->bindParam(':isCaiArosio', $isCaiArosio);
		$stmt->bindParam(':canManageOpenings', $canManageOpenings);
		$stmt->bindParam(':canManageUsers', $canManageUsers);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function delete($id) {
		$query = 'UPDATE ClimbersSoulUsers SET `deletedOn`=SYSDATE() WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
	}

	function login($username) {
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE u.deletedOn IS NULL AND UPPER(u.username) = UPPER(:username) LIMIT 1';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->execute();
		return $stmt;
	}

	function updatePassword($id, $newPassword, $updatePassword) {
		$query = 'UPDATE ClimbersSoulUsers SET `password` = :password, `updatePassword` = :updatePassword WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':password', $newPassword);
		$stmt->bindParam(':updatePassword', $updatePassword);
		$stmt->execute();
	}
}
