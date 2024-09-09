<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>The ArtBox</title>
    </head>
    <body>
        <?php // Inclusion des fichiers nécessaires
        require_once(__DIR__."/oeuvres.php");
        require_once(__DIR__."/header.php");
            
        /* Récupération de l'id de l'œuvre et conversion en entier.
        Vérifie si l'ID est passé dans l'URL via $_GET['id'], sinon assigne null.
        Si l'ID est présent, il est converti en entier avec (int) */
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        // Variable initialisée à null qui contiendra l'œuvre trouvée correspondant à l'ID
        $singlePageArtWork = null; ?>

        <?php // Boucle à travers le tableau d'œuvres (présumé dans $artWorks) pour chercher l'œuvre correspondant à l'ID récupéré
            foreach ($artWorks as $artWork): 
                // Si l'ID de l'œuvre actuelle ($artWork['id']) correspond à celui dans l'URL ($id)
                if ($id == $artWork['id']): 
                    // Stocke cette œuvre dans la variable $singlePageArtWork
                    $singlePageArtWork = $artWork;
                endif; // Fin de la condition si l'ID correspond
            endforeach; // Fin de la boucle sur les œuvres

            // Vérification si une œuvre a été trouvée (si $singlePageArtWork n'est pas null)
            if ($singlePageArtWork == null): ?>
                <!-- Si aucune œuvre n'est trouvée, afficher un message -->
                <p>Oeuvre non trouvée.</p>

            <?php else: ?> <!-- Si une œuvre a été trouvée, affichage des informations de l'œuvre -->
                <main>
                    <article id="detail-oeuvre">
                        <div id="img-oeuvre">
                            <img src="<?php echo $singlePageArtWork['image']; ?>" alt="<?php echo $singlePageArtWork['title']; ?>">
                        </div>
                        <div id="contenu-oeuvre">
                            <h1><?php echo $singlePageArtWork['title']; ?></h1>
                            <p class="description"><?php echo $singlePageArtWork['author']; ?></p>
                            <p class="description-complete"><?php echo $singlePageArtWork['description']; ?></p>
                        </div>
                    </article>
                </main>
            <?php require_once(__DIR__."/footer.php");
            endif; ?>
          
    </body>
</html>