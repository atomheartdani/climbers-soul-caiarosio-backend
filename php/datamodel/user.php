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

	public function __construct($db) {
		$this->conn = $db;
	}

	function count() {
		$query = 'SELECT COUNT(*) FROM ClimbersSoulUsers';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->fetch();
	}

	function getAll($pageIndex, $pageSize) {
		$offset = $pageIndex * $pageSize;
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE 1=1 ORDER BY u.lastname, u.firstname LIMIT :offset, :pageSize';
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
		$tosConsentInt = (int) $tosConsent;
		$stmt->bindParam(':tosConsent', $tosConsentInt);
		$isCaiArosioInt = (int) $isCaiArosio;
		$stmt->bindParam(':isCaiArosio', $isCaiArosioInt);
		$stmt->bindParam(':defaultPassword', $defaultPassword);
		$canManageOpeningsInt = (int) $canManageOpenings;
		$stmt->bindParam(':canManageOpenings', $canManageOpeningsInt);
		$canManageUsersInt = (int) $canManageUsers;
		$stmt->bindParam(':canManageUsers', $canManageUsersInt);
		$stmt->execute();
	}

	function update($id, $username, $firstname, $lastname, $email, $tosConsent, $isCaiArosio, $updatePassword, $canManageOpenings, $canManageUsers) {
		$query = 'UPDATE ClimbersSoulUsers SET `username`=:username, `firstname`=:firstname, `lastname`=:lastname, `email`=:email, `tosConsent`=:tosConsent, `isCaiArosio`=:isCaiArosio, `updatePassword`=:updatePassword, `canManageOpenings`=:canManageOpenings, `canManageUsers`=:canManageUsers WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$tosConsentInt = (int) $tosConsent;
		$stmt->bindParam(':tosConsent', $tosConsentInt);
		$isCaiArosioInt = (int) $isCaiArosio;
		$stmt->bindParam(':isCaiArosio', $isCaiArosioInt);
		$updatePasswordInt = (int) $updatePassword;
		$stmt->bindParam(':updatePassword', $updatePasswordInt);
		$canManageOpeningsInt = (int) $canManageOpenings;
		$stmt->bindParam(':canManageOpenings', $canManageOpeningsInt);
		$canManageUsersInt = (int) $canManageUsers;
		$stmt->bindParam(':canManageUsers', $canManageUsersInt);
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
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE UPPER(u.username) = UPPER(:username) LIMIT 1';
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
