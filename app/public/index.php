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
                </br>
                <img class="img-index" src="http://image.jeuxvideo.com/medias-md/145267/1452673993-9085-card.png">
                </br>
            La série de jeux vidéo Pokémon est un ensemble de jeux vidéo de rôle basé sur la franchise japonaise Pokémon. Elle débute le 27 février 1996 au Japon avec la sortie des jeux Pocket Monsters Vert et Rouge. Le duo de jeux y rencontra un tel succès qu'il fut décliné successivement en deux autres versions (version bleue et version jaune), puis traduit à travers le monde. Au total, le duo de jeux se vendit à plus de 31 millions d'exemplaires, ce qui en fit en 1999, la seconde meilleure vente de jeux vidéo. Grâce à ce nombre record de vente, la Pokémania était lancée.
            Tandis que le développeur Game Freak se voyait concevoir Pokémon jusqu'à la seconde génération comprenant Pokémon Or, Argent et Cristal au début des années 2000, l'équipe continua. Dans les jeux principaux sur console portable de Nintendo, Pokémon Rubis, Saphir et Émeraude sorti en 2002, suivi par Pokémon Diamant et Perle en 2006, Pokémon Noir et Blanc en 2010, Pokémon Noir 2 et Blanc 2 en 2012, Pokémon X et Y en 2013, Pokémon Soleil et Lune en 2016 et Pokémon Ultra-Soleil et Ultra-Lune en 2017. Trois rééditions sont également sorties en 2004, 2009 et 2014 et se nomment respectivement Pokémon Rouge Feu et Vert Feuille, Pokémon Or HeartGold et Argent SoulSilver et Pokémon Rubis Oméga et Saphir Alpha.
            Il s'agit de l'une des séries les plus prolifique de tous les temps en termes de vente, s'étant écoulé à plus de 215 millions d'exemplaires en octobre 2010 et en comptant les ventes des versions noire et blanche de la série, sorties fin 2010 au Japon et début 2011 dans le reste du monde.
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