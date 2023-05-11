<?php

    // Ouvrir une session sur le serveur avec la fonction session_start()

    session_start();

    
    // Vérifier l'éxistence d'une requête POST (vérifier l'existence de la clé "submit dans le tableau POST)
    // Créer une condition pour limiter l'accès à cette page par les seules requêtes HTTP provenant de la soumission de notre formulaire.

    if(isset($_POST['submit'])){

        // Vérifier l'intégrité des valeurs transmises dans le tableau $_POST
        // en fonction de celles que nous attendons réellement avec des filtres
        // pour éviter les failles par injection de code (XXS ou SQL Injection)

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);//Supprime toute présence de caractères spéciaux et de toute balise HTML (Pas d'injection de code HTML possible)
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);//Validera le prix que si celui ci est décimal - Pour permettre l'utilisation du caractère "." ou ","
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);//Validera la quantité que si celle ci est un nombre entier

        // filter_input renvoie la valeur assainie correspondant au champs traité en cas de succès sinon false ou null (pas de risque que l'utilisateur transmette des champs supplémentaires) 

        // Vérifier si les filtres ont tous fonctionnés grâce à la condition ci dessous

        if($name && $price && $qtt){

            // Organiser les données pour conserver chaque produit renseigné
            // Stcoker nos données en session en ajoutant celles-ci au tableau $_SESSION fournis par PHP
            // Construire un tableau associatif $ product pour conserver chaque produit renseigné
            
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];

            // Enregistrer le tableau de produits créer en session (tableau contenant des références enregistrer dans le stock)

            $_SESSION['products'][] = $product;

            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $_SESSION['nbProducts'][] = count($_SESSION['products']); //Compte l'array nbProducts pour sortir le nombre de produits.
            
            // $_SESSION['checkSuccess'] = "Produit ajouté avec succès !";
            ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    
        }
    
    }

    // Si la requête POST transmet bien une clé "submit" au serveur
    //si ce n'est pas le cas la fonction header() effectuera une redirection vers un nouvel entête HTTP 
    
    //header("Location:index.php");
    //exit();

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Remettre le tableau des références (produits) à zéro
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
    // foreach ($_POST as $key => $value){ // On parcourt le tableau $_POST qui contiendra les clés qui sont envoyées (dans notre cas le bouton supprimer)

    //     if ($value == "Supprimer"){ // On s'occupe de la valeur, "Supprimer" correspond à la value du bouton tandis que la clé c'est l'index des produits.
    
    //         foreach ($_SESSION['products'] as $index => $value){ // On parcourt notre tableau des produits et pour chaque index de produit, on va vérifier si il y a un Isset de l'index en question. Le name des boutons correspond à l'index des produits un peu comme un Id unique.
    
    //             if (isset($_POST[$index])){
            
    //                 unset($_SESSION['products'][$index]); 
            
    //                 $_SESSION['nbProducts'] -= 1; // On retire 1 produit du nbProducts puisqu'on en supprime 1.
            
    //                 header("Location:recap.php"); // Redirection à la page récap.
    //                 exit();
    //             }
    //         }
    //     }
    // }
    
    // if (isset($_POST['reset'])){
    
    //     unset($_SESSION['products']); 
    
    //     $_SESSION['nbProducts'] = 0;

    //     header("Location:recap.php"); // Redirection à la page récap.
    //     exit();
    // }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
    // Pour envoyer une notification de redirection ajouter ?Message=" . urlencode($Message)   
    header("Location:index.php?Message=" . urlencode($Message));
    exit();
        
?>