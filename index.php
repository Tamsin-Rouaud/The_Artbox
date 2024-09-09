<?php require_once(__DIR__."/oeuvres.php"); ?>
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
    <?php require_once(__DIR__."/header.php"); ?>
    <main>
        <div id="liste-oeuvres">

            <?php foreach($artWorks as $artWork): ?>
                <article class="oeuvre">
                    <a href="<?php echo 'oeuvre-' . $artWork['id'] . '.php'; ?>">
                    <img src="<?php echo $artWork['image']; ?>" alt="<?php echo $artWork['title']; ?>">
                    <h2><?php echo $artWork['title']; ?></h2>
                    <p class="description"><?php echo $artWork['author']; ?></p>
                    </a>
                </article>
            <?php endforeach; ?>
              
                      
        </div>
    </main>
    <?php require_once(__DIR__."/footer.php"); ?>
</body>
</html>