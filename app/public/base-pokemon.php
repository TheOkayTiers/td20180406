<?php
try {
    $db = new PDO("mysql: host=localhost; db_name=local;",
        "root",
        "root");
} catch (PDOException $exception){
    echo "Erreur : " . $exception -> getMessage();
}
$response=$db->query("SELECT * FROM pokemon;");

$donnees=$response->fetch_assoc();
echo$donnees{'nom'};
echo"<br>";

$donnees=$response->fetch();
echo$donnees{'nom'};
echo"<br>";
