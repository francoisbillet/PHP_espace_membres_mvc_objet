<?php $title = 'Inscription'; ?>
<?php ob_start(); ?>

<form method="post" action="index.php?action=addMember">
	<p>
		<label for="pseudo">Pseudo</label>
		<input type="text" id="pseudo" name="pseudo" required /> <br />
		<label for="pass1">Mot de passe</label>
		<input type="password" id="pass1" name="pass1" required /> <br />
		<label for="pass2">Confirmez le mot de passe</label>
		<input type="password" id="pass2" name="pass2" required /> <br />
		<label for="email">Adresse email</label>
		<input type="text" id="email" name="email" required /> <br />
		<input type="submit" value="Envoyer" />
	</p>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>