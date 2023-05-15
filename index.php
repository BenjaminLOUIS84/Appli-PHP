<?php
    //Pour parcourir le tableau de session de la page de traitement on appel la fonction ici

    session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <nav>
                <h1>APPLI PHP</h1>
                <div class="menu">
                    <a href="recap.php">RESULTAT</a>
                </div>
            </nav>
        </header>

        <?php
            ///////////////////////////////////////////////////////////////////////////////
            //Pour afficher le nombre de produits en session (références en stock)
            //////////////////////////////////////////////////////////////////////////////

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {    
                        
                echo "<p> Nombre de produits : 0 </p>";

            } else {

                echo "<p>Nombre de produits : ".count($_SESSION['products'])."</p>";  

            }
            /////////////////////////////////////////////////////////////////////////////////
        ?>

        <!-- La balise form comporte 2 attributs action qui indique la cible du formulaire (fichier à atteindre quand l'user soumettra le formulaire)
        et method qui précise par quelle méthode les données seront transmises au serveur -->
        <!-- On privilégie Post pour ne pas polluer l'URL -->

        <div class= formulaire>
            <form action="traitement.php" method="post">

                <p>
                    <label>
                        Nom du produit<br>
                        <input type="text" name="name" required>
                    </label>
                </p>
                <p>
                    <label>
                        Prix du produit<br>
                        <input type="number" step="any" name="price" required>
                    </label>
                </p>
                <p>
                    <label>
                        Quantité<br>
                        <input type="number" name="qtt" value="i" required>
                    </label>
                </p>
                <p>
                    <input type="submit" name="addProduct" value="AJOUTER">
                </p>
            </form>
        </div>

        <?php
          
            ///////////////////////////////////////////////////////////////////////////////
            // Afficher un message à chaque ajout de produit
            ///////////////////////////////////////////////////////////////////////////////

            if(!isset($_SESSION['checkSuccess'])|| empty(['checkSuccess'])){

                //$_SESSION['checkSuccess'] = "<div class= messageF><p>Veuillez ajouter un produit</p></div>";
                $_SESSION['checkSuccess'] = "<p>Veuillez ajouter un produit</p>";
          
            }else{
            
                //echo "<div class= messageD><p>".$_SESSION['checkSuccess']."<p></div>";
                echo $_SESSION['checkSuccess'];
            }
           
            ///////////////////////////////////////////////////////////////////////////////
            
            

        ?>

    </div>

</body>
</html>
