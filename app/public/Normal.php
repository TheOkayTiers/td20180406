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
<?php
try {
    $db = new PDO("mysql:host=192.168.95.100;dbname=local;port=4014; charset=utf8",
        "root",
        "root");
} catch (PDOException $exception){
    echo "Erreur : " . $exception -> getMessage();
}
$reponse = $db->query("SELECT * FROM pokemon WHERE type1 = 'Normal' OR type2 = 'Normal';");
$diftype = $db->query("SELECT DISTINCT type1 FROM pokemon;");

?>

<div class="container">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="bar-brand">
                <img class="logo" src="https://res.cloudinary.com/teepublic/image/private/s--sK3U3V-j--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1466903071/production/designs/561125_1.jpg">
                <img class="brand" src="https://boraarat.com/wp-content/uploads/2016/07/Pokemon-Go-Rehberi-1600x500.png">
                <img class="logo" src="https://res.cloudinary.com/teepublic/image/private/s--sK3U3V-j--/t_Preview/b_rgb:191919,c_limit,f_jpg,h_630,q_90,w_630/v1466903071/production/designs/561125_1.jpg">
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Infos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pokedex.php">Pokédex</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="row">
        <div class="col-3">
            <!-- bloc type gauche debut -->
            <?php while ($donnees = $diftype->fetch()) {?>
                <div class="<?php echo $donnees{'type1'}?>">
                    <button class="nav-item">
                        <a href="<?php echo $donnees{'type1'}?>.php">
                            <div class="<?php echo $donnees{'type1'}?>"><?php echo $donnees{'type1'}?></div>
                        </a>
                    </button>
                </div>
            <? } ?>
            <!-- bloc type gauche fin -->
        </div>
        <div class="col-9">
            </br>

            <!-- bloc pokemon debut -->
            <?php
            while ($donnees = $reponse->fetch()) {?>

                <div class="fiche-pokemon row">
                    <div class="photo-pokemon col-3">
                        <img class="image" src="<?php echo $donnees{'image'}; ?>">
                    </div>
                    <div class="infos-pokemon col-9">
                        <h4><?php echo $donnees{'id'} . " " . $donnees{'nom'}; ?></h4>

                        <h5 class="<?php echo $donnees{'type1'}?>"><?php echo $donnees{'type1'};?></h5>
                        <h5 class="<?php echo $donnees{'type2'}?>"><?php echo $donnees{'type2'};?></h5>

                        <div class="description-pokemon">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem est exercitationem nemo quaerat reiciendis reprehenderit similique totam? Adipisci alias blanditiis deleniti eligendi exercitationem illum ipsum quam, reiciendis. Natus, veniam.</div>
                    </div>
                </div>
                </br>
            <?   $compteur = $compteur+1;
            }
            echo "Il y a en tout " . $compteur . " Pokemon de ce type."?>
            <!-- bloc pokemon fin -->
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