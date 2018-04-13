<?php
try {
    $db = new PDO("mysql:host=192.168.95.100;dbname=local;port=4014; charset=utf8",
        "root",
        "root");
} catch (PDOException $exception){
    echo "Erreur : " . $exception -> getMessage();
}
$reponse = $db->query("SELECT * FROM pokemon;");
$diftype = $db->query("SELECT DISTINCT type1 FROM pokemon;");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="base-pokemon.php">
</head>
<body>

<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="bar-brand">
                <img class="logo" src="https://res.cloudinary.com/teepublic/image/private/s--sK3U3V-j--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1466903071/production/designs/561125_1.jpg">
                <img class="brand" src="International_Pokémon_logo.svg.png">
                <img class="logo" src="https://res.cloudinary.com/teepublic/image/private/s--sK3U3V-j--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1466903071/production/designs/561125_1.jpg">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informations.php">Infos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pokedex.php">Pokédex</a>
                    </li>
                </ul>
                <div class="recherche">
                    <form action="recherche.php">
                        <label for="fname">Votre recherche :</label>
                        <input type="text" name="recherche" placeholder="Rechercher...">
                        </br>
                        <input class="boutonvalider" type="submit" value="Valider">
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <div class="row">
        <div class="col-3">
            <!-- bloc type gauche debut -->
            <?php while ($donnees = $diftype->fetch()) {?>
                <div class="<?php echo $donnees{'type1'}?>">
                    <button class="nav-item">
                        <a class="lien" href="typeRecherche.php?type=<?php echo $donnees{'type1'}?>">
                            <div class="<?php echo $donnees{'type1'}?>"><?php echo $donnees{'type1'}?></div>
                        </a>
                    </button>
                </div>
            <? } ?>
            <!-- bloc type gauche fin -->
        </div>
        <div class="col-9">
            <div class="paragraphe">
                <img class="img-info" src="http://www.p-pokemon.com/images-pokemon-actualite/pict_9679_1.jpg">
                </br>
                </br>
                Les premiers jeux vidéo Pokémon, Pocket Monsters Vert et Rouge sortent sur Game Boy en 1996, exclusivement au Japon, sous le nom de Pocket Monsters (ポケットモンスター, Poketto Monsutā?). Ils deviennent rapidement très populaires au Japon, se vendant à plus de 10 millions d'exemplaires. Une série animée et un jeu de cartes à collectionner sont alors créés. C'est pendant cette période de succès local que la contraction Pokémon (venant de Poketto Monsutā) devient courante. Deux ans plus tard, les jeux Pokémon Rouge et Bleu sortent aux États-Unis, aux côtés de la série animée, diffusée sur le programme télévisé Kids' WB du CW Television Network, et une version du jeu de cartes à collectionner en anglais. Les versions Rouge et Bleu se vendent très bien, battant tous les records de vente avec plus de 30 millions d'exemplaires. La série, quant à elle, aide la chaîne de télévision à grimper dans les classements, au point que Warner Bros. Pictures sort un long métrage animé au cinéma l'année suivante, en 1999. Avec 163 millions de dollars de recettes, Mewtwo Contre-Attaque est l'anime ayant eu le plus de succès au box-office.
            </div>
        </div>
    </div>
    <footer>
        © 2018 Pokémon. © 1995–2018 Nintendo/Creatures Inc./GAME FREAK inc. Pokémon, les noms des personnages Pokémon, Nintendo 3DS, Nintendo DS, Wii, Wii U et WiiWare sont des marques de Nintendo. Le logo YouTube est une marque de Google Inc. Les autres marques appartiennent à leurs propriétaires respectifs.
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>