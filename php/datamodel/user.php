<?php

class User {
	private $conn;

	// fields
	public $id;
	public $username;
	public $firstname;
	public $lastname;
	public $email;
	public $caiSection;
	public $tosConsent;
	public $updatePassword;
	public $password;
	public $canManageOpenings;
	public $canManageUsers;
	public $deletedOn;
	public $isVerified;

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

	function create($username, $firstname, $lastname, $email, $caiSection, $tosConsent, $defaultPassword, $canManageOpenings, $canManageUsers, $isVerified) {
		$this->insert($username, $firstname, $lastname, $email, $caiSection, $tosConsent, 1, $defaultPassword, $canManageOpenings, $canManageUsers, $isVerified);
	}

	function register($username, $firstname, $lastname, $email, $caiSection, $password) {
		$this->insert($username, $firstname, $lastname, $email, $caiSection, 0, 0, $password, 0, 0, 0);
	}

	private function insert($username, $firstname, $lastname, $email, $caiSection, $tosConsent, $updatePassword, $defaultPassword, $canManageOpenings, $canManageUsers, $isVerified) {
		$query = 'INSERT INTO ClimbersSoulUsers(`username`, `firstname`, `lastname`, `email`, `caiSection`, `tosConsent`, `updatePassword`, `password`, `canManageOpenings`, `canManageUsers`, `isVerified`) VALUES (:username, :firstname, :lastname, :email, :caiSection, :tosConsent, :updatePassword, :defaultPassword, :canManageOpenings, :canManageUsers, :isVerified)';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':caiSection', $caiSection);
		$stmt->bindParam(':tosConsent', $tosConsent);
		$stmt->bindParam(':updatePassword', $updatePassword);
		$stmt->bindParam(':defaultPassword', $defaultPassword);
		$stmt->bindParam(':canManageOpenings', $canManageOpenings);
		$stmt->bindParam(':canManageUsers', $canManageUsers);
		$stmt->bindParam(':isVerified', $isVerified);
		$stmt->execute();
	}

	function update($id, $username, $firstname, $lastname, $email, $caiSection, $tosConsent, $canManageOpenings, $canManageUsers, $isVerified) {
		$query = 'UPDATE ClimbersSoulUsers SET `username`=:username, `firstname`=:firstname, `lastname`=:lastname, `email`=:email, `caiSection`=:caiSection, `tosConsent`=:tosConsent, `canManageOpenings`=:canManageOpenings, `canManageUsers`=:canManageUsers, `isVerified`=:isVerified WHERE `id`=:id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':caiSection', $caiSection);
		$stmt->bindParam(':tosConsent', $tosConsent);
		$stmt->bindParam(':canManageOpenings', $canManageOpenings);
		$stmt->bindParam(':canManageUsers', $canManageUsers);
		$stmt->bindParam(':isVerified', $isVerified);
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
		$query = 'SELECT u.* FROM ClimbersSoulUsers u WHERE u.deletedOn IS NULL AND u.isVerified = 1 AND UPPER(u.username) = UPPER(:username) LIMIT 1';
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

	function wasUserVerified($id) {
		$query = 'SELECT u.isVerified FROM ClimbersSoulUsers u WHERE u.id = :id';
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$ret = $stmt->fetchColumn();
		return boolval($ret);
	}

	function getUserAdminEmails() {
		$query = 'SELECT u.email FROM ClimbersSoulUsers u WHERE u.canManageUsers = 1';
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
	}
}
