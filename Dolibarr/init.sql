CREATE TABLE logiciel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_logiciel VARCHAR(255),
    date_maj DATE
);

CREATE TABLE info_ordi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    serial_tag VARCHAR(255),
    marque VARCHAR(255),
    date_achat DATE,
    OS VARCHAR(255),
    RAM VARCHAR(255),
    stockage VARCHAR(255),
    logiciel_id INT,
    FOREIGN KEY (logiciel_id) REFERENCES logiciel(id)
);

CREATE TABLE utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_utilisateur VARCHAR(255),
    prenom_utilisateur VARCHAR(255),
    mdp VARCHAR(255)
);

USE dolibarr;
LOAD DATA LOCAL INFILE '/csv_data/db_logiciels.csv' INTO TABLE logiciel FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;
LOAD DATA LOCAL INFILE '/csv_data/db_poste.csv' INTO TABLE logiciel FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;
LOAD DATA LOCAL INFILE '/csv_data/db_users.csv' INTO TABLE logiciel FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' IGNORE 1 LINES;