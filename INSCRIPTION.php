
<?php 

try
{
    $bdd=new PDO('mysql:host=localhost;dbname=tp-personnel','root','');
}
catch(Exception $e)
{
    die("Erreur :" .$e->getMessage());
}



 @$nom=$_POST['nom'];
 @$prenom=$_POST['prenom'];
 @$email=$_POST['email'];
 @$code=$_POST['code'];
 @$role=$_POST['role'];
 @$submit=$_POST['submit'];
 @$erreur="";
 @$err="";

 

if (isset($submit)) {
 
   
    
    if (empty($nom) || empty($prenom) || empty($email) || empty($code)  || empty($role)) {

        $erreur="Veuillez remplire tous les champs svp!";
          
    }
    else{
        $res=$bdd->query(" INSERT INTO connect(nom, prenom, email, code, role) 
                            VALUES ('$nom','$prenom','$email','$code','$role')");
        if ($res !== false) {
            header('location:Index.php');
        }else{
            $err="echec d'enregistrement!";
        }

    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>

    <div class="contenaire">
        <button class="but"><a href="CONNECTION.php">Se connecter</a></button>

        <h1>Inscription</h1>
        <form action="" method="POST">
            <input type="text" name="nom"  placeholder="Entrez votre nom">
            <input type="text" name="prenom" placeholder="Entrez votre prenom">
            <input type="email" name="email" placeholder="Entrez votre Email">
            <input type="password" name="code" placeholder="Entrez votre mot de passe">
            <input type="text" name="role" placeholder="Entrez votre role">
            <input type="submit" value="VALIDER" name="submit" class="submit">

            <div><?php echo $err?></div>
            <div style="color: red;     font-family:Arial, sans-serif;"><?php echo $erreur?></div>
        </form>
        <!-- <img src="image/img4.png" alt="" width="200px" > -->
        
    </div>
    
</body>
</html>
