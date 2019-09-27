<?php

require_once('model/MembersManager.php');

function signUpPage() {
	require('view/signUpView.php');
}

function signUp($login, $pass1, $pass2, $email) {
	$membersManager = new MembersManager();
	$loginAvailable = $membersManager->loginAvailable($login);

	if (!$loginAvailable) {
		if (strcmp($pass1, $pass2)==0) {
			if (preg_match('#^[a-zA-Z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,4}$#', $email)) {
				$hashed_pass = password_hash($pass1, PASSWORD_DEFAULT);

				$addMember = $membersManager->addMember($login, $hashed_pass, $email);
				header('Location: index.php?action=signInPage');
			}
			else {
				throw new Exception('Adresse email non valide');
			}
		}
		else {
			throw new Exception('Les mots de passe ne sont pas identiques');
		}
	}
	else {
		throw new Exception('Cet identifiant existe déjà');
	}
}

function signInPage() {
	require('view/signInView.php');
}

function signIn($login, $pass, $auto_connect) {
	if ($auto_connect == 'on' && isset($_COOKIE['login']) && isset($_COOKIE['hashed_pass'])) {
		header('Location: index.php?action=mainPage');
	}
	else {
		$membersManager = new MembersManager();
		$array = $membersManager->login($login);

		if ($array != false) {
			if (password_verify($pass, $array['pass'])) {
				session_start();
				$_SESSION['id'] = $array['id'];
				$_SESSION['pseudo'] = $login;

				setcookie('login', $login, time() + 365*24*3600, null, null, false, true);
				setcookie('hashed_pass', $array['pass'], time() + 365*24*3600, null, null, false, true);
				header('Location: index.php?action=mainPage');
			}
			else {
				throw new Exception('Identifiant ou mot de passe incorrect');
			}
		}
		else {
			throw new Exception('Identifiant ou mot de passe incorrect');
		}
	}
	
}

function mainPage() {
	require('view/mainView.php');
}

function disconnectPage() {
	require('view/disconnectView.php');
}