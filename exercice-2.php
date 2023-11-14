<?php
    if(!empty($_POST)) {
        foreach($_POST as $key => $value) {
            file_put_contents("commandes/".date("Y-m-d H-m-s").".txt", "$key => $value\n", FILE_APPEND);
        }
        echo "<span style='color: darkgreen;'>Votre commande est désormais enregistrée.</span>";
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Formulaire de commande</title>
  </head>
  <body style="height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <h1>Formulaire de commande</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" required><br><br>
      <label for="adresse">Adresse :</label>
      <textarea name="adresse" id="adresse" required></textarea><br><br>
      <label for="produit">Produit :</label>
     <input type="text" name="produit" id="produit" required><br><br>
      <label for="prix">Prix :</label>
      <input type="number" name="prix" id="prix" required><br><br>
      <input type="submit" value="Envoyer">
    </form>
  </body>
</html>