<?php

try {
    $db = new PDO("mysql:dbname=local;host=localhost",
        "root",
        "root");
} catch (PDOException $exception){
    echo "Erreur : " . $exception -> getMessage();
}
$reponse=$db->query("SELECT * FROM pokemon");

$donnees=$reponse->fetch();
echo$donnees{'nom'};
echo"<br>";

$donnees=$reponse->fetch();
echo$donnees{'nom'};
echo"<br>";
