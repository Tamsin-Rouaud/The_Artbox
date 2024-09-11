<!-- Récupère le fichier contenant les variables --> 
<?php 
    require_once(__DIR__."/oeuvres.php"); ?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <!-- Permet de rendre un site web responsive -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Force IE à utiliser le mode de rendu le plus récent, mode Edge -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <title>The ArtBox</title>
    </head>
    <body>

        <!-- Intègre le bloc fonctionnel header avec sa barre de navigation -->
        <?php 
        require_once(__DIR__."/header.php"); ?>


        <!-- Vérification du contenu de $_GET['id'] et que son contenu est un chiffre, si les conditions sont réunis, id est converti en entier et dans le cas contraire, on lui assigne NULL.-->
        <?php $id = isset($_GET['id']) && ctype_digit($_GET['id']) ? (int)$_GET['id'] : null; ?>

        <!-- Variable qui contiendra l'oeuvre trouvée correspondant à l'ID -->
        <?php $singlePageArtWork = null; ?>

        <!-- Boucle à travers le tableau d'oeuvres ($artWorks) pour créer la variable artWork qui contiendra chaque oeuvre -->
        <?php foreach ($artWorks as $artWork): ?>
            <!-- Vérifie si $id (présent dans l'URL) récupérée grâce à $_GET['id'] est strictement = à l'ID de la variable ($artWork['id']) -->
            <?php if ($id === $artWork['id']): ?>
                <!-- Stocke cette oeuvre dans la variable $singlePageArtWork -->
                <?php $singlePageArtWork = $artWork;
            endif;
        endforeach; ?>


            <!-- Vérifie si $singlePageArtWork n'est pas null, si elle l'est, elle affiche 'Oeuvre non trouvée" -->
            <?php if ($singlePageArtWork === null): ?>
                <p>Oeuvre non trouvée.</p>
            <!-- Si $singlePageArtWork n'est pas null, affichage des informations de l'oeuvre -->
            <?php else: ?> 
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
            <?php endif; ?>


        <!-- Intègre le bloc fonctionnel footer -->
        <?php 
            require_once(__DIR__."/footer.php");  ?>
    </body>
</html>