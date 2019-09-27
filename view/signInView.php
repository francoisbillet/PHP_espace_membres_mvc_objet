<?php $title = 'Connexion'; ?>
<?php ob_start(); ?>

<form method="post" action="index.php?action=signIn">
	<p>
		<label for="pseudo">Pseudo</label>
		<input type="text" id="pseudo" name="pseudo" /> <br />
		<label for="pass">Mot de passe</label>
		<input type="password" id="pass" name="pass" /> <br />
		Connexion automatique <input type="checkbox" name="auto_connect" id="auto_connect" /> <label for="auto_connect"></label> <br />
		<input type="submit" value="Envoyer" />
	</p>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>