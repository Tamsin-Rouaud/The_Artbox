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
        <main>
            <div id="liste-oeuvres">
                <!-- Boucle sur le tableau artWorks pour créer les variables artWork et intégré ces champs de manière dynamique -->
                <?php foreach($artWorks as $artWork): ?>
                    <article class="oeuvre">
                        <a href="oeuvre.php?id=<?php echo $artWork['id'] ; ?>">
                            <img src="<?php echo $artWork['image']; ?>" alt="<?php echo $artWork['title']; ?>">
                            <h2><?php echo $artWork['title']; ?></h2>
                            <p class="description"><?php echo $artWork['author']; ?></p>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </main>
        <!-- Intègre le bloc fonctionnel footer -->
        <?php 
        require_once(__DIR__."/footer.php"); ?>
    </body>
</html>