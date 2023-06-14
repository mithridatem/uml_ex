<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add account</title>
</head>
<body>
    <!--(2) demander les informations -->
    <h1>Ajouter un compte</h1>
    <!--Demander les informations -->
    <form action="" method="post">
        <label for="email">saisir un mail</label>
        <p><input type="email" name="email" id="email"></p>
        <label for="password">saisir un mot de passe</label>
        <p><input type="password" name="password" id="password"></p>
        <label for="password">saisir un mot de passe</label>
        <p><input type="password" name="confirm" id="confirm"></p>
       <input type="submit" value="Ajouter"name="submit">
    </form>
</body>
    <p id="error"><?=$msg?></p>
</html>