<?php
session_start();

require('db.php');
if(isset($_POST['ook'])){
    if (!empty($_POST['nom']) AND !empty($_POST['email'])AND  !empty($_POST['objet']) AND  !empty($_POST['message']) ) {
        
        $nom=  htmlspecialchars($_POST['nom']);
        $objet= htmlspecialchars($_POST['objet']);
        $email= htmlspecialchars($_POST['email']);
        $message= htmlspecialchars($_POST['message']);
        

        $insert = $conn->prepare('INSERT INTO contactee (nom_contact,email,objet_user,messagee) VALUES (?,?,?,?)');
        $insert->execute(array($nom,$email,$objet,$message));

        header('Location:index.php#contact');
    } else {
        echo "veillez remplir tous les champs svp...";
    }
    
}
?>
