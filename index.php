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

            if(!isset($_SESSION['nbProducts']) || empty($_SESSION['nbProducts'])) {    
                        echo "<p> Nombre de produits : 0 </p>";
                    } else {
                        $nbProducts = $_SESSION['nbProducts'];
                        echo "<p>Nombre de produits : ".count($_SESSION['products'])."</p>";        
                    }
            /////////////////////////////////////////////////////////////////////////////////
        ?>

        <!-- La balise form comporte 2 attributs action qui indique la cible du formulaire (fichier à atteindre quand l'user soumettra le formulaire)
        et method qui précise par quelle méthode les données seront transmises au serveur -->
        <!-- On privilégie Post pour ne pas polluer l'URL -->

        <form action="traitement.php" method="post">

            <p>
                <label>
                    Nom du produit<br>
                    <input type="texte" name="name" required>
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
                <input type="submit" name="submit" value="AJOUTER">
            </p>
        </form>

        <?php
            ///////////////////////////////////////////////////////////////////////////////
            //Modifier Veuillez ajouter un produit par Produit ajouté avec succès
            //////////////////////////////////////////////////////////////////////////////

            // if(!isset($_SESSION['checkSuccess'])|| empty(['checkSuccess'])){

            //     $_SESSION['checkSuccess'] = "Veuillez ajouter un produit";
            // }

            // echo "<p>".$_SESSION['checkSuccess']."<p>";

            ////////////////////////////////////////////////////////////////////////////////
        ?>

    </div>

    <?php
        
    ?>

</body>
</html>
