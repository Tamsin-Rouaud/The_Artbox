<!-- Récupère le fichier contenant les variables --> 
<?php
    require_once(__DIR__."/oeuvres.php");

    // Vérification du contenu de $_GET['id'] et que son contenu est un chiffre, si les conditions sont réunis, id est converti en entier et dans le cas contraire, on lui assigne NULL.
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    /*si j'enlève la partie (inutile ?) :  && ctype_digit($_GET['id']) lorsque je saisi un id avec un chiffre invalide comme 33 ou un chiffre et une lettre comme 3r à la suite, celui-ci me renvoie quand même une oeuvre au hasard au lieu d'afficher la page d'erreur. N'est-il pas préférable de conserver cette partie du coup ? */
    
    /* Un exemple d'utilisation de l'opérateur de coaléscence nulle ?? qui cumule les variables testées comme dans cette exemple $test = $meuih ?? $toto ?? $ouaf;"??" */
    /* On aurait aussi pu écrire avec l'opérateur de coalescence : */
    // $id = (int)$_GET['id'] ?? "null";
    /* ** Si j'utilise cette méthode, lorsque je saisi un chiffre inexistant cette fois le code me renvoit bien le message d'erreur, mais m'affiche toujours une oeuvre au hasard si j'indique un chiffre valide suivi d'une lettre tel que 3r, par contre 33r ne fonctionne pas car l'oeuvre 33 est inexistante. En utilisant cette méthode, comment rajouter la vérification ctype_digit si nécessaire? */
            
    // Variable qui contiendra l'oeuvre trouvée correspondant à l'ID
    $singlePageArtWork = null;

    // À la place de boucler au travers du tableau et ainsi raccourcir et optimiser le code, on préfèrera utiliser cette syntaxe, mais pour ce faire il faudra auparavant créer un tableau associatif en utilisant les identifiants comme clés de tableaux.
    $singlePageArtWork = $id !== null && isset($artWorks[$id]) ? $artWorks[$id] : null; ?>

    
    <!-- Voici l'ancienne syntaxe en commentaire : -->
    <!-- Boucle à travers le tableau d'oeuvres ($artWorks) pour créer la variable artWork qui contiendra chaque oeuvre
    foreach ($artWorks as $artWork):
        Vérifie si $id (présent dans l'URL) récupérée grâce à $_GET['id'] est strictement = à l'ID de la variable ($artWork['id'])
        if ($id === $artWork['id']): -->
            <!-- Stocke cette oeuvre dans la variable $singlePageArtWork
            php $singlePageArtWork = $artWork;
        endif;
    endforeach; ?>  -->

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