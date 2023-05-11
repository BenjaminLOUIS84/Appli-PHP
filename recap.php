<!-- Pour parcourir le tableau de session de la page de traitement on appel la fonction ici -->

<?php
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
                        <a href="index.php">Retour</a>    
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

            if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
                echo "<p>Aucun produit en session...</p>";
            }
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

                    echo "<tr>",
                            "<td>".$index."</td>",
                            "<td>".$product['name']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                            "<td>".$product['qtt']."</td>",
                            "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "</tr>";
                    $totalGeneral += $product['total'];
                }
                    echo "<tr>",
                            "<td colspan=4>Total général : </td>",
                            "<td><strong>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                        "</tr>",
                    "</body>",
                "</table>";
            }

            // Compter le nombre de produits en stock   
                    
                   echo "<p>Nombre de références en stock: ".(count($_SESSION['products']))."</p>";

        ?>
    </div>    
</body>
</html>
