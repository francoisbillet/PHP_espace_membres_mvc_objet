<?php
require_once('model/Manager.php');

class MembersManager extends Manager {
	public function loginAvailable($login) {
		$db = $this->dbConnect();
		$request = $db->prepare('SELECT * FROM membres WHERE pseudo = ?');
		$request->execute(array($login));
		$loginAvailable = $request->fetch();

		return $loginAvailable;
	}

	public function addMember($login, $hashed_pass, $email) {
		$db = $this->dbConnect();
		$request = $db->prepare('INSERT INTO membres(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');
		$addMember = $request->execute(array($login, $hashed_pass, $email));

		return $addMember;
	}

	public function login($login) {
		$db = $this->dbConnect();
		$request = $db->prepare('SELECT id, pass FROM membres WHERE pseudo = ?');
		$request->execute(array($login));
		$login = $request->fetch();

		return $login;
	}
}