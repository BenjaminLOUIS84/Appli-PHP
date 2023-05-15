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
    <title>Récapitulatif des produits</title>
</head>

<body>
    <div id="wrapper">
            <header>
                <nav>
                    <h1>APPLI PHP</h1>
                    <div class="menu">
                        <form action="traitement.php" method="post">
                            <input type="submit" name="return" value="RETOUR">
                        </form>        
                    </div>
                </nav>
            </header>

            <!--Réaliser 3 tests unitaires   -->
            <!-- Test 1 Accéder à recap.php sans ajouter de produit -->
        <?php
            //echo'<pre>';
            // var_dump($_SESSION);
            // echo'</pre>';
        ?>
            <!-- Test 2 Accéder à recap.php après avoir ajouté 2 produits -->
        <?php 
            // echo'<pre>';
            // var_dump($_SESSION);
            // echo'</pre>';
        ?>
            <!-- Test 3 Accéder à recap.php après avoir ajouté un produit bizarre -->
        <?php
            // echo'<pre>';
            // var_dump($_SESSION);
            // echo'</pre>';
        ?>
        <?php
            // Afficher les produits dans un tableau HTML
            // !isset  vérifie si dans le tableau associatif $_SESSION, il y a des données enregistrées (en occurence 'products' qu'on a créé dans traitement et qu'on a push)
            // empty() 'products' est bien présent mais il n'y a aucune valeur à l'intérieur.

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en stock...</p>";
            }

            // Si une clé existe et qu'il y a des produits qui ont été add, alors on peut afficher ce que l'utilisateur a ajouté :            
            
            else{
                echo "<table>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",

                    "<tbody>";  

                        $totalGeneral = 0;

                        foreach($_SESSION['products'] as $index => $product){

                            // On parcourt ici le tableau products et on ressort $index et $product pour en manipuler facilement les données.
                            
                            echo "<tr>",
                                "<td>".$index."</td>",
                                "<td>".$product['name']."</td>",
                                "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                                "<td>".$product['qtt']."</td>",
                                "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "</tr>";
                            
                            $totalGeneral += $product['total'];
                        }
                
                        // tr pour nouvelle ligne (table Row). On affichera à chaque fois le $product[item]. product étant un tableau qu'on a initialisé à chaque input contenant un name, un price, une qtt et un total.
                        // number_format permet de formatter un nombre.
                        // number_format(float $nombre (ici le price), int decimale (2chiffre après virgule ici), le séparateur sous forme de string "," ou "." mais aussi "<br>" par ex)
                    
                        echo "<tr>",
                            "<td colspan=4><h3>Total général : </h3></td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "</tr>",

                    "</body>",
                "</table>";

                //colspan = '4' permet de fusionner 4 cellules dont le contenu sera "Total général:".            
            }

        ?>
        
        <!-- Bouton pour reset le stock -->

        <form action="traitement.php" method="post">
            <input type="submit" name="reset" value="VIDER LE STOCK">
        </form>

        <?php

            ///////////////////////////////////////////////////////////////////////////////
            //Pour afficher le nombre de produits en session (références en stock)
            ///////////////////////////////////////////////////////////////////////////////
        
            if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                
                echo "<p> Nombre de produits : 0 </p>";

            } else {

                echo "<p>Nombre de produits : ".count($_SESSION['products'])."</p>";
                
            }

            ///////////////////////////////////////////////////////////////////////////////
            
            
        ?>

    </div> 

</body>
</html>
