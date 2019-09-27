<?php
require('controller/controller.php');

try {
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'addMember') {
			signUp($_POST['pseudo'], $_POST['pass1'], $_POST['pass2'], $_POST['email']);
		}
		elseif ($_GET['action'] == 'signInPage') {
			signInPage();
		}
		elseif ($_GET['action'] == 'signIn') {
			signIn($_POST['pseudo'], $_POST['pass'], $_POST['auto_connect']);
		}
		elseif ($_GET['action'] == 'mainPage') {
			mainPage();
		}
		elseif ($_GET['action'] == 'disconnectPage') {
			disconnectPage();
		}
	}
	else {
		signUpPage();
	}
}

catch (Exception $e) {
	echo 'Erreur :' . $e->getMessage();
}