<?php $title = 'inscription' ?>

<?php ob_start() ?>
<h1>inscription</h1>
<p>Veuillez rentrer vos données dans les champs ci-dessous pour créer un compte :</p>

<form action='index.php?action=create-user' method='POST'>
    <label>
        Votre pseudo : <input type='text' name='pseudo' />
    </label>

    <label>
        Votre mot de passe : <input type='password' name='password' />
    </label>

    <label>
        Confirmer votre mot de passe : <input type='password' name='validPass' />
    </label>

    <label>
        Votre adresse email : <input type='email' name='email' />
    </label>
    <input type='submit' name="s'inscrire" />
</form>
<?php
$content = ob_get_clean();
require('view/template.php');
?>