<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Récupération des données du formulaire
  $identifiant = $_POST['identifiant'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $emailConfirm = $_POST['email-confirm'];

  $errors = [];

  // Vérification de l'identifiant
  if (empty($identifiant)) {
    $errors[] = 'L\'identifiant est obligatoire.';
  }

  // Vérification du mot de passe
  if (strlen($password) < 6) {
    $errors[] = 'Le mot de passe doit comporter au moins 6 caractères.';
  }

  // Vérification de l'email
  if ($email !== $emailConfirm) {
    $errors[] = 'Les adresses e-mail doivent correspondre.';
  }

  if (empty($errors)) {
    // Si aucune erreur, les données sont valides, vous pouvez les utiliser
    // par exemple, enregistrer les informations dans la base de données
    // et rediriger l'utilisateur vers une page de succès.
    // (Vous devrez implémenter cela en fonction de votre application)
    echo 'Les données sont valides. Traitement supplémentaire ici...';
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Les formulaires HTML et JavaScript</title>
  <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body style="height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
  <?php 
  if (!empty($errors)) { 
    echo "<ul>";
    foreach ($errors as $error) {
      echo '
        <li style="color: darkred">
          '.$error.'
        </li>
      ';
    }
    echo "</ul>";
  } 
  ?>
  <form method="POST">
    <div class="field">
      <label for="identifiant">Identifiant</label>
      <input required type="text" id="identifiant" name="identifiant">
    </div>
    <div class="field">
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password">
    </div>
    <div class="field">
      <label for="email">Email</label>
      <input type="text" id="email" name="email">
    </div>
    <div class="field">
      <label for="email-confirm">Confirmation de l'email</label>
      <input type="text" id="email-confirm" name="email-confirm">
    </div>
    <div class="field">
      <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom">
    </div>
    <div class="field">
      <label for="prenom">Prénom</label>
      <input type="text" id="prenom" name="prenom">
    </div>
    <div class="field">
      <label for="annee">Année de naissance</label>
      <select id="annee" name="annee">
        <option value="1980">1980</option>
        <option value="1981">1981</option>
        <option value="1982">1982</option>
        <option value="1983">1983</option>
        <option value="1984">1984</option>
        <option value="1985">1985</option>
        <option value="1986">1986</option>
        <option value="1987">1987</option>
        <option value="1988">1988</option>
        <option value="1989">1989</option>
        <option value="1990">1990</option>
      </select>
      <div id="age"></div>
    </div>
    <input type="submit" id="btn-submit" name="btn-submit">
  </form>
  <script src="script.js"></script>
</body>

</html>