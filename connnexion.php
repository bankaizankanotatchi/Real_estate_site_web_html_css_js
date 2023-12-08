<?php
session_start();
require('db.php');
if(isset($_POST['ok'])){
    if (!empty($_POST['nom']) AND !empty($_POST['pass'])) {
        $nom=  htmlspecialchars($_POST['nom']);
        $pass= htmlspecialchars($_POST['pass']);

        /*$insert = $conn->prepare('INSERT INTO utilisateurs (nom_user,pass_user) VALUES (?,?)');
        $insert->execute(array($nom,$pass));*/

        $select = $conn->prepare('SELECT * FROM utilisateur WHERE nom_user=?  AND pass_user=?');
        $select->execute(array($nom,$pass));

        if ($select->rowCount()>0) {
            $_SESSION['id_user']=$select->fetch()['id_user'];
            $_SESSION['nom_user']=$nom;
            $_SESSION['pass_user']=$pass;

            header('Location:index.php');
        }else{
            echo "Vous n'avez pas de  compte.";
        }
        
    } else {
        echo "veillez remplir tous les champs svp...";
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
            <div class="logo_link">
                <a href="#" class="logo">Real Estate</a>
                <div class="menu_link">
                    <a href="#home">Home</a>
                    <a href="#service">Service</a>
                    <a href="#projet">Nos decorations</a>
                    <a href="#contact">Contact Us</a>
                </div>
            </div>
                
                <!-- responsive menu -->
                    <div class="sidebar" id="mySidebar">
                        <div class="closebtn"  onclick="closeNav()">
                            <img src="images/close.png">
                        </div>
                        <a href="#home">Home</a>
                        <a href="#service">Service</a>
                        <a href="#projet">Nos decorations</a>
                        <a href="#contact">Contact Us</a>

                        <a href="connnexion.php">Login</a>
                        <a href="inscription.php">Sign up</a>
                    </div>

                    <div id="main">
                        <button class="openbtn" onclick="openNav()">
                            <img src="images/menu.png">
                            Menu
                        </button>
                    </div>
            <!-- responsive menu -->

            <div class="link_buttons">
                <a href="connnexion.php" class="ll">Login</a>
                <a href="inscription.php" class="orange_link">Sign up</a>
            </div>
        </header>
    <section style="height: 60vh; display:flex;justify-content:center;align-items:center;">
        <div style="width: 30%;">
            <form action=" " method="post">
                <div style="display:flex;justify-content:center;align-items:center;">
                    <h2>Connexion</h2>
                </div><br>
                <div style="display:flex;justify-content:center;align-items:center;">
                    <input type="text" name="nom" placeholder="Entrez votre nom...">
                </div><br>
                <div style="display:flex;justify-content:center;align-items:center;">
                    <input type="password" name="pass" placeholder="Entrez votre mot de passe...">
                </div><br>
                <div style="display:flex;justify-content:center;align-items:center;">
                <input type="submit" name="ok"   value="Se connecter">
                </div>
                <br>
                <div style="display:flex;justify-content:center;align-items:center;">
                <h3>pas de compte?</h3>
                <a href="inscription.php">créer</a>
                </div>
            </form>
        </div>
    </section>

        <!-- footer -->
        <footer>
        <div class="footer-content">
            <h1>Real estate</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, cum. Vero, explicabo illum. Repudiandae.</p>
            <h4><a href="#contact">contact us</a></h4>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy;2023. Desighed by <span>Costy</span></p>
        </div>
        
    </footer>
    <script src="script.js"></script>

</body>
</html>