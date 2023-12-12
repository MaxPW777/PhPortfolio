<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <?php
    // Include the dynamically generated CSS file
    if(!empty($cssFile)) {
        echo '<link rel="stylesheet" href="styles/' . $cssFile . '">';
    }
    if(!empty($jsFile)) {
        echo '<script defer src="js/'. $jsFile . '"></script>';
    }
    ?>
    <title>Portfolio</title>
</head>
<body>
