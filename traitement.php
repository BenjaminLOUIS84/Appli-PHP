<?php

    // Ouvrir une session sur le serveur avec la fonction session_start()

    session_start();

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Effacer toute les références du tableau avec le bouton "Vider le Stock"
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    if (isset($_POST['reset'])){

        //unset($_SESSION['products']); //Pour détruire le tableau
        $_SESSION['products'] = []; //Pour vider le tableau
        $_SESSION['checkSuccess'] = "<p>Veuillez ajouter un produit</p>"; //Pour reset le message

                
    }
   
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Reset le message en retournant sur la page du formulaire
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
    if (isset($_POST['return'])){

        //$_SESSION['checkSuccess'] = "<div class= messageF><p>Veuillez ajouter un produit</p></div>"; //Pour reset le message
        $_SESSION['checkSuccess'] = "<p>Veuillez ajouter un produit</p>"; //Pour reset le message
  
    }
   
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       
    // Vérifier l'éxistence d'une requête POST (vérifier l'existence de la clé "submit dans le tableau POST)
    // Créer une condition pour limiter l'accès à cette page par les seules requêtes HTTP provenant de la soumission de notre formulaire.

    if(isset($_POST['addProduct'])){
        

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
            //Afficher une message à chaque ajout de produit.
            ///////////////////////////////////////////////////////////////////////////////

            //$_SESSION['checkSuccess'] = "<p>Produit ajouté avec succès</p>";
            $_SESSION['checkSuccess'] = "<div id = messageAdd class = messAdd><p>Produit ajouté avec succès !</p></div>";
            
           
            ///////////////////////////////////////////////////////////////////////////////

        }
        
    }
    
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Si la requête POST transmet bien une clé "submit" au serveur on accède à la page recap automatiquement  
    // Si ce n'est pas le cas la fonction header() effectuera une redirection vers un nouvel entête HTTP on reste sur la page actuelle

    header("Location:index.php");
    exit;      
          
?>