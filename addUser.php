<?php
    //vérification si les champs sont remplis
    if(isset($_POST['submit'])){
        //(4) test si les champs sont remplis
        if(!empty($_POST['email'])&& !empty($_POST['password'])&&!empty($_POST['confirm'])){
            // (5) test si les mots de passes correspondent
            if($_POST['password']==$_POST['confirm']){
                // (9) test si le compte existe
                $recup = getUserByMail($bdd, $_POST['email']);
                if(empty($recup)){
                    // (10) hasher le mot de passe
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    //ajouter le compte
                    //(11)
                    $add = addUser($bdd, $_POST['email'], $password);
                    //message de confirmation
                    $msg = "Le compte : ".$_POST['email']." a été ajouté en BDD";
                }
                //erreur le compte existe déja
                else{
                    $msg = "Les informations email ou password sont incorrectes";
                }
            }
            //test les mots de passe ne correspondent pas
            else{
                $msg = "Les mots de passe ne correspondent pas";
            }
        }
        //test les champs ne sont pas remplis
        else{
            $msg = "Veuillez remplir tous les champs de formulaire";
        }
    }

    //récupérer un compte (par son email)
    function getUserByMail($bdd, $email):?array{
        try {
            $req = $bdd->prepare('SELECT id, email, password FROM utilisateur WHERE email= ?');
            //Bind des paramètres
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } 
        catch (\Exception $e) {
            die("Erreur ".$e->getMessage());
        }
    }
    //ajouter un compte en BDD
    function addUser($bdd, $email, $password):void{
        try {
            $req = $bdd->prepare('INSERT INTO utilisateur(email, password) VALUES(?,?)');
            //Bind des paramètres
            $req->bindParam(1, $email, PDO::PARAM_STR);
            $req->bindParam(2, $password, PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die("Erreur ".$e->getMessage());
        }
    }
?>