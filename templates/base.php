<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width initial-scale=1.0"/>
        <meta name="description" content=""/>
        <meta name="keywords" content="" />
        <link rel="canonical" href=""/>
        <!--Favicon and title-->
        <!--<link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico"/>-->
        <title><?= $title ?></title>
        <!--fontawesome CDN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <!---Font-->
        <link href="https://fonts.googleapis.com/css?family=Holtwood+One+SC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gotu&family=Roboto+Condensed&display=swap" rel="stylesheet">
        <!--feuille de style-->
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="../public/css/reset.css">
        <link rel="stylesheet" type="text/css" href="../public/css/style.css"><!--Small-devices-->
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 768px)" href="../public/css/tablet.css"><!--Medium-devices-->
        <link rel="stylesheet" type="text/css" media="screen and (min-width: 992px)" href="../public/css/desktop.css"><!--large-devices-->
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="60" >

        <div id="content">
            <?= $content ?>
        </div>


    <!--Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
        <script src="https://cdn.tiny.cloud/1/x34paag6wieet4xq5hwhj0zakt8qjxa9hpmq1btsb5vzelp8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="../public/js/main.js"></script>
    </body>
    <footer>
        <p>Tous droit reserve 2020</p>
        <p>Jean Forteroche présente son livre 'Un billet simple pour l'Alaska'</p>
    </footer>
</html>