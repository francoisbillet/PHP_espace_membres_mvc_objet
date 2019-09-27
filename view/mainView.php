<?php $title='Main Page'; ?>
<?php ob_start(); ?>

<?php session_start(); 
// echo 'Bonjour ' . ' ' . $_SESSION['pseudo'];
echo 'Hey' . ' ' . $_COOKIE['login'];
?>

<form action="index.php?action=disconnectPage" method="post">
	<p>
		<input type="submit" value="Déconnexion" />
	</p>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>