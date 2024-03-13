<?php

$dolibarr_host = '192.168.1.3';
$dolibarr_username = 'dolibarr_user'; 
$dolibarr_password = 'dolibarr_password';
$dolibarr_database = 'dolibarr';

$mysql_host = '192.168.1.2';
$mysql_username = 'root';
$mysql_password = 'your_mysql_root_password';
$mysql_database = 'dolibarr';

// Connexion à la base de données Dolibarr
$dolibarr_conn = new mysqli($dolibarr_host, $dolibarr_username, $dolibarr_password, $dolibarr_database);

// Vérification de la connexion à la base de données Dolibarr
if ($dolibarr_conn->connect_error) {
    die("Erreur de connexion à la base de données Dolibarr : " . $dolibarr_conn->connect_error);
}

// Requête SQL pour récupérer des données de Dolibarr (à remplacer par votre propre requête)
$sql_query = "SELECT nom_utilisateur, prenom_utilisateur, mdp FROM utilisateur";

$result = $dolibarr_conn->query($sql_query);

// Vérification du résultat de la requête
if ($result->num_rows > 0) {
    // Connexion à la base de données MySQL externe
    $mysql_conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    // Vérification de la connexion à la base de données externe
    if ($mysql_conn->connect_error) {
        die("Erreur de connexion à la base de données MySQL externe : " . $mysql_conn->connect_error);
    }

    // Parcours des résultats et insertion dans la base de données externe
    while ($row = $result->fetch_assoc()) {
        // Insertion des données dans la base de données externe (à remplacer par votre propre logique d'insertion)
        $insert_query = "INSERT INTO external_table (column1, column2, column3) VALUES ('" . $row['column1'] . "', '" . $row['column2'] . "', '" . $row['column3'] . "')";

        if ($mysql_conn->query($insert_query) !== TRUE) {
            echo "Erreur lors de l'insertion des données : " . $mysql_conn->error;
        }
    }

    // Fermeture de la connexion à la base de données externe
    $mysql_conn->close();
} else {
    echo "Aucune donnée trouvée dans Dolibarr.";
}

// Fermeture de la connexion à la base de données Dolibarr
$dolibarr_conn->close();

?>
